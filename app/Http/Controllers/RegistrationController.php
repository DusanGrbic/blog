<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\Welcome;
use App\Mail\Welcome_Again;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    public function create() {
        return view('registration.create');
    }
    
    public function store(RegistrationForm $form) {
        // Validate request
        // Create new user
        // Login user
        // Send welcome mail to the newly created user
        $form->persist();      
        
        session()->flash('message', 'Thanks For Registering!');
        
        // if session has previous url stored
        if (session('previous_url')) {
            return redirect()->to(session('previous_url'));
        }

        return redirect()->route('home');
    }
}
