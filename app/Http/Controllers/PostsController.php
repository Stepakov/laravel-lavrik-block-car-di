<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource( Post::class );
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view( 'posts.index', compact( 'posts' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view( 'posts.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $post = Post::create( $request->validated() );

        return redirect()->route( 'posts.show', $post );
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view( 'posts.show', compact( 'post' ) );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view( 'posts.edit', compact( 'post' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Post $post)
    {
        $post->update( $request->validated() );

        return redirect()->route( 'posts.show', $post->id );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return view( 'posts.index' );
    }
}
