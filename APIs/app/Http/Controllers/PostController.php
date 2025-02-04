<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    //
    // Create a new post
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return response()->json($post, 201); 
    }

    public function list()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function view($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404); 
        }

        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'string',
            'content' => 'string',
        ]);

        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $post->title = $request->input('title', $post->title);
        $post->content = $request->input('content', $post->content);
        $post->save();

        return response()->json($post);
    }

    public function delete($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted'], 204);
    }
}
