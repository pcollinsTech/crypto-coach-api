@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Exchange</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('exchanges.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Rank:</strong>
            {{ $exchange->rank }}
        </div>
        <div class="form-group">
            <strong>Name:</strong>
            {{ $exchange->name }}
        </div>
        <div class="form-group">
            <strong>CoinCap ID:</strong>
            {{ $exchange->coincap_id }}
        </div>
        <div class="form-group">
            <strong>website:</strong>
            {{ $exchange->website }}
        </div>
        <div class="form-group">
            <strong>Name:</strong>
            {{ $exchange->name }}
        </div>
        <div class="form-group">
            <strong>Name:</strong>
            {{ $exchange->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
    </div>
</div>
@endsection