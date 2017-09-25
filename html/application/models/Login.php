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

use application\models;


class Login extends Model
{
    private $stmt;

    public function run()
    {
        $username = trim($_POST['username']);

        $sql = 'SELECT userID FROM users WHERE username = :username AND password = :password';
        $args = array(
            ':username' => $_POST['username'],
            ':password' => $_POST['password']
        );
        $this->stmt = new models\DB();
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
     * @return string
     */
    public function getData()
    {
        $username = $_REQUEST['username'];
        return $username;
    }



    /**
     *  Legasy part
     */

//    /**
//     * Function return status of authorization
//     *
//     * @return string
//     */
//    public function getLogin()
//    {
//        if(isset($_REQUEST['username'])&&isset($_REQUEST['password']))
//        {
//            if($_REQUEST['username']== 'test' && $_REQUEST['password']== 'test')
//            {
//                return 'login';
//            }
//            else
//            {
//                return 'anouthorized user';
//            }
//        }
//    }

}