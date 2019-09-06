@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Crypto</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('cryptos.index') }}"> Back</a>
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

<form action="{{ route('cryptos.update',$crypto->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Image Url:</strong>
                <input type="text" name="image_url" value="{{ $crypto->image_url }}" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $crypto->name }}" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <strong>Slug:</strong>
                <input type="text" name="slug" value="{{ $crypto->slug }}" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <strong>Symbol:</strong>
                <input type="text" name="symbol" value="{{ $crypto->symbol }}" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" id="comment" rows="8" cols="50">{{$crypto->description}}</textarea>
            </div>
            <div class="form-group">
                <strong>Fees:</strong>
                <textarea class="form-control" id="comment" rows="8" cols="50">{{$crypto->fees}}</textarea>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Website:</strong>
                <input type="text" name="website" value="{{ $crypto->website }}" class="form-control" placeholder="Website">
            </div>
            <div class="form-group">
                <strong>Facebook:</strong>
                <input type="text" name="facebook_url" value="{{ $crypto->facebook_url }}" class="form-control" placeholder="Facebool">
            </div>
            <div class="form-group">
                <strong>LinkedIn:</strong>
                <input type="text" name="linkedin_url" value="{{ $crypto->linkedin_url }}" class="form-control" placeholder="LinkedIn">
            </div>
            <div class="form-group">
                <strong>Twitter:</strong>
                <input type="text" name="twitter_url" value="{{ $crypto->twitter_url }}" class="form-control" placeholder="Twitter">
            </div>
            <div class="form-group">
                <strong>Instagram:</strong>
                <input type="text" name="instagram_url" value="{{ $crypto->instagram_url }}" class="form-control" placeholder="Instagram">
            </div>
                <div class="form-group">
                    <strong>Reddit:</strong>
                    <input type="text" name="reddit_url" value="{{ $crypto->reddit_url }}" class="form-control" placeholder="Reddit">
                </div>
            <div class="form-group">
                <strong>Technical Documentation:</strong>
                <input type="text" name="technical_doc_url" value="{{ $crypto->technical_doc_url }}" class="form-control" placeholder="Technical Documentation">
            </div>
            <div class="form-group">
                <strong>Source Code:</strong>
                <input type="text" name="source_code_url" value="{{ $crypto->source_code_url }}" class="form-control" placeholder="Source Code">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection