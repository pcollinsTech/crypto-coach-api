@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-5">
        <div class="pull-left">
            <h2> Show Crypto</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('cryptos.index') }}"> Back</a>
        </div>
    </div>
</div>

<img src="{{$crypto->image_url}}" />
<div class="row ">
    <div class="col-xs-6 col-sm-6 mt-5 col-md-6">
        <div class="form-group">
            {{ $crypto->name }} ({{$crypto->symbol}})
        </div>
        <div class="form-group">
            <strong>Coin Cap ID:</strong>
            {{ $crypto->coincap_id }}
        </div>
        <div class="form-group">
            <strong>Coin Marketcap ID:</strong>
            {{ $crypto->coin_marketap_id }}
        </div>
      
        <div class="form-group">
            <strong>Description:</strong>
            <p>{{ $crypto->description }}</p>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Website:</strong>
            <a href="{{$crypto->website}}" target="__blank">{{ $crypto->website }}</a>
        </div>
        <div class="form-group">
            <strong>Facebook:</strong>
            <a href="{{$crypto->facebook_url}}" target="__blank">{{ $crypto->facebook_url }}</a>
        </div>
        <div class="form-group">
            <strong>LinkedIn:</strong>
            <a href="{{$crypto->linkedin_url}}" target="__blank">{{ $crypto->linkedin_url }}</a>
        </div>
        <div class="form-group">
            <strong>Twitter:</strong>
            <a href="{{$crypto->twitter_url}}" target="__blank">{{ $crypto->twitter_url }}</a>
        </div>
        <div class="form-group">
            <strong>Instagram:</strong>
            <a href="{{$crypto->instagram_url}}" target="__blank">{{ $crypto->instagram_url }}</a>
        </div>
        <div class="form-group">
            <strong>Reddit:</strong>
            <a href="{{$crypto->reddit_url}}" target="__blank">{{ $crypto->reddit_url }}</a>
        </div>
        <div class="form-group">
            <strong>Technical Documentation:</strong>
            <a href="{{$crypto->technical_doc_url}}" target="__blank">{{ $crypto->technical_doc_url }}</a>
        </div>
        <div class="form-group">
            <strong>Source Code:</strong>
            <a href="{{$crypto->source_code_url}}" target="__blank">{{ $crypto->source_code_url }}</a>
        </div>
    </div>
</div>
@endsection