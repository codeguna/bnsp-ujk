<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tags = Tag::groupBy('name')->select('name')->get();
        $posts = Post::paginate();
        return view('v2.home', compact('posts','tags'))
        ->with('i', (request()->input('page', 1) - 1) * $posts->perPage());
    }
}
