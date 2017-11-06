<?php
/*
 * BibData
 *
 * @link        http://github.com/seboettg/BibData for the source repository
 * @copyright   Copyright (c) 2017 Sebastian Böttger.
 * @license     https://opensource.org/licenses/MIT
 */

namespace Seboettg\BibData\Csl;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{

    public function testCreateRecord()
    {
        $record = Factory::createRecord(json_decode(loadFixtures("single-item.json", "csl")));
        $records = Factory::createRecord(json_decode(loadFixtures("bibsonomy-items.json", "csl")));

        $jsonString = json_encode($records);
        $noop = false;

    }
}
