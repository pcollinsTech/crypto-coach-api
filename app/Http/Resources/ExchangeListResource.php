<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CryptoResource;
use App\Http\Resources\FiatResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\PaymentResource;

class ExchangeListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'origin_country' => $this->origin_country,
            'operating_country' => $this->operating_country,
            'hacked' => $this->hacked,
            'lending' => $this->lending,
            'margin_trading' => $this->margin_trading,
            'negative_trading_fees' => $this->negative_trading_fees,
            'website' => $this->website,
            'centralized' => $this->centralized,
            'beginner_friendly' => $this->beginner_friendly,
            'percent_total_volume' => $this->percent_total_volume,
            'socket' => $this->socket,
            'volume_24hr_usd' => $this->volume_24hr_usd,
            'trading_pairs' => $this->trading_pairs,
            'coincap_updated_at' => $this->coincap_updated_at,
            'social_link_instagram' => $this->instagram_link,
            'social_link_twitter' => $this->twitter_link,
            'social_link_facebook' => $this->facebook_link,
            'grade' => $this->grade,
            'rank' => $this->rank,
            'bg_hex' => $this->bg_hex,
            'data_start' => $this->data_start,
            'data_end' => $this->data_end,
            'data_quote_start' => $this->data_quote_start,
            'data_quote_end' => $this->data_quote_end,
            'data_orderbook_start' => $this->data_orderbook_start,
            'data_orderbook_end' => $this->data_orderbook_end,
            'data_trade_start' => $this->data_trade_start,
            'data_trade_end' => $this->data_trade_end,
            'data_trade_count' => $this->data_trade_count,
            'data_symbols_count' => $this->data_symbols_count,
            'description' => $this->description,
            'fees' => $this->fees,
            'address' => $this->address,
            'cryptos' => CryptoResource::collection($this->cryptos)->pluck('id'),
            'fiats' => FiatResource::collection($this->fiats)->pluck('id'),
            'payments' => PaymentResource::collection($this->payments)->pluck('id'),
            'countries' => CountryResource::collection($this->countries)->pluck('id'),
        ];
    }
}
