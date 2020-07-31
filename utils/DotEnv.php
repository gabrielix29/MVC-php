<?php

namespace MVC\utils;

class DotEnv
{
    static public function load()
    {
        if ($file = fopen(__DIR__ . "/../.env", "r")) {
            while (!feof($file)) {
                $line = preg_replace('~[\r\n]+~', '', fgets($file));
                putenv($line);
            }
            fclose($file);
        }
    }
}