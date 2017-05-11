<?php

namespace app\file\controller;

use app\index\model\Group as GroupModel;
use app\index\model\Contact as ContactModel;
use cxliker\writer\Writer as writer;
require "Writer.php";

define('PARSER_CSV', 'csv');
define('PARSER_VCARD', 'vcard');

class Parser
{
    const CSV = 'csv';
    const VCARD = 'vcard';

    public function export()
    {
        $group = "朋友";
        $list = GroupModel::getByName($group)->contactsArry;
        $mode = self::VCARD;
        $writer = new writer($mode);
        $writer->insertAll($list);
        $writer->download();
        return;
    }
}