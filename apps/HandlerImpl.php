<?php

require_once("UserImpl.php");

class HandlerImpl
{
    public function getContacts($user, $strategy = "all")
    {
      /*  $absql = new ABsqlImpl("localhost", "root", "root", "contract");
        $rstJson = $absql->getAll();
        return $rstJson;*/
        $user = new UserImpl($user);
        return $user->getContacts($strategy);

    }
}