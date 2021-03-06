<?php
/**
 * @property class Model
 *
 * @autor Pavel Gavrikov <gpolbox@gmail.com>
 *
 * Date: 22.09.17
 * Time: 22:48
 */

namespace application\models;


class Model
{
    protected $stmt;

    public function getData($sql)
    {
        $this->stmt = new DB();
        $data = $this->stmt->getData($sql);
        return $data;
    }

    /**
     * @param $sql
     * @param $args
     * @return DB
     */
    public function run($sql, $args)
    {
        $this->stmt = new DB();
        $this->stmt->queryList($sql, $args);
        return $this->stmt;
    }
}
