<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Helpers\RequestHelper;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }
    
    public function index() {  
        // If request('order') exists and it's value is 'oldest'
        if (request()->has('order') && request('order') == 'oldest') {
            // Get posts sorted by oldest to newest
            $posts = Post::oldest();
            
        }else{ // Otherwise
            // Get posts sorted by newest to oldest
            $posts = Post::latest();
        }

        // If query string contains year and month, get posts for that period of time
        $posts->filter([ 'month' => request('month'), 'year' => request('year') ]);

        // Get posts (4 per page)
        $posts = $posts->paginate(4);     
        
        // Show index page
        return view('post.index')
                ->with('posts', $posts)
                ->with('request', new RequestHelper);
    }
    
    public function create() {
        // Show new post form
        return view('post.create')
                ->with('tags', Tag::all());
    }
    
    public function store() {
        // validate request
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);
        
        // Create new post
        $post = auth()->user()->publish( new Post( request( ['title', 'body'] ) ) );
        
        // Attach Tags
        $post->attach_tags(request());
        
        return redirect()->route('home');
    }
    
    public function show($id) {
        $body = '';
        if (session('previous_url')) {
            if(request()->url() == session('previous_url')){
                session()->forget('previous_url');
                $body = session('body');
                session()->forget('body');
            }
        }
        
        // Get the post and show it in the view
        $post = Post::findOrFail($id);
        return view('post.show')
                ->with('post', $post)
                ->with('body', $body);
    }
}
