<?php

namespace MVC\core;

use MVC\utils\DatabaseConnector;

abstract class Model
{
    private DatabaseConnector $dbConn;

    function __construct()
    {
        $this->dbConn = new DatabaseConnector();
    }
}