<?php

require_once("UserImpl.php");

class UserImpl
{
    private $absql;
    
    public function __construct($id)
    {
        $this->absql = new ABsqlImpl($id);
    }

    public function getContacts($strategy)
    {
        return $this->absql->getContacts($strategy);
    }
}