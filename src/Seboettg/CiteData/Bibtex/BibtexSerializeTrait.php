<?php

namespace Seboettg\CiteData\Bibtex;


trait BibtexSerializeTrait
{

    /**
     * @param Bibtex $bibtex
     *
     * @return string
     */
    protected function serializeBibTex(Bibtex $bibtex) {

        $bibtexBody = '';

        $bibtexFields = ["abstract", "address", "annote", "author", "booktitle", "chapter", "crossref", "edition",
            "editor", "howpublished", "institution", "journal", "month", "note", "number",
            "organization", "pages", "publisher", "school", "series", "title", "type", "volume", "year"];

        $reflectedBibtex = new \ReflectionClass($bibtex);

        for ($i = 0; $i < count($bibtexFields); ++$i) {

            $field = $bibtexFields[$i];

            if ($field === 'abstract') {

                if ($bibtex->getBibtexAbstract() != null && $bibtex->getBibtexAbstract() != '') {
                    $bibtexBody .= $this->renderBibTeXAttribute($field, $bibtex->getBibtexAbstract());
                }
                continue;
            }

            $method = $reflectedBibtex->getMethod('get'.ucfirst($field));
            $value = $method->invoke($bibtex);

            if (!empty($value)) {
                $bibtexBody .= $this->renderBibTeXAttribute($field, $value);
            }
        }

        $bibtexBody = $this->removeLastComma($bibtexBody);

        $bibtexBody .= self::NEWLINE;
        $bibtexItem = '@'.
            $bibtex->getEntrytype().
            $this->addBibTexBrackets(
                $bibtex->getBibtexKey().
                self::COMMA_AND_NEWLINE.
                $bibtexBody
            ).self::NEWLINE;


        return $bibtexItem;
    }

    /**
     * @param $field
     * @param $value
     *
     * @return string
     */
    protected function renderBibTeXAttribute($field, $value) {

        $value = trim($value); //trim
        $part = self::TAB . ' ' . $field . ' ' . self::EQUALS_SIGN . ' ';

        if (preg_match('/^[1-9][0-9]*$/', $value)) {
            $part .= $value;
        } else {
            $part .= $this->addBibTexBrackets($value);
        }

        $part .= self::COMMA_AND_NEWLINE;

        return $part;
    }


    protected function addBibTexBrackets($string) {
        return '{'.$string.'}';
    }

    private function removeLastComma($bibtexBody) {

        $cutPos = strpos($bibtexBody, ",\n", strlen($bibtexBody)-2);
        return substr($bibtexBody, 0, $cutPos);
    }
}