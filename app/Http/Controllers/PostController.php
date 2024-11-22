<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(12);
        return view('explore', [ 'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     * TODO: update author_id
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'caption' => ['required', 'string'],
            'image_file' => ['required', 'image']
        ]);


        $cloudinaryImage = $request->file('image_file')->storeOnCloudinary('moments');
        $url = $cloudinaryImage->getSecurePath();

        unset($data['image_file']);
        Post::create(array_merge($data, [
            'image_url' => $url,
            'author_id' => auth()->user()->id
        ]));

        return redirect()->route('explore')->with('status', 'post-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $comments = Comment::where(
            'post_id', $post->id
        )->get();
        return view('post.show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->author_id !== request()->user()->id) {
            abort(403);
        }

        $post->delete();

        return to_route('post.my-post')->with('status', 'post-deleted');
    }

    // Toggle like/unlike functionality
    public function toggleLike($postId)
    {
        $post = Post::findOrFail($postId);
        $user = Auth::user();

        // Check if the user has already liked the post
        if ($post->isLikedBy($user)) {
            $post->likes()->detach($user->id); // Unlike the post (remove from pivot table)
            return redirect()->route('explore')->with('status', 'post-unliked');
        } else {
            $post->likes()->attach($user->id); // Like the post (add to pivot table)
            return redirect()->route('explore')->with('status', 'post-liked');
        }
    }

    public function myPosts() {
        $posts = Post::where(
            'author_id', request()->user()->id
        )->orderBy('created_at', 'desc')->simplePaginate(9);
        return view('post.my-post', ['posts' => $posts]);
    }
}
