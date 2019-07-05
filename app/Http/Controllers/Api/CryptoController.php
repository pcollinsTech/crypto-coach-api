<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Crypto;
use App\Http\Controllers\Controller;

class CryptoController extends Controller
{
    public function index()
    {
        $cryptos = Crypto::all();

        return response()->json($cryptos, 200);
    }

    public function storeCoinCap(Request $request)
    {
        $data = $request->data;
        foreach ($data as $crytpoRequest) {
            $newCrypto = new Crypto();
            $object = json_decode(json_encode($crytpoRequest), FALSE);
            // Set coincap_id from the id
            $newCrypto->coincap_id = $object->id;
            $newCrypto->save();
        }

        return response()->json('Cryptos saved successfully',  200);
    }
    public function storeCoinMarketCap(Request $request)
    {
        $data = $request->data;
        foreach ($data as $crytpoRequest) {


            $newCrypto = new Crypto();
            $object = json_decode(json_encode($crytpoRequest), FALSE);
            // Set coin_marketap_id from the id

            /// I Have Removed the Platrom the coin is used on from here,
            /// NEED TO COME BACK TO

            $newCrypto->coin_marketap_id = $object->id;
            $newCrypto->coin_marketcap_rank = $object->cmc_rank;
            $newCrypto->name = $object->name;
            $newCrypto->symbol = $object->symbol;
            $newCrypto->data_last_updated = $object->last_updated;
            $newCrypto->price_last_updated = $object->quote->USD->last_updated;
            $newCrypto->date_added = $object->date_added;
            $newCrypto->num_market_pairs = $object->num_market_pairs;
            $newCrypto->circulating_supply = $object->circulating_supply;
            $newCrypto->total_supply = $object->total_supply;
            $newCrypto->max_supply = $object->max_supply;




            $newCrypto->volume_24h_usd = number_format((float) $object->quote->USD->volume_24h, 2, '.', '');
            $newCrypto->price_usd = number_format((float) $object->quote->USD->price, 2, '.', '');
            $newCrypto->percent_change_1h_usd = number_format((float) $object->quote->USD->percent_change_1h, 2, '.', '');
            $newCrypto->percent_change_24h_usd = number_format((float) $object->quote->USD->percent_change_24h, 2, '.', '');
            $newCrypto->percent_change_24h_usd = number_format((float) $object->quote->USD->percent_change_7d, 2, '.', '');

            if (!empty($object->tags)) {
                $newCrypto->mineable = true;
            }





            $newCrypto->save();
        }


        return response()->json('Cryptos saved successfully',  200);
    }
}
