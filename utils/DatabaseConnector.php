<?php

namespace MVC\utils;

use PDO;

class DatabaseConnector //TODO secure for sql injection
{
    private PDO $pdo;

    function __construct()
    {
        $this->pdo = new PDO("mysql:host=" . getenv('DB_HOST') . ";port=" . getenv('DB_POST') . ";dbname=" . getenv('DB_NAME'), getenv('DB_USER'), getenv('DB_PASS'));
    }

    public function getData(string $table, array $info = null)
    {
        if ($info != null) {
            $keys = array_keys($info);
            $last = end($keys);
            $search = "";
            foreach ($info as $column => $value) {
                $search = $search . $column . " = '" . $value . "'";
                if ($column != $last) {
                    $search = $search . " AND ";
                }
            }
            $query = $this->pdo->prepare("SELECT * FROM $table WHERE $search");
        } else {
            $query = $this->pdo->prepare("SELECT * FROM $table");
        }
        $query->execute();
        return $query->fetch();
    }

    public function insertData(string $table, array $data): bool
    {
        $columns = array_keys($data);
        $columnCount = (count($columns) - 1);
        $columnNames = implode(", ", array_keys($data));
        $query = $this->pdo->prepare("INSERT INTO $table ($columnNames) VALUES (?" . str_repeat(", ?", $columnCount) . ")");

        if ($query->execute(array_values($data)) == true) {
            return true;
        }
        echo json_encode($query->errorInfo());
        return false;
    }

    //TODO changeData checkData
}