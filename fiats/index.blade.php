@extends('layouts.app')

@section('content')
<table className="table table-dark">

    <thead>
        <tr>
            <th scope="col">
                Name
            </th>
            <th scope="col">
                Symbol
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
    @foreach ($fiats as $fiat)
    <tr>
        <th scope="row">{{$fiat->name}}</th>
        <td>{{$fiat->symbol}}</td>
        <td>
            <a class="btn btn-warning" href="{{ route('fiats.show',$fiat->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('fiats.edit',$fiat->id) }}">Edit</a>
        </td>
    </tr>
    @endforeach

</table>

@stop