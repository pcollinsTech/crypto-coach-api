<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CryptoResource extends JsonResource
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
            'coincap_id' => $this->coincap_id,
            'coin_marketap_id' => $this->coin_marketap_id,
            'coin_marketcap_slug' => $this->coin_marketcap_slug,
            'name' => $this->name,
            'symbol' => $this->symbol,
            'data_last_updated' => $this->data_last_updated,
            'price_last_updated' => $this->price_last_updated,
            'date_added' => $this->date_added,
            'mineable' => $this->mineable,
            'num_market_pairs' => $this->num_market_pairs,
            'coin_marketcap_rank' => $this->coin_marketcap_rank,
            'circulating_supply' => $this->circulating_supply,
            'total_supply' => $this->total_supply,
            'max_supply' => $this->max_supply,
            'price_usd' => $this->price_usd,
            'volume_24h_usd' => $this->volume_24h_usd,
            'percent_change_1h_usd' => $this->percent_change_1h_usd,
            'percent_change_24h_usd' => $this->percent_change_24h_usd,
            'percent_change_7d_usd' => $this->percent_change_7d_usd,
            'vwap_24hr' => $this->vwap_24hr,
        ];
    }
}
