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
use Seboettg\BibData\Csl\Layout\CslName;

/**
 * Class Name
 * @package Seboettg\BibData\Csl
 * @author Sebastian Böttger <seboettg@gmail.com>
 */
class Name implements CslName, JsonSerializable
{
    use JsonSerializeTrait;

    private $given;

    private $droppingParticle;

    private $nonDroppingParticle;

    private $family;

    private $suffix;

    /**
     * {@inheritdoc}
     */
    public function getGiven()
    {
        return $this->given;
    }

    /**
     * @param mixed $given
     */
    public function setGiven($given)
    {
        $this->given = $given;
    }

    /**
     * {@inheritdoc}
     */
    public function getDroppingParticle()
    {
        return $this->droppingParticle;
    }

    /**
     * @param mixed $droppingParticle
     */
    public function setDroppingParticle($droppingParticle)
    {
        $this->droppingParticle = $droppingParticle;
    }

    /**
     * {@inheritdoc}
     */
    public function getNonDroppingParticle()
    {
        return $this->nonDroppingParticle;
    }

    /**
     * @param mixed $nonDroppingParticle
     */
    public function setNonDroppingParticle($nonDroppingParticle)
    {
        $this->nonDroppingParticle = $nonDroppingParticle;
    }

    /**
     * {@inheritdoc}
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * @param mixed $family
     */
    public function setFamily($family)
    {
        $this->family = $family;
    }

    /**
     * {@inheritdoc}
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @param mixed $suffix
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
    }
}
