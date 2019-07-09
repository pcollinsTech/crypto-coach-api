<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\Http\Resources\CountryResource;

class CountryController extends Controller
{

    public function index()
    {
        $countries = CountryResource::collection(Country::all());

        return response()->json($countries, 200);
    }

    public function store(Request $request)
    {
        $data = $request->data;
        foreach ($data as $countryRequest) {
            $newCountry = new Country();
            $object = json_decode(json_encode($countryRequest), FALSE);
            // Set coincap_id from the id
            $newCountry->name = $object->name;
            $newCountry->symbol = $object->symbol;
            $newCountry->save();
        }

        return response()->json('Countries saved successfully',  200);
    }
}
