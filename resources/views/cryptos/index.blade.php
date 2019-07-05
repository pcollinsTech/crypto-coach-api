@extends('layouts.app')

@section('content')
<table className="table table-dark">

    <thead>
        <tr>
            <th scope="col">
                Rank
            </th>
            <th scope="col">
                Currency
            </th>
            <th scope="col">
                Symbol
            </th>
            <th scope="col">
                Circulating Supply
            </th>
            <th scope="col">
                Total Supply
            </th>
            <th scope="col">
                Max Supply
            </th>
            <th scope="col">
                24hr Trading Volume
            </th>
            <th scope="col">
                Percent change 24hr
            </th>
            <th scope="col">
                Date Last Updated
            </th>
        </tr>
    </thead>
    @foreach ($cryptos as $crypto)
    <tr>
        <th scope="row">{{$crypto->coin_marketcap_rank}}</th>
        <td>{{$crypto->name}}</td>
        <td>{{$crypto->symbol}}</td>
        <td>{{$crypto->circulating_supply}}</td>
        <td>{{$crypto->total_supply}}</td>
        <td>{{$crypto->max_supply}}</td>
        <td>{{$crypto->volume_24hr_usd}}</td>
        <td>{{$crypto->percent_change_24h_usd}}</td>
        <td>{{$crypto->data_last_updated}}</td>
    </tr>
    @endforeach

</table>

@stop