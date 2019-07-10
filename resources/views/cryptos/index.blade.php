@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Cryptos</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('cryptos.create') }}"> Add New Crypto</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table className="table table-dark">

    <thead>
        <tr>
            <th scope="col">
                Rank
            </th>
            <th scope="col">
                Price (USD)
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
        <td>$ {{number_format($crypto->price_usd)}}</td>
        <td>{{number_format($crypto->circulating_supply)}}</td>
        <td>{{number_format($crypto->total_supply)}}</td>
        <td>{{number_format($crypto->max_supply)}}</td>
        <td>{{number_format($crypto->volume_24hr_usd)}}</td>
        <td>{{round($crypto->percent_change_24h_usd,2)}} %</td>
        <td>{{$crypto->data_last_updated}}</td>
        <td>
            <a class="btn btn-warning" href="{{ route('cryptos.show',$crypto->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('cryptos.edit',$crypto->id) }}">Edit</a>
        </td>
    </tr>
    @endforeach

</table>

@stop