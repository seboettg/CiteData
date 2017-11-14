<?php
/*
 * CiteData
 *
 * @link        http://github.com/seboettg/BibData for the source repository
 * @copyright   Copyright (c) 2017 Sebastian Böttger.
 * @license     https://opensource.org/licenses/MIT
 */

date_default_timezone_set('Europe/Berlin');
require_once realpath(__DIR__ . '/../vendor/autoload.php');
define('PHPUNIT_FIXTURES', realpath(__DIR__ . '/fixtures'));
$loader = new Composer\Autoload\ClassLoader();
$loader->add('Seboettg', realpath(__DIR__ . '/src'));
$loader->register();

/**
 * @param $name
 * @param $type
 * @return string
 */
function loadFixtures($name, $type)
{
    $fixture = file_get_contents(PHPUNIT_FIXTURES . "/$type" . "/$name");
    return $fixture;
}