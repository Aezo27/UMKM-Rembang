<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    // post
    public function post()
    {
        $post = post::all();
        return view('admin.post.post', compact('post'));
    }
    public function get_post(Request $request)
    {
        if ($request->ajax()) {
            $data = post::orderby('title')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void()" id="' . $data->id . '" class="btn btn-simple btn-info btn-icon like" data-toggle="modal" data-target="#info"><i class="material-icons">info</i></a>';
                    $button .= '<a href="javascript:void()" id="' . $data->id . '" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">edit</i></a>';
                    $button .= '<a href="javascript:void()" id="' . $data->id . '" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function add_post()
    {
        return view('admin.post.post_content');
    }
    public function save_post(Request $req)
    {
        $validated = $req->validate([
            'nama'        => 'required|max:250',
        ]);
        DB::beginTransaction();
        try {
            $post = new post();
            $post->title = $req->nama;
            $slug = Str::slug($req->nama);
            $count = post::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $post->slug = $count ? "{$slug}-{$count}" : $slug;
            $post->views = 0;
            $post->save();
            DB::commit();
            return redirect(route('post'))->with([
                'notif'     => 'UMKM berhasil ditambahkan',
                'alert'     => 'success'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with([
                'notif'     => 'UMKM gagal ditambahkan!',
                'alert'     => 'error'
            ]);
        }
    }
    public function del_post(Request $req)
    {
        $del = post::findOrFail($req->id);
        $del->delete();
        if ($del) {
            return [
                'notif'     => 'UMKM berhasil dihapus!',
                'alert'     => 'success'
            ];
        } else {
            return [
                'notif'     => 'UMKM gagal dihapus!',
                'alert'     => 'error'
            ];
        }
    }
}
