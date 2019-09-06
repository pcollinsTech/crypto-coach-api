<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exchange;
use App\Crypto;
use App\Payment;
use App\Fiat;
use App\Country;
use App\Http\Resources\ExchangeListResource;
use Image;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exchanges = ExchangeListResource::collection(Exchange::all());

        return view('exchanges.index', compact('exchanges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exchanges.create');
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

        Exchange::create($request->all());

        return redirect()->route('exchanges.index')
            ->with('success', 'Exchange created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Exchange $exchange)
    {
        return view('exchanges.show', compact('exchange'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Exchange $exchange)
    {
        $cryptos = Crypto::all();
        $payments = Payment::all();
        $countries = Country::all();
        $fiats = Fiat::all();
        return view('exchanges.edit', compact('exchange', 'cryptos', 'payments', 'countries', 'fiats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exchange $exchange)
    {

        $request->validate([
            'name' => 'required',
        ]);
        $exchange->slug = $request->slug;
        $exchange->origin_country = $request->origin_country;
        $exchange->operating_country = $request->operating_country;
        $exchange->hacked = $request->hacked;
        $exchange->lending = $request->lending;
        $exchange->margin_trading = $request->margin_trading;
        $exchange->negative_trading_fees = $request->negative_trading_fees;
        $exchange->website = $request->website;
        $exchange->centralized = $request->centralized;
        $exchange->beginner_friendly = $request->beginner_friendly;
        $exchange->percent_total_volume = $request->percent_total_volume;
        $exchange->socket = $request->socket;
        $exchange->volume_24hr_usd = $request->volume_24hr_usd;
        $exchange->coincap_updated_at = $request->coincap_updated_at;
        $exchange->trading_pairs = $request->trading_pairs;
        $exchange->instagram_url = $request->instagram_url;
        $exchange->twitter_url = $request->twitter_url;
        $exchange->linkedin_url = $request->linkedin_url;
        $exchange->facebook_url = $request->facebook_url;
        $exchange->grade = $request->grade;
        $exchange->rank = $request->rank;
        $exchange->bg_hex = $request->bg_hex;
        $exchange->data_start = $request->data_start;
        $exchange->data_end = $request->data_end;
        $exchange->data_quote_start = $request->data_quote_start;
        $exchange->data_quote_end = $request->data_quote_end;
        $exchange->data_orderbook_start = $request->data_orderbook_start;
        $exchange->data_orderbook_end = $request->data_orderbook_end;
        $exchange->data_trade_start = $request->data_trade_start;
        $exchange->data_trade_end = $request->data_trade_end;
        $exchange->data_trade_count = $request->data_trade_count;
        $exchange->data_symbols_count = $request->data_symbols_count;
        $exchange->description = $request->description;
        $exchange->fees = $request->fees;
        $exchange->address = $request->address;
        $exchange->content = $request->content;

       
        $exchange->save();

        return redirect()->route('exchanges.index')
            ->with('success', 'Exchange updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exchange $exchange)
    {
        $exchange->delete();

        return redirect()->route('exchanges.index')
            ->with('success', 'Exchange deleted successfully');
    }
}
