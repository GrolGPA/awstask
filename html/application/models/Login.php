<?php
/**
 * @property class Login
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 23.09.17
 * Time: 15:21
 */

namespace application\models;



class Login extends Model
{
    private $stmt;

    /**
     * @return string
     */
    public function run()
    {

        $sql = 'SELECT userID FROM users WHERE username = :username AND password = MD5(:password)';
        $args = array(
            ':username' => $_POST['username'],
            ':password' => $_POST['password']
        );
        $this->stmt = new DB();
        $this->stmt->queryList($sql, $args);
        $count = $this->stmt->count();

        if($count > 0) {
            Session::init();
            Session::set('loggedIn', true);
            return 'login';

        } else {
            return 'anouthorized user';
        }

    }


    /**
     *  Legasy part
     */

    /**
     * @return string
     */
    public function getData()
    {
        $username = $_REQUEST['username'];
        return $username;
    }

}