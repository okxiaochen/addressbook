<?php
    interface UserManager
    {
        public static function login($account,$password);

        public static function logout($account);

        public static function register($info);
    }