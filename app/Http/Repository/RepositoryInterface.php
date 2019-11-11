<?php


namespace App\Http\Repository;


interface RepositoryInterface
{
    function getAll();
    function save($object);
    function findById($id);
    function delete($object);
}
