<?php
/*
 * BibData
 *
 * @link        http://github.com/seboettg/BibData for the source repository
 * @copyright   Copyright (c) 2017 Sebastian Böttger.
 * @license     https://opensource.org/licenses/MIT
 */

namespace Seboettg\BibData\Csl;

use JsonSerializable;
use Seboettg\BibData\Csl\Layout\CslDate;

/**
 * Class Date
 * @package Seboettg\BibData\Csl
 * @author Sebastian Böttger <seboettg@gmail.com>
 */
class Date implements CslDate, JsonSerializable
{
    use JsonSerializeTrait;

    /**
     * @var array
     */
    private $dateParts;

    /**
     * @var string
     */
    private $literal;

    /**
     *
     * @var bool|int|string
     */
    private $circa;

    /**
     * @var int|string
     */
    private $season;

    /**
     * @var string
     */
    private $raw;

    /**
     * {@inheritdoc}
     */
    public function getDateParts()
    {
        return $this->dateParts;
    }

    /**
     * @param array $dateParts
     */
    public function setDateParts($dateParts)
    {
        $this->dateParts = $dateParts;
    }

    /**
     * {@inheritdoc}
     */
    public function getLiteral()
    {
        return $this->literal;
    }

    /**
     * @param string $literal
     */
    public function setLiteral($literal)
    {
        $this->literal = $literal;
    }

    /**
     * {@inheritdoc}
     */
    public function getCirca()
    {
        return $this->circa;
    }

    /**
     * @param bool|int|string $circa
     */
    public function setCirca($circa)
    {
        $this->circa = $circa;
    }

    /**
     * {@inheritdoc}
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * @param int|string $season
     */
    public function setSeason($season)
    {
        $this->season = $season;
    }

    /**
     * {@inheritdoc}
     */
    public function getRaw()
    {
        return $this->raw;
    }

    /**
     * @param string $raw
     */
    public function setRaw($raw)
    {
        $this->raw = $raw;
    }
}
