@extends('layouts.app')

@section('content')
<table className="table table-dark">

    <thead>
        <tr>
            <th scope="col">
                Name
            </th>
            <th scope="col">
                URL
            </th>
            <th scope="col">
                Description
            </th>
            <th scope="col">
                Image
            </th>

        </tr>
    </thead>
    @foreach ($payments as $payment)
    <tr>
        <th scope="row">{{$payment->name}}</th>
        <td>{{$payment->url}}</td>
        <td>{{$payment->description}}</td>
        <td>{{$payment->image}}</td>
        <td>
            <a class="btn btn-warning" href="{{ route('payments.show',$payment->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('payments.edit',$payment->id) }}">Edit</a>
        </td>
    </tr>
    @endforeach

</table>

@stop