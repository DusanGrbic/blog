<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct() {
        $this->middleware('guest')->except('destroy');
    }
    
    public function create() {
        // Show login form
        return view('session.create');
    }
    
    public function store() {
        // Attempt login
        if (auth()->attempt( request( ['email', 'password'] ) )) { // If successfull
            session()->flash('message', 'Welcome ' . auth()->user()->name . '! What\'s on your mind?');
            
            // if session has previous url stored
            if (session('previous_url')) {
                return redirect()->to(session('previous_url'));
            }
            
            return redirect()->route('home');
            
        }else{ // Otherwise
            // preserve email input
            session()->put('email', request('email'));
            
            // Redirect back with error
            return back()->withErrors(['message' => 'Please check your credentials and try again']);
        }
    }
    
    public function destroy() {
        auth()->logout();
        return redirect()->route('home');
    }
}
