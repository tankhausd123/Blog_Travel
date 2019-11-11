<?php


namespace App\Http\Service\Impl;


use App\Http\Repository\Impl\NationRepositoryImpl;
use App\Http\Service\ServiceEloquent;
use App\Http\Service\ServiceInterface;
use App\Nation;
use Illuminate\Support\Facades\Storage;


class NationServiceImpl implements ServiceInterface
{
    protected $nationRepositoryImpl;
    public function __construct(NationRepositoryImpl $nationRepositoryImpl)
    {
        $this->nationRepositoryImpl = $nationRepositoryImpl;
    }

    function getAll()
    {
        return $this->nationRepositoryImpl->getAll();
    }

    function create($request)
    {
        $nations = new Nation();
        $nations->name = $request->name;
        $nations->information = $request->information;
        if ($request->hasFile('image')){
            $image = $request->image;
            $path = $image->store('image/nation', 'public');
            $nations->image = $path;
        }

        $this->nationRepositoryImpl->save($nations);
    }
    public function findById($id)
    {
        return $this->nationRepositoryImpl->findById($id);
    }
    public function delete($object)
    {
        $this->nationRepositoryImpl->delete($object);
    }
    public function update($request, $id)
    {
        $nations = $this->nationRepositoryImpl->findById($id);
        $nations->name = $request->name;
        $nations->information = $request->information;
        if ($request->hasFile('image')){
            $oldImage = $nations->image;
            if ($oldImage){
                Storage::disk('public')->delete($oldImage);
            }
            $newImage = $request->image;
            $path = $newImage->store('image/nation', 'public');
            $nations->image = $path;
        }
        $this->nationRepositoryImpl->save($nations);
    }
}
