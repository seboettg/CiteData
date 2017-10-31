<?php
/*
 * IBW3Interface is an interface which communicates with a PICA LBS
 * Copyright (c) 2017 HeBIS-Verbundzentrale, Frankfurt am Main (http://www.hebis.de)
 *
 * BibData is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or any later version.
 *
 * BibData is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
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
