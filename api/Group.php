<?php

final class Group {

    public static $array = null;

    public static function add($name)
    {
        self::$array[] = $name;
    }

    public static function get()
    {
        return self::$array;
    }

    //comment1;

}