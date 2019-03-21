<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index', [
            'latestPosts' => Post::orderBy('created_at', 'desc')->simplePaginate(3),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->post('title');
        $post->content = $request->post('content');
        $post->save();
        return response()->json([
            'status' => 'OK',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('post.show', [
            'post' => Post::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $post = Post::find($request->post('id'));
        $post->title = $request->post('title');
        $post->content = $request->post('content');
        $post->save();
        return response()->json([
            'status' => 'OK',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Post::destroy($request->post('id'));
        return response()->json([
            'status' => 'OK',
        ]);
    }

    public function apiList()
    {
        return json_encode(Post::orderBy('created_at', 'desc')->simplePaginate());
    }

    public function apiSingle($id)
    {
        return json_encode(Post::find($id));
    }
}
