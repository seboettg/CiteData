<?php
/*
 * CiteData
 *
 * @link        http://github.com/seboettg/BibData for the source repository
 * @copyright   Copyright (c) 2017 Sebastian Böttger.
 * @license     https://opensource.org/licenses/MIT
 */

namespace Seboettg\CiteData\Csl;

trait JsonSerializeTrait
{

    protected $jsonClass = null;

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        if (empty($this->jsonClass)) {
            $jsonFormat = new \stdClass();
            $reflClass = new \ReflectionClass(__CLASS__);
            $methods = $reflClass->getMethods();


            foreach ($methods as $method) {
                $name = $method->getName();
                if (substr($name, 0, 3) === "get" && $name !== "getPropertyName") {
                    $val = $method->invoke($this);
                    if (!empty($val)) {
                        $property = $this->getPropertyName(substr($name, 3));
                        $jsonFormat->{$property} = $val;
                    }
                }
            }
            $this->jsonClass = $jsonFormat;
        }
        return $this->jsonClass;
    }


    private function getPropertyName($string)
    {
        if (in_array($string, ['DOI', 'ISBN', 'ISSN', 'URL'])) {
            return $string;
        }

        $name = lcfirst($string);
        $matches = [];

        if (preg_match_all("/[A-Z]/", $name, $matches, PREG_OFFSET_CAPTURE)) {
            $matches = $matches[0];
            $ret = "";
            $start = 0;
            array_walk($matches, function ($match) use ($name, &$start, &$ret) {
                $len = $match[1] - $start;
                $ret .= strtolower(substr($name, $start, $len)) . "-";
                $start = $match[1];
            });
            $match = array_pop($matches);
            $ret .= strtolower(substr($name, $match[1]));
            return $ret;
        }
        return $name;
    }
}
