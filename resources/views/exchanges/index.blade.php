@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Exchanges</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('exchanges.create') }}"> Create New Exchange</a>
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
    <tr class="text-center">
        <th scope="row">{{$exchange->rank}}</th>
        <td>{{$exchange->name}}</td>
        <td><a href={{$exchange->website}} target="__blank">{{$exchange->website}}</a></td>
        <td>$ {{number_format($exchange->volume_24hr_usd)}}</td>
        <td>{{round($exchange->percent_total_volume, 2)}} %</td>
        <td>
            <a class="btn btn-warning" href="{{ route('exchanges.show',$exchange->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('exchanges.edit',$exchange->id) }}">Edit</a>
        </td>
    </tr>
    @endforeach
</table>



@endsection