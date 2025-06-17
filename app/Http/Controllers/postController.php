<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index(){
        $list_post = post::with('user')->get();
        return view('post.index', compact('list_post'));
    }

    public function create(){
        return view('post.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post created successfully');
    }

    public function edit(Post $post){
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $post){

        if($request->user()->cannot('update', $post)){
            abort(403);
        }

        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post){

        Gate::Authorize('delete', $post);
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully');
    }
}
