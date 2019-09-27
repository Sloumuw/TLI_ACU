<?php

define('PARAM_PATH', __DIR__ . '../../param.conf');


class Connect
{
    private $conf = [];
    public $conn;

    public function __construct()
    {
        $this->init();

        try {
            $this->conn = new PDO("mysql:host=".$this->conf['db_host'].";dbname=".$this->conf['db_name'], $this->conf['db_user'], $this->conf['db_password']);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    private function init(): void
    {
        $lines = file(PARAM_PATH);

        foreach ($lines as $l) {
            if(preg_match("/^db_/", $l, $matches)) {
                list($key, $val) = explode("=", trim($l));
                $this->conf[$key]=$val;
            }
        }
    }
}
