<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Post;
use Stripe\BillingPortal\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::published()
            ->with('author')
            ->orderByDesc('is_pinned')
            ->latest('published_at')
            ->get();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Azuriom\Models\Post  $post
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Post $post)
    {
        $post->load(['author', 'comments.author', 'likes.author' => function ($query) {
            $query->without('role');
        }]);

        $post->increment('viewcount');

        $this->authorize('view', $post);

        return view('posts.show', ['post' => $post]);
    }
}
