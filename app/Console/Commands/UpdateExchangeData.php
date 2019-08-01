<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use App\Exchange;

class UpdateExchangeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:exchange-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Daily Exchange Data Update';

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
        $client = new Client(['base_uri' => 'https://api.coincap.io/v2/']);
        $res = $client->get('exchanges');

        $data = json_decode($res->getBody());




        foreach ($data->{'data'} as $exchangeRequest) {
            var_dump($exchangeRequest);
            Exchange::where('coincap_id', $exchangeRequest->exchangeId)
                ->update([
                    "coincap_id" => $exchangeRequest->exchangeId,
                    "rank" => $exchangeRequest->rank,
                    "percent_total_volume" => number_format((float) $exchangeRequest->percentTotalVolume, 2, '.', ''),
                    "volume_24hr_usd" => number_format((float) $exchangeRequest->volumeUsd, 2, '.', ''),
                    "trading_pairs" => $exchangeRequest->tradingPairs,
                    "socket" => $exchangeRequest->socket,
                    "website" => $exchangeRequest->exchangeUrl,
                    "coincap_updated_at" => $exchangeRequest->updated,
                ]);
        }
    }
}
