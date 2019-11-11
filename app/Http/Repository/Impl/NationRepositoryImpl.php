<?php


namespace App\Http\Repository\Impl;


use App\Http\Repository\RepositoryEloquent;
use App\Http\Repository\RepositoryInterface;
use App\Nation;

class NationRepositoryImpl extends RepositoryEloquent implements RepositoryInterface
{

    public function getModel()
    {
        return Nation::class;
    }
}
