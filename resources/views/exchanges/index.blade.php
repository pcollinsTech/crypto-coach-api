@extends('layouts.app')

@section('content')
<table className="table table-dark">

    <thead>
        <tr>
            <th scope="col">
                Rank
            </th>
            <th scope="col">
                Exchange
            </th>
            <th scope="col">
                Website
            </th>
            <th scope="col">
                24hr Trading Volume
            </th>
            <th scope="col">
                Total Volume Percent
            </th>
        </tr>
    </thead>
    @foreach ($exchanges as $exchange)
    <tr>
        <th scope="row">{{$exchange->rank}}</th>
        <td>{{$exchange->name}}</td>
        <td><a href={{$exchange->website}} target="__blank">{{$exchange->website}}</a></td>
        <td>{{round($exchange->volume_24hr_usd)}}</td>
        <td>{{$exchange->percent_total_volume}}</td>
    </tr>
    @endforeach

</table>

@stop