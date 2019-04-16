<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('auth.admin');
    }

    public function showLoginForm(){
        return view('loginAdmin');
    }

    public function login(){
        
    }
    
}
