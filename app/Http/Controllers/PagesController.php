<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller {
    public function login() {
        return view('content.pages.auth.login');
    }

    public function register() {
        return view('content.pages.auth.register');
    }

    public function forgot_password() {
        return view('content.pages.auth.forgot-password');
    }

    public function P404() {
        return view('content.pages.errors.404');
    }

    public function blank() {
        return view('content.pages.layouts.blank');
    }

}
