<?php
/**
 * @property class Controller
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 23.09.17
 * Time: 14:30
 */


namespace application\controllers;

use application\models;
use application\views;


class Controller
{
    protected $model;
    protected $view;
    protected $config;

    function __construct()
    {
        $this->view = new views\View();
        /**
         * Setting DB configs in registy
         */
        $this->config = new models\Config();
        $this->config ->setRegistry();

    }

    /**
     * default action
     */
    function index()
    {


    }

    function run()
    {
        $this->model->run();
    }

}