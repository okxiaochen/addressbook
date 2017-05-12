<?php

namespace app\file\controller;

use app\index\model\Group as GroupModel;
use app\index\model\Contact as ContactModel;
use cxliker\writer\Writer as writer;
use cxliker\Reader\Reader as reader;

define('PARSER_CSV', 'csv');
define('PARSER_VCARD', 'vcard');

class Parser
{
    const CSV = 'csv';
    const VCARD = 'vcard';

    public function export()
    {
        $group = "同学";
        $list = GroupModel::getByName($group)->contactsArry;
        $mode = self::VCARD;
        $writer = new writer($mode);
        $writer->insertAll($list);
        $writer->download();
        return;
    }

    public function import()
    {
        $group = "朋友";
        $reader = new reader('D:/downloads/contacts.csv');
        $list = $reader->fetch();
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