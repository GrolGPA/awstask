<?php
/**
 * @property class DBConnect
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 23.09.17
 * Time: 7:59
 */

namespace application\models;

use application\controllers;


 class DBConnect{
    private $host;
    private $db;
    private $username;
    private $password;


    private function getConfig()
    {
            $reg = controllers\Registry::getInstance();
            $reg->getResource();
            $this->db = $reg['host'];
            $this->host = $reg['dbname'];
            $this->username = $reg['username'];
            $this->password = $reg['password'];
    }

    private function getConnection()
    {
        self::getConfig();
        //NEED ADD EXCEPTION
        $connection = new PDO("mysql:dbname=$this->db;host=$this->host", $this->username, $this->password);
        return $connection;
    }

    public function queryList($sql, $args)
    {
        $connection = $this->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}