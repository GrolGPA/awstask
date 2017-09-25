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


class Registration
{

    private $stmt;

    public function run()
    {


        $sql = 'SELECT userID FROM users WHERE username = :username AND password = :password';
        $args = array(
            ':username' => $_POST['username']
        );
        $this->stmt = new DB();
        $this->stmt->queryList($sql, $args);
        $count = $this->stmt->count();

        if($count > 0)
        {
            throw new exceptions\Registration("User already registered");
        }
        else
        {
            header('Location: ../Registration');
        }

    }

}