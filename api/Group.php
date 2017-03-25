<?php

abstract class Group{

    public static $array = null;

    public static function add($name)
    {
        self::$array[] = $name;
    }

    public static function get($name)
    {
        return self::$array;
    }

    //comment1;

}