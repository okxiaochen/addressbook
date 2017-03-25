<?php

require_once("../api/ABsql.php");

class ABsqlImpl implements ABsql {

    private $absql = false;
    private $user = null;

    public function __construct($user)
    {
        $this->user = $user;
        $this->absql = new mysqli("localhost","root","root","contract");
        if($this->absql->connect_errno) {
            die("Connect failed:" . $this->absql->connect_error);
        }
    }

    public function getContacts($strategy)
    {
        $sql = "SELECT * FROM contract WHERE owner = $this->user";
        if($strategy != "all") $sql .= "AND group = $strategy";
        $rows = array();
        if($result = $this->absql->query($sql)) {
            while($r = $result->fetch_assoc()) {
                $rows[] =$r;
            }
        }
        return json_encode($rows);

    }
}