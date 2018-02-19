<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Helpers\RequestHelper;

class TagController extends Controller
{
    public function index(Tag $tag) {
         // If request('order') exists and it's value is 'oldest'
        if (request()->has('order') && request('order') == 'oldest') {
            // Get Posts that have this tag attached to, and sort them by oldest to newest
            $posts = $tag->posts()->oldest()->paginate(4);
            
        } else { // Otherwise
            // Get Posts that have this tag attached to, and sort them by newest to oldest
            $posts = $tag->posts()->latest()->paginate(4);
        }
        
        return view('post.index')
                ->with('posts', $posts)
                ->with('request', new RequestHelper);
        
    }
}
