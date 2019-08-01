<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = PostResource::collection(Post::all());

        return response()->json($posts, 200);
    }
    public function show($param)
    {
        $post = PostResource::collection(Post::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail());

        return response()->json($post, 200);
    }
}
