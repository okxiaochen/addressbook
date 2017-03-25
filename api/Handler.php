<?php
spl_autoload_register(function ($class_name) {
    require_once '../apps/' .$class_name . '.php';
});

interface Handler 
{
    public function getContacts($user, $strategy = "all");
}


$rst = $_REQUEST;
switch($rst["type"]) {
    case "list" :
        $listHandler = new HandlerImpl();
        echo $listHandler->getContacts($rst['user'], $rst['strategy']);
        break;
}