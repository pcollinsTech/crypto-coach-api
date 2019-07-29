@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Blog Posts</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('posts.create') }}"> Add New Post</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table className="table table-dark">

    <thead>
        <tr>
            <th scope="col">
                Title
            </th>
            
        </tr>
    </thead>
    @foreach ($posts as $post)
    <tr>
        <th scope="row">{{$post->title}}</th>
       
        <td>
            <a class="btn btn-warning" href="{{ route('posts.show',$post->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
        </td>
    </tr>
    @endforeach

</table>

@stop