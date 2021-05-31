<?php


class db {
    function __construct() {
        $this->mysql = new mysqli('localhost', 'root', 'qjly7559', 'blockchain_cwgl');
        if ($this->mysql->connect_error) {//检查连接是否正常
            die('Connect Error(' . $this->mysql->connect_error . ')' . $this->mysql->connect_error);
        }
    }
    function query($sql) {
        return $this->mysql->query($sql);
    }
}