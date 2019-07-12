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