<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crypto;

class CryptoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cryptos = Crypto::all();

        return view('cryptos.index', compact('cryptos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cryptos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        Crypto::create($request->all());

        return redirect()->route('cryptos.index')
            ->with('success', 'Crypto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Crypto $crypto)
    {
        return view('cryptos.show', compact('crypto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Crypto $crypto)
    {
        return view('cryptos.edit', compact('crypto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crypto $crypto)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $crypto->image_url = $request->image_url;
        $crypto->name = $request->name;
        $crypto->slug = $request->slug;
        $crypto->symbol = $request->symbol;
        $crypto->website = $request->website;
        $crypto->technical_doc_url = $request->technical_doc_url;
        $crypto->source_code_url = $request->source_code_url;
        $crypto->facebook_url = $request->facebook_url;
        $crypto->instagram_url = $request->instagram_url;
        $crypto->twitter_url = $request->twitter_url;
        $crypto->linkedin_url = $request->linkedin_url;
        $crypto->reddit_url = $request->reddit_url;
        $crypto->message_board_urls = $request->source_code_url;
        $crypto->announcement_urls = $request->source_code_url;
        $crypto->chat_urls = $request->source_code_url;
        $crypto->explorer_urls = $request->source_code_url;
        $crypto->data_last_updated = $request->
        $crypto->price_last_updated = $request->
        $crypto->date_added = $request->
        $crypto->mineable = $request->mineable;
        $crypto->num_market_pairs = $request->num_market_pairs;
        $crypto->coin_marketcap_rank = $request->coin_marketcap_rank;
        $crypto->circulating_supply = $request->circulating_supply;
        $crypto->market_cap = $request->market_cap;
        $crypto->total_supply = $request->total_supply;
        $crypto->max_supply = $request->max_supply;
        $crypto->percent_change_24h_usd = $request->percent_change_24h_usd;
        $crypto->price_usd = $request->price_usd;
        $crypto->percent_change_1h_usd = $request->percent_change_1h_usd;
        $crypto->volume_24h_usd = $request->volume_24h_usd;
        $crypto->percent_change_7d_usd = $request->percent_change_7d_usd;
        $crypto->vwap_24hr = $request->vwap_24hr;
        $crypto->description = $request->description;
        $crypto->fees = $request->fees;

        return redirect()->route('cryptos.index')
            ->with('success', 'Crypto updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crypto $crypto)
    {
        $crypto->delete();

        return redirect()->route('cryptos.index')
            ->with('success', 'Crypto deleted successfully');
    }
}
