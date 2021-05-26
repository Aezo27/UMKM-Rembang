<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\post_contact;
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
        $pelanggan = post_contact::select('clicked')->sum('clicked');
        $views = $post->sum('views');
        return view('admin.data_row1', compact('count', 'views', 'pelanggan'));
    }
    public function get_row2(){
        $post = post::orderby('views', 'desc')->limit('10')->get();
        return view('admin.data_row2', compact('post'));
    }
}
