<?php

namespace Seboettg\CiteData\Bibtex;


class Bibtex {

    use BibtexSerializeTrait;

    const EQUALS_SIGN = '=';
    const TAB = ' ';
    const NEWLINE = PHP_EOL;
    const COMMA_AND_NEWLINE = "," . PHP_EOL;
    const LAST_COMMA = "/^(.+?),\n$/";

    private $bibtexKey;
    private $bibtexAbstract;
    private $entrytype;
    private $address;
    private $annote;
    private $author;
    private $booktitle;
    private $chapter;
    private $crossref;
    private $edition;
    private $editor;
    private $howpublished;
    private $institution;
    private $organization;
    private $journal;
    private $note;
    private $number;
    private $pages;
    private $publisher;
    private $school;
    private $series;
    private $volume;
    private $day;
    private $month;
    private $year;
    private $type;
    private $url;

    public function __construct() {

    }

    /**
     * @return mixed
     */
    public function getBibtexKey()
    {
        return $this->bibtexKey;
    }

    /**
     * @param mixed $bibtexKey
     */
    public function setBibtexKey($bibtexKey)
    {
        $this->bibtexKey = $bibtexKey;
    }

    /**
     * @return mixed
     */
    public function getBibtexAbstract()
    {
        return $this->bibtexAbstract;
    }

    /**
     * @param mixed $bibtexAbstract
     */
    public function setBibtexAbstract($bibtexAbstract)
    {
        $this->bibtexAbstract = $bibtexAbstract;
    }

    /**
     * @return mixed
     */
    public function getEntrytype()
    {
        return $this->entrytype;
    }

    /**
     * @param mixed $entrytype
     */
    public function setEntrytype($entrytype)
    {
        $this->entrytype = $entrytype;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getAnnote()
    {
        return $this->annote;
    }

    /**
     * @param mixed $annote
     */
    public function setAnnote($annote)
    {
        $this->annote = $annote;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getBooktitle()
    {
        return $this->booktitle;
    }

    /**
     * @param mixed $booktitle
     */
    public function setBooktitle($booktitle)
    {
        $this->booktitle = $booktitle;
    }

    /**
     * @return mixed
     */
    public function getChapter()
    {
        return $this->chapter;
    }

    /**
     * @param mixed $chapter
     */
    public function setChapter($chapter)
    {
        $this->chapter = $chapter;
    }

    /**
     * @return mixed
     */
    public function getCrossref()
    {
        return $this->crossref;
    }

    /**
     * @param mixed $crossref
     */
    public function setCrossref($crossref)
    {
        $this->crossref = $crossref;
    }

    /**
     * @return mixed
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * @param mixed $edition
     */
    public function setEdition($edition)
    {
        $this->edition = $edition;
    }

    /**
     * @return mixed
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * @param mixed $editor
     */
    public function setEditor($editor)
    {
        $this->editor = $editor;
    }

    /**
     * @return mixed
     */
    public function getHowpublished()
    {
        return $this->howpublished;
    }

    /**
     * @param mixed $howpublished
     */
    public function setHowpublished($howpublished)
    {
        $this->howpublished = $howpublished;
    }

    /**
     * @return mixed
     */
    public function getInstitution()
    {
        return $this->institution;
    }

    /**
     * @param mixed $institution
     */
    public function setInstitution($institution)
    {
        $this->institution = $institution;
    }

    /**
     * @return mixed
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @param mixed $organization
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    /**
     * @return mixed
     */
    public function getJournal()
    {
        return $this->journal;
    }

    /**
     * @param mixed $journal
     */
    public function setJournal($journal)
    {
        $this->journal = $journal;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @param mixed $pages
     */
    public function setPages($pages)
    {
        $this->pages = $pages;
    }

    /**
     * @return mixed
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @param mixed $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @return mixed
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * @param mixed $school
     */
    public function setSchool($school)
    {
        $this->school = $school;
    }

    /**
     * @return mixed
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @param mixed $series
     */
    public function setSeries($series)
    {
        $this->series = $series;
    }

    /**
     * @return mixed
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param mixed $volume
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param mixed $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return mixed
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param mixed $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function __toString()
    {
        return $this->serializeBibTex($this);
    }
}