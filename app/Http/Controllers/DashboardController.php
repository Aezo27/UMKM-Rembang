<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function get_row1(){
        $post = post::all();
        $count = $post->count();
        $views = $post->sum('views');
        return view('admin.data_row1', compact('count', 'views'));
    }
    public function get_row2(){
        $post = post::orderby('views')->limit('10')->get();
        return view('admin.data_row2', compact('post'));
    }

    // post review
    public function post_review(){
        return view('admin.post.post_review');
    }
}
