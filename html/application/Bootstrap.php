<?php

/**
 * @property class AppStarter
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 22.09.17
 * Time: 22:13
 */
require_once __DIR__ . '/SplClassLoader.php';

use application\controllers;
use application\exceptions;
use application\models;

class AppStarter
{

    private static function autoloader ()
    {

        $classLoader = new SplClassLoader('application', './');
        $classLoader->register();
    }

    static function launch ()
    {

        try
        {
            /**
             * starting autoloading classes
             */
            self::autoloader();

            $session_start = new controllers\Main();
            $session_start->action_index();


        }
        catch (exceptions\AutoloadException $e)
        {
            die ( $e ->getMessage() );
        }
        catch (exceptions\RuntimeException $e)
        {
            die ( $e ->getMessage() );
        }

        catch (exceptions\DbException $e)
        {
            die ( $e ->getMessage() );
        }
        catch (\Exeption $e)
        {
            die ( $e ->__toString() );
        }

        /**
         * TESTS
         */

        /**
         * test of Regestry
         */
//        $req = controllers\Registry::getInstance();
//        print_r($req->getResource(user));


    }


}