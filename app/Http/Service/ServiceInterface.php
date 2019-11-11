<?php


namespace App\Http\Service;


interface ServiceInterface
{
    function getAll();
    function create($request);
    function findById($id);
    function delete($object);
    function update($request, $id);

}
