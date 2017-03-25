<?php 

    interface ABsql
    {

        public function __construct($user);

        public function getContacts($strategy);
        
    }