@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Payment</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('payments.index') }}"> Back</a>
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

<form action="{{ route('payments.update',$payment->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $payment->name }}" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <strong>Image Url:</strong>
                <input type="text" name="image_url" value="{{ $payment->image_url }}" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <strong>Website:</strong>
                <input type="text" name="url" value="{{ $payment->url }}" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <strong>Description:</strong>
                <textarea width="150" type="text" name="description" class="form-control" placeholder="Description">{{$payment->descriptipn}}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection