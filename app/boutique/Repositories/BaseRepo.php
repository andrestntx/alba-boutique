<?php
/**
 * Created by PhpStorm.
 * User: Rocio del Pilar
 * Date: 16/01/2015
 * Time: 9:23 AM
 */

namespace boutique\Repositories;


abstract class BaseRepo {

    protected $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    abstract public function getModel();

    public function find($id)
    {
        return $this->model->find($id);
    }
}