<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\tag;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $posts = post::where('status', 'aktif')->orderBy('views', 'desc')->limit('8')->get();
        return view('user.index', compact('posts'));
    }
    public function product()
    {
        $posts = post::where('status', 'aktif')->orderBy('title', 'asc')->limit('10')->get();
        return view('user.product', compact('posts'));
    }
    public function single($slug)
    {
        $post = post::where('slug', $slug)->firstOrFail();
        $post_all = post::where(['id_category' => $post->id_category, 'status' => 'Aktif'])->inRandomOrder()->limit('3')->get();
        if ($post_all->count = 0) {
            $post_all = post::where('status', 'Aktif')->inRandomOrder()->limit('3')->get();
        }
        $post->views = $post->views+1;
        $post->save();
        $tags = tag::all();
        $galeries = post::select('post_galeries.image_1', 'post_galeries.image_2', 'post_galeries.image_3', 'post_galeries.image_4', 'post_galeries.image_5', 'post_galeries.image_6')->join('post_galeries', 'post_galeries.id_post', '=', 'posts.id')->where('slug', $slug)->first();
        return view('user.single', compact('post', 'post_all', 'tags', 'galeries'));
    }
}
