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


    public function updateCoinMetaData($id)
    {
        $key = env('COINMARKETCAP_API_KEY');


        $client = new Client();

        $res = $client->get('https://pro-api.coinmarketcap.com/v1/cryptocurrency/info?CMC_PRO_API_KEY=' . $key . '&id=' . $id);

        $data = json_decode($res->getBody());

        echo $res->getBody();
        Crypto::updateOrCreate(['coin_marketap_id' => $id], [
            "slug" => $data->{'data'}->{$id}->slug,
            "website" => ($data->{'data'}->{$id}->{'urls'}->website[0]) ? $data->{'data'}->{$id}->{'urls'}->website[0] : "",
            "technical_doc_url" => (count($data->{'data'}->{$id}->{'urls'}->technical_doc) >= 1) ? $data->{'data'}->{$id}->{'urls'}->technical_doc[0] : "",
            "source_code_url" => (count($data->{'data'}->{$id}->{'urls'}->source_code) >= 1) ? $data->{'data'}->{$id}->{'urls'}->source_code[0] : "",
            "reddit_url" => (count($data->{'data'}->{$id}->{'urls'}->reddit) >= 1) ? $data->{'data'}->{$id}->{'urls'}->reddit[0] : "",
            "twitter_url" => (count($data->{'data'}->{$id}->{'urls'}->twitter) >= 1) ? $data->{'data'}->{$id}->{'urls'}->twitter[0] : "",
            "message_board_urls" => $data->{'data'}->{$id}->{'urls'}->message_board,
            "announcement_urls" => $data->{'data'}->{$id}->{'urls'}->announcement,
            "explorer_urls" => $data->{'data'}->{$id}->{'urls'}->explorer,
            "chat_urls" => $data->{'data'}->{$id}->{'urls'}->chat,
            "description" => $data->{'data'}->{$id}->description,
            "date_added" => $data->{'data'}->{$id}->date_added,
            "image_url" => $data->{'data'}->{$id}->logo,
            "symbol" => $data->{'data'}->{$id}->symbol,
        ]);
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
            $mineable = false;

            if (in_array("mineable", $cryptoRequest->tags)) {
                $mineable = true;
            }

            $this->updateCoinMetaData($cryptoRequest->id);
            Crypto::updateOrCreate(['symbol' => $cryptoRequest->symbol], [
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
                "mineable" => $mineable,
                "price_usd" => $cryptoRequest->quote->USD->price,
                "volume_24h_usd" => $cryptoRequest->quote->USD->volume_24h,
                "percent_change_1h_usd" => $cryptoRequest->quote->USD->percent_change_1h,
                "percent_change_24h_usd" => $cryptoRequest->quote->USD->percent_change_24h,
                "percent_change_24h_usd" => $cryptoRequest->quote->USD->percent_change_7d,
                "market_cap" => $cryptoRequest->quote->USD->percent_change_7d,
            ]);
            sleep(3);
        }
    }
}
