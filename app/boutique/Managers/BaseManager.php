<?php
/**
 * Created by PhpStorm.
 * User: Rocio del Pilar
 * Date: 16/01/2015
 * Time: 9:26 AM
 */

namespace boutique\Managers;


abstract class BaseManager {

    protected $entity;
    protected $data;

    public function __construct($entity, $data)
    {
        $this->entity = $entity;
        $this->data   = array_only($data, array_keys($this->getRules()));
    }

    abstract public function getRules();

    public function isValid()
    {
        $rules = $this->getRules();

        $validation = \Validator::make($this->data, $rules);

        if ($validation->fails())
        {
            throw new ValidationException('Validation failed', $validation->messages());
        }
    }

    public function prepareData($data)
    {
        return $data;
    }

    public function save()
    {
        $this->isValid();

        $this->entity->fill($this->prepareData($this->data));
        $this->entity->save();

        return true;
    }
}