<?php
/*
 * CiteData
 *
 * @link        http://github.com/seboettg/BibData for the source repository
 * @copyright   Copyright (c) 2017 Sebastian Böttger.
 * @license     https://opensource.org/licenses/MIT
 */


namespace Seboettg\CiteData\Csl;

use ReflectionClass;
use ReflectionMethod;

class Factory
{

    const NAME_VARIABLES = [
        "author",
        "collection-editor",
        "composer",
        "container-author",
        "director",
        "editor",
        "editorial-director",
        "illustrator",
        "interviewer",
        "original-author",
        "recipient",
        "reviewed-author",
        "translator"
    ];

    const DATE_VARIABLES = [
        "accessed",
        "event-date",
        "issued",
        "original-date",
        "submitted"
    ];

    public static function createRecord($json) {
        if (is_string($json)) {
            return static::createByString($json);
        } elseif (is_array($json) || is_object($json)) {
            return static::createByObject($json);
        }
        throw new \InvalidArgumentException("Invalid argument. Cannot handle format of the argument.");
    }


    private static function createByString($json)
    {
        $jsonObj = json_decode($json);
        return static::createByObject($jsonObj);
    }

    /**
     * @param $jsonObj
     * @return array|Record
     */
    private static function createByObject($jsonObj)
    {
        if (is_array($jsonObj)) {
            $ret = [];
            foreach ($jsonObj as $jsonObject) {
                $ret[] = static::createObject("Seboettg\\CiteData\\Csl\\Record", $jsonObject);
            }
            return $ret;
        } elseif (is_object($jsonObj)) {
            return static::createObject("Seboettg\\CiteData\\Csl\\Record", $jsonObj);
        } else {
            throw new \InvalidArgumentException("Invalid argument. Cannot handle format of the argument.");
        }

    }

    private static function isNameVariable($propertyName)
    {
        return array_search($propertyName, self::NAME_VARIABLES) !== false;
    }

    private static function isDateVariable($propertyName)
    {
        return array_search($propertyName, self::DATE_VARIABLES) !== false;
    }

    private static function getMethodName($property)
    {
        if (preg_match_all("/-/", $property, $matches, PREG_OFFSET_CAPTURE)) {
            $matches = $matches[0];
            $ret = "";
            $end = strlen($property);
            for ($i = count($matches) - 1; $i >= 0; --$i) {
                $match = $matches[$i];
                $len = $end - $match[1] - 1;
                $ret = ucfirst(substr($property, $match[1] + 1, $len)) . $ret;
                $end -= ($len + 1);
            }
            $match = array_shift($matches);
            $property = substr($property, 0, $match[1]) . $ret;
        }
        $methodToSearch = "set" . ucfirst($property);
        return $methodToSearch;
    }

    private static function createNameObject(array $nameObjectArray)
    {
        $ret = [];
        foreach ($nameObjectArray as $nameObject) {
            $ret[] = static::createObject("Seboettg\\CiteData\\Csl\\Name", $nameObject);
        }
        return $ret;
    }

    private static function createObject($class, $objectValue)
    {
        $obj = new $class();
        $reflClass = new ReflectionClass(get_class($obj));
        foreach ($objectValue as $property => $value) {
            if (!empty($value)) {
                $methods = $reflClass->getMethods(ReflectionMethod::IS_PUBLIC);
                $methodToSearch = static::getMethodName($property);
                $relevantMethods = array_filter($methods, function ($method) use ($methodToSearch) {
                    /** @var ReflectionMethod $method */
                    return $method->getName() === $methodToSearch;
                });
                if (!empty($relevantMethods)) {
                    $method = array_shift($relevantMethods);
                    if (static::isNameVariable($property)) {
                        $method->invoke($obj, static::createNameObject($value));
                    } elseif (static::isDateVariable($property)) {
                        $method->invoke($obj, static::createObject("Seboettg\\CiteData\\Csl\\Date", $value));
                    } else {
                        $method->invoke($obj, $value);
                    }
                } else {
                    //TODO: log missing property
                }
            }
        }
        return $obj;
    }
}