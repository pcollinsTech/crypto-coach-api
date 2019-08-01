<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Exchange;
use App\Crypto;
use App\Country;
use App\Fiat;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExchangeListResource;

class ExchangeController extends Controller
{
    public function index()
    {
        $exchanges = ExchangeListResource::collection(Exchange::all());

        return response()->json($exchanges, 200);
    }

    public function storeRelations(Request $request)
    {
        $data = $request->data;
        foreach ($data as $exchangeRequest) {
            $object = json_decode(json_encode($exchangeRequest), FALSE);
            $exchange = Exchange::where('name', $object->name)->first();
            $exchange->centralized = $object->centralized;
            $exchange->beginner_friendly = $object->beginner_friendly;

            $cryptos = [];
            foreach ((array) $object->coins as $coin) {
                $crypto = json_decode(json_encode(Crypto::where('symbol', $coin)->first()), FALSE);
                if ($crypto) {
                    array_push($cryptos, $crypto->id);
                }
            };
            $fiats = [];
            foreach ((array) $object->fiat as $currency) {
                $currency = json_decode(json_encode(Fiat::where('symbol', $currency)->first()), FALSE);
                if ($currency) {
                    array_push($fiats, $currency->id);
                }
            };

            $exchange->cryptos()->attach($cryptos);
            $exchange->fiats()->attach($fiats);
            $exchange->countries()->attach(Country::all());
            $exchange->update();
        }
        return response()->json('Exchanges relations successfully',  200);
    }

    public function storeCoinCap(Request $request)
    {
        $data = $request->data;
        foreach ($data as $exchangeRequest) {
            $newExchange = new Exchange;
            $object = json_decode(json_encode($exchangeRequest), FALSE);

            // Set coincap_id from the exchange_id
            $newExchange->coincap_id = $object->exchangeId;
            $newExchange->name = $object->name;
            $newExchange->rank = $object->rank;
            $newExchange->percent_total_volume = number_format((float) $object->percentTotalVolume, 2, '.', '');
            $newExchange->volume_24hr_usd = number_format((float) $object->volumeUsd, 2, '.', '');
            $newExchange->trading_pairs = $object->tradingPairs;
            $newExchange->socket = $object->socket;
            $newExchange->website = $object->exchangeUrl;
            $newExchange->coincap_updated_at = $object->updated;


            // $newExchange->cryptos()->attach($crypto);
            $newExchange->save();
        }

        return response()->json('Exchanges saved successfully',  200);
    }
}
