<?php


namespace App\Http\Repository\Impl;


use App\Country;
use App\Http\Repository\RepositoryEloquent;
use App\Http\Repository\RepositoryInterface;
use App\Nation;

class CountryRepositoryImpl extends RepositoryEloquent implements RepositoryInterface
{

    public function getModel()
    {
        return Country::class;
    }
    public function findById($id)
    {
        $nation = Nation::find($id);
        $countries = Country::where('nation_id', $nation->id)->get();
        return $countries;
    }
}
