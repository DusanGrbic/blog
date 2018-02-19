<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function store($id) {
        // Get the post
        $post = Post::findOrFail($id);
        
        // Validate request
        $this->validate(request(), [
            'body' => 'required|min:2'
        ]);
        
        // Add a comment to the post
        $post->add_comment(request('body'));

        return back();
    }
}
