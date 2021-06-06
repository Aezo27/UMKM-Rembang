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
        $posts = post::where('status', 'aktif')->limit('5')->get();
        $count = post::where('status', 'aktif')->count();
        return view('user.product', compact('posts', 'count'));
    }
    public function single($slug)
    {
        $post = post::where('slug', $slug)->firstOrFail();
        $post_all = post::where(['id_category' => $post->id_category, 'status' => 'Aktif'])->inRandomOrder()->limit('3')->get();
        if ($post_all->count = 0) {
            $post_all = post::where('status', 'Aktif')->inRandomOrder()->limit('3')->get();
        }
        $post->views += 1;
        $post->save();
        $tags = tag::all();
        $galeries = post::select('post_galeries.image_1', 'post_galeries.image_2', 'post_galeries.image_3', 'post_galeries.image_4', 'post_galeries.image_5', 'post_galeries.image_6')->join('post_galeries', 'post_galeries.id_post', '=', 'posts.id')->where('slug', $slug)->first();
        return view('user.single', compact('post', 'post_all', 'tags', 'galeries'));
    }
    public function loadMore(Request $request){
        if ($request->ajax()) {
            if ($request->q) {
                $skip = $request->skip;
                $take = 10;
                $posts = Post::where('title', 'like', '%'.$request->q.'%')->skip($skip)->take($take)->get();
                return view('user.loadmore', compact('posts'));
            }else {
                $skip = $request->skip;
                $take = 10;
                $posts = Post::where('status', 'aktif')->skip($skip)->take($take)->get();
                return view('user.loadmore', compact('posts'));
            }
        } 
    }
    public function search(Request $request)
    {
        if ($request->q) {
            $posts = post::where('status', 'aktif')->where('title', 'like', '%'.$request->q.'%')->limit('10')->get();
            $count = post::where('status', 'aktif')->where('title', 'like', '%'.$request->q.'%')->count();
        } else {
            return redirect(route('user.product'));
            // $posts = post::where('status', 'aktif')->where('title', 'like', '%unknown%')->limit('5')->get();
            // $count = post::where('status', 'aktif')->where('title', 'like', '%unknown%')->count();
        }
        return view('user.search', compact('posts', 'count'));
    }
    public function incCount(Request $request)
    {
        if ($request->slug) {
            $post = post::where('slug', $request->slug)->first();
            $post->post_contacts->clicked += 1;
            $post->post_contacts->save();
        }
    }
}
