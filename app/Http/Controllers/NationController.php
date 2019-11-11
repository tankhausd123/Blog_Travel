<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNationRequest;
use App\Http\Requests\EditNationRequest;
use App\Http\Service\Impl\NationServiceImpl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class NationController extends Controller
{
    protected $nationServiceImpl;

    public function __construct(NationServiceImpl $nationServiceImpl)
    {
        $this->nationServiceImpl = $nationServiceImpl;
    }

    function list()
    {
        $nations = $this->nationServiceImpl->getAll();
        return view('nations.list', compact('nations'));
    }

    function create()
    {
        if (Gate::allows('crud-user')) {
            return view('nations.create');
        }
        abort(403, '');

    }

    function store(CreateNationRequest $request)
    {
        $this->nationServiceImpl->create($request);
        return redirect()->route('nations.list');
    }

    function delete($id)
    {
        if (Gate::allows('crud-user')) {
            $nations = $this->nationServiceImpl->findById($id);
            $image = $nations->image;
            if ($image) {
                Storage::disk('public')->delete($image);
            }
            $this->nationServiceImpl->delete($nations);
            return redirect()->route('nations.list');
        }
        abort(403, '');
    }

    function edit($id)
    {
        if (Gate::allows('crud-user')) {
        $nations = $this->nationServiceImpl->findById($id);
        return view('nations.edit', compact('nations'));
        }
        abort(403, '');
    }

    function update(EditNationRequest $request, $id)
    {
        $this->nationServiceImpl->update($request, $id);
        return redirect()->route('nations.list');
    }
}
