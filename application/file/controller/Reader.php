<?php

namespace cxliker\Reader;

use League\Csv\Writer as CsvWriter;
use League\Csv\Reader as CsvReader;
use JeroenDesloovere\VCard\VCard as VCardWriter;
use JeroenDesloovere\VCard\VCardParser as VCardReader;


class Reader
{
    const CSV = 'csv';
    const VCARD = 'vcard';

    public $mode = null;
    public $reader;

    public function __construct($path)
    {
        $pos = strrpos($path, '.');
        $suffix = substr($path, $pos + 1);
        switch ($suffix) {
            case "csv" :
                $this->mode = self::CSV;
                $this->reader = CsvReader::createFromPath($path);
                break;
            case "vcf" :
                $this->mode = self::VCARD;
                $this->reader = VCardReader::parseFromFile($file);
                break;
        }
    }

    public function fetch()
    {
        switch ($this->mode) {
            case self::CSV :
                $list = $this->reader->fetch();
                break;
            case self::VCARD :
                $list = $this->reader->getCards();
                break;
        }
        return;
    }
}