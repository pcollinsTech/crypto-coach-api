@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Fiat</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('fiats.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('fiats.update',$fiat->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $fiat->name }}" class="form-control" placeholder="Name">
            </div>
       
            <div class="form-group">
                <strong>Symbol:</strong>
                <input type="text" name="symbol" value="{{ $fiat->symbol }}" class="form-control" placeholder="Symbol">
            </div>
       
            <div class="form-group">
                <strong>Image Url:</strong>
                <input type="text" name="image_url" value="{{ $fiat->image_url }}" class="form-control" placeholder="Symbol">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection