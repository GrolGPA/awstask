<?php
/**
 * @property class Session
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 24.09.17
 * Time: 20:00
 */

namespace application\models;



class Session {
    public static function init() {
        @session_start();
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        if(isset($_SESSION[$key]))
            return $_SESSION[$key];
    }

    public static function destroy() {

        session_destroy();
    }
}