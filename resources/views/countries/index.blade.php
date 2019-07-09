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
    @foreach ($countries as $country)
    <tr>
        <th scope="row">{{$country->name}}</th>
        <td>{{$country->symbol}}</td>
        <td>
            <a class="btn btn-warning" href="{{ route('countries.show',$country->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('countries.edit',$country->id) }}">Edit</a>
        </td>
    </tr>
    @endforeach

</table>

@stop