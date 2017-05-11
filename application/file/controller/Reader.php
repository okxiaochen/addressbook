<?php

use League\Csv\Writer as CsvWriter;
use League\Csv\Reader as CsvReader;
use JeroenDesloovere\VCard\VCard as VCardWriter;
use JeroenDesloovere\VCard\VCardParser as VCardReader;
use app\index\model\Group as GroupModel;
use app\index\model\Contact as ContactModel;

define('PARSER_CSV', 'csv');
define('PARSER_VCARD', 'vcard');

class Reader
{
    const CSV = 'csv';
    const VCARD = 'vcard';

    public $mode = null;
    public $reader;

    public function __construct($path, $mode)
    {
        $this->mode == $mode;
        if ($mode === self::CSV) {
            $this->reader = CsvReader::createFromPath($path);
        } else {
            $this->reader = VCardReader::parseFromFile($file);
        }
    }

    public function fetchAll()
    {

    }
}