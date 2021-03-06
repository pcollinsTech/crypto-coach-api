<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Fiat;
use App\Http\Controllers\Controller;
use App\Http\Resources\FiatResource;

class FiatController extends Controller
{

    public function index()
    {
        $fiats = FiatResource::collection(Fiat::all());

        return response()->json($fiats, 200);
    }

    public function store(Request $request)
    {
        $data = $request->data;

        foreach ($data as $fiatRequest) {
            $newFiat = new Fiat();
            $object = json_decode(json_encode($fiatRequest), FALSE);
            // Set coincap_id from the id
            $newFiat->name = $object->name;
            $newFiat->symbol = $object->symbol;
            $newFiat->save();
        }

        return response()->json('Fiats saved successfully',  200);
    }
}
