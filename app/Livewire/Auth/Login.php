<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    //function login
    public function login()
    {
        //validasi input
        $valid = $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //cek apakah email dan password benar
        if (Auth::attempt($valid)) {
            $this->redirect(route('home'), true);
        }
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
