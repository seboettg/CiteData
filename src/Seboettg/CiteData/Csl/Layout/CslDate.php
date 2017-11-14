<?php
/*
 * CiteData
 *
 * @link        http://github.com/seboettg/BibData for the source repository
 * @copyright   Copyright (c) 2017 Sebastian Böttger.
 * @license     https://opensource.org/licenses/MIT
 */

namespace Seboettg\CiteData\Csl\Layout;

interface CslDate
{
    /**
     * array with order year, month, day
     * e.g.: [[2012],[6],[17]]
     *
     * @return array
     */
    public function getDateParts();

    /**
     * @return string
     */
    public function getLiteral();

    /**
     * @return bool|int|string
     */
    public function getCirca();

    /**
     * @return int|string
     */
    public function getSeason();

    /**
     * @return string
     */
    public function getRaw();
}
