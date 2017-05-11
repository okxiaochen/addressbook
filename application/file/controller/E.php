<?php

namespace app\file\controller;

use League\Csv\Writer as CsvWriter;
use League\Csv\Reader as CsvReader;
use app\index\model\Group as GroupModel;
use app\index\model\Contact as ContactModel;

class Writer
{
    public function export()
    {
        // $group = $_REQUEST['group'];
        $group = "朋友";
        $list = GroupModel::getByName($group)->contactsArry;
        $csv = CsvWriter::createFromString('');
        $csv->insertAll($list);
        $csv->output('contacts.csv');
        return;
    }

    public function import()
    {
        $group = "朋友";
        $csv = CsvReader::createFromPath('D:/downloads/contacts.csv');
        $list = $csv->fetchAll();
        $length = count($list);
        $length2 = count($list[0]);
        for ($i = 1 ; $i < $length ; $i++) {
            for ($j = 0 ; $j < $length2 ; $j++) {
                $assocArry[$list[0][$j]] = $list[$i][$j];
            }
            $contacts[] = $assocArry;
        }
        $contact = new ContactModel;
        $contactsObj = $contact->saveAll($contacts);
        $groupObj = GroupModel::getByName($group);
        foreach ($contactsObj as $item) {
            $item->groups()->attach($groupObj);
        }
        return;
    }
}