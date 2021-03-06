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


    /**
     * @return string
     */
    public function run()
    {

        $sql = 'SELECT `userID`, `categoryID` FROM `users` WHERE `username` = :username AND `password` = md5(:password)';
        $args = array(
            ':username' => $_POST['username'],
            ':password' => $_POST['password']
        );
        $this->stmt = parent::run($sql, $args);
        $user = $this->stmt->fetch();
        $count = $this->stmt->count();

        if($count > 0)
        {
            Session::init();
            Session::set('loggedIn', true);

            Session::set('username', $_POST['username']);

            /** Seek type of family member */
            $usercat = $user['0']['categoryID'];
            Session::set('member', $usercat);



            return 'login';
        }
        else
        {
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


}