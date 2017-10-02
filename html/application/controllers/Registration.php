<?php
/**
 * @property Registration
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 25.09.17
 * Time: 17:46
 */

namespace application\controllers;

use application\models;
use application\views;

class Registration extends Controller
{
    public $model;
    public $view;

    /**
     * Registration constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this ->model = new models\Registration();
    }

    public function run()
    {
        $this->model->run();
        $this->view = new views\View();
        $this->view->genRegForm('Registration.php', 'Template.php');

    }

}