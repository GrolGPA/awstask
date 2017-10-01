<?php
/**
 * @property Registration
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 24.09.17
 * Time: 17:49
 */

namespace application\models;

use application\exceptions;


class Registration extends Model
{


    public function run()
    {


        $sql = 'SELECT userID FROM users WHERE username = :username';
        $args = array(
            ':username' => $_POST['username']
        );
        $this->stmt = new DB();
        $this->stmt->queryList($sql, $args);
        $count = $this->stmt->count();

        if($count > 0)
        {
            throw new exceptions\Registration("User already registered");
            //header('Location: ../Registration');
        }
        else
        {
            $sql = "INSERT INTO users (username, password, categoryID) VALUES (:username, md5(:password), :categoryID)";
            $args = array(
                ":username" => $_POST['username'],
                ":password" => $_POST['password'],
                ":categoryID" => $_POST['category']
                );
            $this->stmt = new DB();
            if ($this->stmt->queryList($sql, $args))
            {
                echo "User successfully added";
            }

        }

    }

}