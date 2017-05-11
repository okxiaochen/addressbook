<?php

namespace cxliker\writer;

use League\Csv\Writer as CsvWriter;
use League\Csv\Reader as CsvReader;
use JeroenDesloovere\VCard\VCard as VCardWriter;
use JeroenDesloovere\VCard\VCardParser as VCardReader;

class Writer
{
    const CSV = 'csv';
    const VCARD = 'vcard';

    public $mode = null;
    public $writer;
    public $vcf = null;

    public function __construct($mode)
    {
        $this->mode = $mode;
        if ($mode === self::CSV) {
            $this->writer = CsvWriter::createFromString('');
        } else {
            $this->writer = new VCardWriter();
        }
    }

    public function insertAll(array $list)
    {
        switch ($this->mode) {
            case self::CSV : 
                $this->writer->insertAll($list);
                break;
            case self::VCARD :
                $list = $this->numric2AssocArry($list);
                foreach ($list as $contact) {
                    $this->writer = new VCardWriter();
                    $this->writer->addAddress(null, null, $contact['address'], null, null, $contact['postcode'], null, 'home');
                    $this->writer->addBirthday($contact['birthday']);
                    $this->writer->addCompany($contact['workplace']);
                    $this->writer->addEmail($contact['email']);
                    // $this->writer->addJobtitle();
                    // $this->writer->addRole($)
                    $this->writer->addName($contact['name'], $contact['name'], null, null, null);
                    // $this->writer->addNote()
                    $this->writer->addPhoneNumber($contact['phone']);
                    $photo = trim($contact['photo']);
                    if (isset($photo) && !empty($photo))
                        $this->writer->addPhoto($photo);
                    $this->writer->addURL($contact['blog']);
                    $this->writer->addNote($contact['remark']);

                    $a = $this->writer->getOutput();
                    $this->vcf .= $this->writer->getOutput();
                }
                break;
        }
        return;
    }

    public function download()
    {
        switch ($this->mode) {
            case self::CSV : 
                $this->writer->output('contacts.csv');
                break;
            case self::VCARD :
                // $this->writer->downloadAll($this->vcf);
                header("Content-type: text/x-vcard");
                header("Content-Disposition: attachment; filename=contacts.vcf");
                header("Content-Length: " . (mb_strlen($this->vcf, "utf-8")+3));
                header("Connection: close");
                echo $this->vcf;
                break;
        }
        return;
    }

    public function numric2AssocArry($list) 
    {
        $length = count($list);
        $length2 = count($list[0]);
        for ($i = 1 ; $i < $length ; $i++) {
            for ($j = 0 ; $j < $length2 ; $j++) {
                $filed = $list[0][$j];
                $assocArry[$filed] = $list[$i][$filed];
            }
            $allArry[] = $assocArry;
        }
        return $allArry;
    }

}