@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Exchange</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('exchanges.index') }}"> Back</a>
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

<form action="{{ route('exchanges.update',$exchange->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="form-group row">
            @if($exchange->image_url)
            <img src="/images/{{$exchange->image_url}}" alt="">
            @endif
            <label for="image_url" class="col-md-4 col-form-label text-md-right">Exchange Logo</label>
            <div class="col-md-6">
                <input id="image_url" type="file" class="form-control" name="image_url">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $exchange->name }}" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <strong>CoinCap ID:</strong>
                <input type="text" name="coincap_id" value="{{ $exchange->coincap_id }}" class="form-control" placeholder="CoinCap ID">
            </div>
            <div class="form-group">
                <strong>Origin Country:</strong>
                <input type="text" name="origin_country" value="{{ $exchange->origin_country }}" class="form-control" placeholder="Origin Country">
            </div>
            <div class="form-group">
                <strong>Operating Country:</strong>
                <input type="text" name="operating_country" value="{{ $exchange->operating_country }}" class="form-control" placeholder="Operating Country">
            </div>
            <div class="form-group">
                <strong>Fees:</strong>
                <textarea type="text" widt="250px" name="fees" value="{{ $exchange->fees }}" class="form-control" placeholder="Fees"> </textarea>
            </div>
            <div class="form-group">
                <strong>Address:</strong>
                <input type="text" name="address" value="{{ $exchange->address }}" class="form-control" placeholder="Address">
            </div>
        </div>



        <div class="col-xs-6 col-sm-6 col-md-6">
            <h3>Social Media Links</h3>
            <div class="form-group">
                <strong>Facebook:</strong>
                <input type="text" name="facebook_link" value="{{ $exchange->facebook_link }}" class="form-control" placeholder="Facebook">
            </div>
            <div class="form-group">
                <strong>LinkedIn:</strong>
                <input type="text" name="linkedin_link" value="{{ $exchange->linkedin_link }}" class="form-control" placeholder="LinkedIn">
            </div>
            <div class="form-group">
                <strong>Twitter:</strong>
                <input type="text" name="twitter_link" value="{{ $exchange->twitter_link }}" class="form-control" placeholder="Twitter">
            </div>
            <div class="form-group">
                <strong>Instagram:</strong>
                <input type="text" name="instagram_link" value="{{ $exchange->instagram_link }}" class="form-control" placeholder="Instagram">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection