<?php
/**
 * Database handler class
 */

require_once $_SERVER['DOCUMENT_ROOT']."/app/core/config.php";

class DB
{
    public $connection;
    private static $instance;

    private function __construct()
    {
        $this -> connection = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASS);
    }

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }
}