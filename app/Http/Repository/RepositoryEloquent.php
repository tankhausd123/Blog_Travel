<?php


namespace App\Http\Repository;


abstract class RepositoryEloquent implements RepositoryInterface
{
    protected $model;
    public function __construct()
    {
        $this->setModel();
    }
    abstract public function getModel();
    function setModel()
    {
        $this->model = app()->make($this->getModel());
    }
    function getAll()
    {
        return $this->model->all();
    }
    function save($object)
    {
        $object->save();
    }
    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }
    public function delete($object)
    {
        $object->delete();
    }
}
