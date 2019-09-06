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
    @if($exchange->image_url)
    <img src="{{$exchange->image_url}}" alt="">
    @endif
    <div class="row">
        <div class="form-group container d-flex flex-wrap justify-content-between ">
           
        <div class="col-sm-6 ">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $exchange->name }}" class="form-control" >
            </div>
            <div class="form-group">
                <strong>Slug:</strong>
                <input type="text" name="slug" value="{{ $exchange->slug }}" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <strong>Image Url:</strong>
                <input type="text" name="image_url" value="{{ $exchange->image_url }}" class="form-control" placeholder="Name">
            </div>
            
            <div class="form-group">
                <strong>BG Hex</strong>
                <input type="text" name="bg_hex" value="{{ $exchange->bg_hex }}" class="form-control" >
            </div>
            {{-- <div class="form-group">
                <strong>Date Launched</strong>
                <input type="text" name="date_launched" value="{{ $exchange->date_launched }}" class="form-control" >
            </div> --}}
            <div class="form-group">
                <strong>Origin Country:</strong>
                <input type="text" name="origin_country" value="{{ $exchange->origin_country }}" class="form-control" >
            </div>
            <div class="form-group">
                <strong>Operating Country:</strong>
                <input type="text" name="operating_country" value="{{ $exchange->operating_country }}" class="form-control" >
            </div>
        </div>



        <div class=" col-sm-6 ">
            <h3>Social Media Links</h3>
            <div class="form-group">
                <strong>Facebook:</strong>
                <input type="text" name="facebook_url" value="{{ $exchange->facebook_url }}" class="form-control">
            </div>
            <div class="form-group">
                <strong>LinkedIn:</strong>
                <input type="text" name="linkedin_url" value="{{ $exchange->linkedin_url }}" class="form-control">
            </div>
            <div class="form-group">
                <strong>Twitter:</strong>
                <input type="text" name="twitter_url" value="{{ $exchange->twitter_url }}" class="form-control">
            </div>
            <div class="form-group">
                <strong>Instagram:</strong>
                <input type="text" name="instagram_url" value="{{ $exchange->instagram_url }}" class="form-control">
            </div>
            <h3>Other Links</h3>
            <div class="form-group">
                <strong>Website</strong>
                <input type="text" name="website" value="{{ $exchange->website }}" class="form-control" >
            </div>
            <div class="form-group">
                <strong>Blog:</strong>
                <input type="text" name="blog_url" value="{{ $exchange->blog_url }}" class="form-control">
            </div>
            <div class="form-group">
                <strong>Fee:</strong>
                <input type="text" name="fee_url" value="{{ $exchange->fee_url }}" class="form-control">
            </div>
        </div>
        <div class=" col-sm-6 ">
            <div class="form-group">
                <strong>Hacked</strong>
                <input type="checkbox" name="hacked" value="{{ $exchange->hacked }}" class="form-control">
            </div>
            <div class="form-group">
                <strong>Lending</strong>
                <input type="checkbox" name="lending" value="{{ $exchange->lending }}" class="form-control">
            </div>
            <div class="form-group">
                <strong>Margin Trading</strong>
                <input type="checkbox" name="margin_trading" value="{{ $exchange->margin_trading }}" class="form-control">
            </div>
            <div class="form-group">
                <strong>Negative Trading Fees</strong>
                <input type="checkbox" name="negative_trading_fees" value="{{ $exchange->negative_trading_fees }}" class="form-control">
            </div>
            <div class="form-group">
                <strong>Centralized</strong>
                <input type="checkbox" name="centralized" value="{{ $exchange->centralized }}" class="form-control">
            </div>
            <div class="form-group">
                <strong>Beginner Friendly</strong>
                <input type="checkbox" name="beginner_friendly" value="{{ $exchange->beginner_friendly }}" class="form-control">
            </div>
           
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <strong>Description</strong>
                <textarea type="text" name="description"class="form-control"/>{{ $exchange->description }}</textarea>
            </div>
        </div>
    </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection