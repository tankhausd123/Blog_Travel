<?php


namespace App\Http\Service\Impl;


use App\Country;
use App\Http\Repository\Impl\CountryRepositoryImpl;
use App\Http\Service\ServiceInterface;

class CountryServiceImpl implements  ServiceInterface
{
    protected $countryRepositoryImpl;
    public function __construct(CountryRepositoryImpl $countryRepositoryImpl)
    {
        $this->countryRepositoryImpl = $countryRepositoryImpl;
    }

    function getAll()
    {

    }

    function create($request)
    {

    }

    function findById($id)
    {
        $this->countryRepositoryImpl->findById($id);
    }

    function delete($object)
    {
        // TODO: Implement delete() method.
    }

    function update($request, $id)
    {
        // TODO: Implement update() method.
    }
}
