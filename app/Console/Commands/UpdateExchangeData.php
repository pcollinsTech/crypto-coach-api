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
    public function updateExchangeMetaData($id, $slug)
    {
        $key = env('COINMARKETCAP_API_KEY');


        $client = new Client();

        $res = $client->get('https://pro-api.coinmarketcap.com/v1/exchange/info?CMC_PRO_API_KEY=' . $key . '&id=' . $id);

        $data = json_decode($res->getBody());

        echo $res->getBody();
        Exchange::updateOrCreate(['coincap_id' => $slug], [
            "date_launched" => $data->{'data'}->{$id}->date_launched,
            "website" => ($data->{'data'}->{$id}->{'urls'}->website[0]) ? $data->{'data'}->{$id}->{'urls'}->website[0] : "",
            "twitter_url" => (count($data->{'data'}->{$id}->{'urls'}->twitter) >= 1) ? $data->{'data'}->{$id}->{'urls'}->twitter[0] : "",
            "blog_url" => (count($data->{'data'}->{$id}->{'urls'}->blog) >= 1) ? $data->{'data'}->{$id}->{'urls'}->blog[0] : "",
            "fee_url" => (count($data->{'data'}->{$id}->{'urls'}->fee) >= 1) ? $data->{'data'}->{$id}->{'urls'}->fee[0] : "",
            "chat_urls" => $data->{'data'}->{$id}->{'urls'}->chat,
            "description" => $data->{'data'}->{$id}->description,
            "image_url" => $data->{'data'}->{$id}->logo,
            "notice" => $data->{'data'}->{$id}->notice,
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

        $res = $client->get('https://pro-api.coinmarketcap.com/v1/exchange/map?CMC_PRO_API_KEY=' . $key);

        $data = json_decode($res->getBody());



        foreach ($data->{'data'} as $exchangeRequest) {

            $this->updateExchangeMetaData($exchangeRequest->id, $exchangeRequest->slug);
            Exchange::updateOrCreate(['coincap_id' => $exchangeRequest->slug], [
                "name" => $exchangeRequest->name,
                "slug" => $exchangeRequest->slug,
                "first_historical_data" => $exchangeRequest->first_historical_data,
                "last_historical_data" => $exchangeRequest->last_historical_data,

            ]);
            sleep(3);
        }
    }
}
