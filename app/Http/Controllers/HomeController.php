<?php

namespace Azuriom\Http\Controllers;

use Azuriom\Models\Post;
use Azuriom\Models\Like;
use Azuriom\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mostviewed = Post::published()
            ->OrderBy('viewcount', 'desc')
            ->take(2)
            ->get();
        $posts = Post::published()
            ->with('author')
            ->latest('published_at')
            ->take(5)
            ->get();

        return view('home', [
            'posts' => $posts,
            'mostvieweds' => $mostviewed,
        ]);
    }

    public function maintenance(Request $request)
    {
        if (! setting('maintenance-status', false)) {
            return redirect()->home();
        }

        if ($request->user() !== null && $request->user()->can('maintenance.access')) {
            return redirect()->home();
        }

        $maintenanceMessage = setting('maintenance-message', trans('messages.maintenance-message'));

        return view('maintenance', ['maintenanceMessage' => $maintenanceMessage]);
    }
}
