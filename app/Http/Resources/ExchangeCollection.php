<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ExchangeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
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
            'coins' => CryptoResource::collection($this->cryptos()),
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
            'instagram_link' => $this->instagram_link,
            'coincap_updated_at' => $this->coincap_updated_at,
            'instagram_link' => $this->instagram_link,
            'twitter_link' => $this->twitter_link,
            'facebook_link' => $this->facebook_link,
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
            'payments' => $this->payments,
            'coins' => CryptoResource::collection($this->cryptos()),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
