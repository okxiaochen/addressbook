<?php
namespace app\index\controller;

use app\index\model\Group;
use app\index\model\Contact;
use Overtrue\Pinyin\Pinyin;

class Query
{

    public function init()
    {
        if (isset($GLOBALS['contactArry']))
            return $GLOBALS['contactArry'];
        $contactObj = Contact::all();
        $contactArry = &$GLOBALS['contactArry'];
        foreach ($contactObj as $item)
        {
            $contactArry[] = $item->data;
        }
        return $contactArry;
    }

    public function execute()
    {
        $contactArry = Query::init();
        $queryString = "ZMY";
        $queryArry = explode(" ", strtolower($queryString));
        $rst = array();
        $pinyin = new Pinyin('Overtrue\Pinyin\MemoryFileDictLoader');
        foreach ($contactArry as $contact)
        {
            $ctForValues = 0;
            $isFirst = true;
            foreach ($queryArry as $verify)
            {
                if (!$isFirst && $ctForValues == 0) 
                    break;
                else 
                    $isFirst = false;
                foreach ($contact as $filed => $value)
                {
                    if ($filed == "id" || $filed == "create_time" || $filed == "photo")
                    {
                        continue;
                    }
                    if (strpos($value, $verify) !== false)
                    {
                        $ctForValues++;
                        continue 2;
                    } else if(preg_match("/^[\x7f-\xff]+$/", $value) && preg_match("/^[a-z]*$/i", $verify))
                    {
                        if ($filed == "name")
                        {
                            $valuepy = implode("", $pinyin->name($value));
                            $valueabbr = $pinyin->abbr(implode(".", $pinyin->name($value)));
                        } else {
                            $valuepy = $pinyin->permalink($value, "");
                            $valueabbr = $pinyin->abbr($value);
                        }
                        if (strpos($valuepy, $verify) !== false || strpos($valueabbr, $verify) !== false)
                        {
                            $ctForValues++;
                            continue 2;
                        }
                    }
                }
            }
            if ($ctForValues == count($queryArry))
            {
                $rst[] = $contact;
            }
        }
        return $rst;
    }

    public function index()
    {
        // $query = $_REQUEST['query'];
        $a = Contact::all();
        $b = $a;
    }

}
