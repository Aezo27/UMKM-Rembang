<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['admin', 'verified']);
    // }
    public function index(){
        return view('admin.index');
    }
    public function post(){
        return view('admin.post');
    }
}
