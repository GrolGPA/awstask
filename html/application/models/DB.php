<?php
/**
 * @property class DB
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 23.09.17
 * Time: 7:59
 */

namespace application\models;

use application\controllers;
use application\exceptions;


 class DB {
    private $host="db";
    private $dbname;
    private $username;
    private $password;
    private $stmt;



     /**
      * Getting config from registry
      */
     private function getConfig()
     {
        $reg = controllers\Registry::getInstance();
        //$this->host=$reg->getResource('host');
        $this->dbname=$reg->getResource('dbname');
        $this->username=$reg->getResource('username');
        $this->password=$reg->getResource('password');
     }

     /**
      * @return \PDO
      * @throws exceptions\DbException
      */
     private function startConnection()
    {
        $this->getConfig();

        $connection = new \PDO("mysql:dbname=$this->dbname;host=$this->host", $this->username, $this->password);
        if (!empty($connection->error))
        {
            throw new exceptions\DbException("Could not connect to the database.  Please check your configuration.");
        }
        else
        {
            return $connection;
        }
    }

     /**
      * @param $sql
      * @param $args
      */
     public function queryList($sql, $args)
    {
        $connection = $this->startConnection();
        $this->stmt = $connection->prepare($sql);
        $this->stmt->execute($args);

    }


     /**
      * Counting rows
      *
      * @return mixed
      */
     public function count()
     {
         $this->stmt->fetchAll();
         $count=$this->stmt->rowCount();
         return $count;
     }


}