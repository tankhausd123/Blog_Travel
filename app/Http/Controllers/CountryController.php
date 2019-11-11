<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Repository\Impl\NationRepositoryImpl;
use App\Http\Requests\CreateCountryRequest;
use App\Http\Requests\EditCountryRequest;
use App\Http\Service\Impl\CountryServiceImpl;
use App\Http\Service\Impl\NationServiceImpl;
use App\Nation;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CountryController extends Controller
{
    protected $countryServiceImpl;
    protected $nationServiceImpl;

    public function __construct(CountryServiceImpl $countryServiceImpl,
                                NationServiceImpl $nationServiceImpl)
    {
        $this->nationServiceImpl = $nationServiceImpl;
        $this->countryServiceImpl = $countryServiceImpl;
    }

    function getCountry($id)
    {
        $nation = $this->nationServiceImpl->findById($id);
        $countries = Country::where('nation_id', $nation->id)->get();
        return view('countries.list', compact('countries', 'nation'));
    }
    function create($id)
    {
        if (Gate::allows('crud-user')) {
        $nation = $this->nationServiceImpl->findById($id);
        return view('countries.create', compact('nation'));
        }
        abort(403,'');
    }
    function store(CreateCountryRequest $request, $id)
    {
        $country = new Country();
        $country->name = $request->name;
        $country->information = $request->information;
        $country->nation_id = $id;
        $country->query_api = $request->query_api;
        if ($request->hasFile('image')){
            $image = $request->image;
            $path = $image->store('image/country', 'public');
            $country->image = $path;
        }

        $country->save();
        return redirect()->route('countries.list', $id);
    }
    function info($id)
    {
        $country = Country::find($id);
        $query_api = $country->query_api;
        $client = new Client();
        $res = $client->get('http://api.weatherstack.com/current?access_key=c43dc3e792bbf53458cbbc221cb18216&query='.$query_api);
        $data = $res->getBody();
        $dataJson = $data->getContents();
        $weather =json_decode($dataJson);
//        dd($weather);
        return view('countries.info', compact("country", 'weather'));
    }
    function delete($id)
    {
        if (Gate::allows('crud-user')) {
            $country = Country::find($id);
            $nation_id = $country->nation_id;
            $country->delete();
            return redirect()->route('countries.list', $nation_id);
        }
        abort(403,'');
    }
    function edit($id)
    {
        if (Gate::allows('crud-user')) {
        $country = Country::find($id);
        return view('countries.edit', compact('country'));
        }
        abort(403,'');
    }
    function update(EditCountryRequest $request, $id)
    {
        $country = Country::find($id);
        $country->name = $request->name;
        $country->information = $request->information;
        if ($request->hasFile('image')){
            $oldImage = $country->image;
            if ($oldImage){
                Storage::disk('public')->delete($oldImage);
            }
            $newImage = $request->image;
            $path = $newImage->store('image/country', 'public');
            $country->image = $path;
        }
        $country->save();
        $nation = $this->nationServiceImpl->findById($country->nation_id);
        $countries = Country::where('nation_id', $nation->id)->get();
        return view('countries.list', compact('nation', 'countries'));
    }
}
