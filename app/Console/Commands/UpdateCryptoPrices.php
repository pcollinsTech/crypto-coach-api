<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use App\Crypto;

class UpdateCryptoPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:crypto-prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $key = env('COINMARKETCAP_API_KEY');


        $client = new Client();

        $res = $client->get('https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?CMC_PRO_API_KEY=' . $key);

        $data = json_decode($res->getBody());


        foreach ($data->{'data'} as $cryptoRequest) {
            Crypto::where('coin_marketap_id', $cryptoRequest->id)
                ->update([
                    "coin_marketap_id" => $cryptoRequest->id,
                    "coin_marketcap_rank" => $cryptoRequest->cmc_rank,
                    "name" => $cryptoRequest->name,
                    "symbol" => $cryptoRequest->symbol,
                    "data_last_updated" => $cryptoRequest->last_updated,
                    "price_last_updated" => $cryptoRequest->quote->USD->last_updated,
                    "date_added" => $cryptoRequest->date_added,
                    "num_market_pairs" => $cryptoRequest->num_market_pairs,
                    "circulating_supply" => $cryptoRequest->circulating_supply,
                    "total_supply" => $cryptoRequest->total_supply,
                    "max_supply" => $cryptoRequest->max_supply,
                    "volume_24h_usd" => $cryptoRequest->quote->USD->volume_24h,
                    "price_usd" => $cryptoRequest->quote->USD->price,
                    "percent_change_1h_usd" => $cryptoRequest->quote->USD->percent_change_1h,
                    "percent_change_24h_usd" => $cryptoRequest->quote->USD->percent_change_24h,
                    "percent_change_24h_usd" => $cryptoRequest->quote->USD->percent_change_7d,
                ]);
        }
    }
}
