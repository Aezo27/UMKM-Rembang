<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\post_galery;
use App\Models\post_review;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ReviewController extends Controller
{
    public function post_review()
    {
        return view('admin.post.post_review');
    }
    public function select2(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = post::select('id', 'title')->where('title', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
        }
    }
    public function get_review(Request $request)
    {
        if ($request->ajax()) {
            $data = post_review::orderby('reviewer_name')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void()" id="' . $data->id . '" class="btn btn-simple btn-info btn-icon like" data-toggle="modal" data-target="#info"><i class="material-icons">info</i></a>';
                    $button .= '<a href="javascript:void()" id="' . $data->id . '" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">edit</i></a>';
                    $button .= '<a href="javascript:void()" id="' . $data->id . '" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>';
                    return $button;
                })
                ->editColumn('umkm', function ($data) {
                    return $data->post->title;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function add_review(Request $req)
    {
        // dd($req->post);
        DB::beginTransaction();
        try {
            // table post
            $post = post::findOrFail($req->post);
            $slug = $post->slug;

            // limit max 5 review
            $cek =  post_review::where('id_post', $post->id)->get();
            if ($cek->count() >= 5) {
                // // not ajax
                // return back()->with([
                //     'notif'     => 'Review untuk umkm ini telah mencapai batas (5)!',
                //     'alert'     => 'error'
                // ]);
                // ajax
                return [
                    'notif'     => 'Review untuk umkm ini telah mencapai batas (5)!',
                    'alert'     => 'error'
                ];
            }

            // cek reviewer sama
            $cek2 =  post_review::where(['reviewer_name' => $req->nama, 'id_post' => $post->id])->first();
            if ($cek2) {
                return [
                    'notif'     => 'Reviewer atas nama '. $req->nama.' telah ditambahkan untuk umkm ini',
                    'alert'     => 'error'
                ];
            }

            // table review
            $rev = new post_review();
            $rev->id_post = $post->id;
            $rev->reviewer_name = $req->nama;
            $rev->review_text = $req->text;
            $rev->created_by =  Auth::user()->name;
            $rev->save();

            if ($req->file('avatar') != null) {
                $img = $slug . '_review_'.$rev->id.'.png';
                $req->file('avatar')->storeAs('post/' . $slug . '/', $img);
            } else {
                $img = null;
            }

            $rev_img = post_review::findOrFail($rev->id);
            $rev_img->review_avatar = $img;
            $rev_img->save();

            DB::commit();
            return [
                'notif'     => 'Review berhasil ditambahkan',
                'alert'     => 'success'
            ];
        } catch (\Exception $e) {
            DB::rollback();
            // return $e;
            return [
                'notif'     => 'Review gagal ditambahkan!',
                'alert'     => 'error'
            ];
        }
    }
    public function del_review(Request $req)
    {
        DB::beginTransaction();
        try {
            $del = post_review::findOrFail($req->id);
            $post = post::where('id',$del->id_post)->first();
            $slug = $post->slug;
            $img = $del->review_avatar;
            // dd($slug);
            $del->delete();

            File::delete(storage_path('app/post') . '/' . $slug.'/'.$img);

            DB::commit();
            // // not ajax
            // return redirect(route('post_review'))->with([
            //     'notif'     => 'Review berhasil dihapus',
            //     'alert'     => 'success'
            // ]);
            //ajax
            return [
                'notif'     => 'Review berhasil dihapus',
                'alert'     => 'success'
            ];
        } catch (\Exception $e) {
            DB::rollback();
            // return $e;
            // // not ajax
            // return back()->with([
            //     'notif'     => 'Review gagal dihapus!',
            //     'alert'     => 'error'
            // ]);
            // ajax
            return [
                'notif'     => 'Review gagal dihapus!',
                'alert'     => 'error'
            ];
        }
    }
    public function edit_review(Request $req, $id)
    {
        // dd($req->post);
        DB::beginTransaction();
        try {
            // table post
            $post = post::findOrFail($req->post);
            $slug = $post->slug;

            // limit max 5 review
            $cek =  post_review::where('id_post', $post->id)->get();
            if ($cek->count() >= 5) {
                // // not ajax
                // return back()->with([
                //     'notif'     => 'Review untuk umkm ini telah mencapai batas (5)!',
                //     'alert'     => 'error'
                // ]);
                // ajax
                return [
                    'notif'     => 'Review untuk umkm ini telah mencapai batas (5)!',
                    'alert'     => 'error'
                ];
            }

            // cek reviewer sama
            $cek2 =  post_review::where(['reviewer_name' => $req->nama, 'id_post' => $post->id])->first();
            if ($cek2) {
                return [
                    'notif'     => 'Reviewer atas nama ' . $req->nama . ' telah ditambahkan untuk umkm ini',
                    'alert'     => 'error'
                ];
            }

            // table review
            $rev = post_review::where('id', $id)->firstOrFail();
            $rev->id_post = $post->id;
            $rev->reviewer_name = $req->nama;
            $rev->review_text = $req->text;
            $rev->updated_by =  Auth::user()->name;
            $rev->save();

            if ($req->file('avatar') != null) {
                $img = $slug . '_review_' . $rev->id . '.png';
                $req->file('avatar')->storeAs('post/' . $slug . '/', $img);
            } else {
                $img = null;
            }

            $rev_img = post_review::findOrFail($rev->id);
            $rev_img->review_avatar = $img;
            $rev_img->save();

            DB::commit();
            return [
                'notif'     => 'Review berhasil ditambahkan',
                'alert'     => 'success'
            ];
        } catch (\Exception $e) {
            DB::rollback();
            // return $e;
            return [
                'notif'     => 'Review gagal ditambahkan!',
                'alert'     => 'error'
            ];
        }
    }
    public function get_edit(Request $request)
    {
        if ($request->ajax()) {
            $data = post_review::select('post_reviews.*','posts.title', 'posts.slug')->join('posts', 'posts.id', '=', 'post_reviews.id_post')->where('post_reviews.id', $request->id)->firstOrFail();
            return $data;
        }
    }
}
