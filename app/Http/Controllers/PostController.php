<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\post;
use App\Models\post_contact;
use App\Models\post_detail;
use App\Models\post_galery;
use App\Models\post_review;
use App\Models\post_tag;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

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
                    $button .= '<a href="' . route('edit_post', ['id' => $data->id]) .'" id="' . $data->id . '" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">edit</i></a>';
                    $button .= '<a href="javascript:void()" id="' . $data->id . '" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>';
                    return $button;
                })
                ->editColumn('jenis', function ($data) {
                    return isset($data->categories->category_name) ? $data->categories->category_name : '';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function add_post()
    {
        $cate = Category::all();
        return view('admin.post.post_content', compact('cate'));
    }
    public function save_post(Request $req)
    {
        $validated = $req->validate([
            'nama'        => 'required|max:250',
        ]);
        DB::beginTransaction();
        try {
            // table post
            $post = new post();
            $post->title = $req->nama;
            // cek slug
            $slug = Str::slug($req->nama);
            $count = post::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            // return ketika ada nama kembar
            if ($count > 0) {
                return back()->with([
                    'notif'     => 'UMKM gagal ditambahkan, nama sudah dipakai!',
                    'alert'     => 'error'
                ])->withInput();
            }
            $post->slug = $count ? "{$slug}-{$count}" : $slug;
            $post->views = 0;
            $post->status = $req->stts == null ? 'Pasif': $req->stts;
            $post->id_category = $req->category;
            $post->created_by =  Auth::user()->name;
            $post->save();

            // table post_detail
            $post_det = new post_detail();
            $post_det->id_post = $post->id;
            $post_det->content = $req->wysiwyg;
            $post_det->created_by =  Auth::user()->name;
            $post_det->save();

            // table galery
            if ($req->file('galery1') != null) {
                $img1 = $slug . '_1.png';
                $req->file('galery1')->storeAs('post/' . $slug . '/', $img1);
            } else {
                $img1 = null;
            }
            if ($req->file('galery2') != null) {
                $img2 = $slug . '_2.png';
                $req->file('galery2')->storeAs('post/' . $slug . '/', $img2);
            } else {
                $img2 = null;
            }
            if ($req->file('galery3') != null) {
                $img3 = $slug . '_3.png';
                $req->file('galery3')->storeAs('post/' . $slug . '/', $img3);
            } else {
                $img3 = null;
            }
            if ($req->file('galery4') != null) {
                $img4 = $slug . '_4.png';
                $req->file('galery4')->storeAs('post/' . $slug . '/', $img4);
            } else {
                $img4 = null;
            }
            if ($req->file('galery5') != null) {
                $img5 = $slug . '_5.png';
                $req->file('galery5')->storeAs('post/' . $slug . '/', $img5);
            } else {
                $img5 = null;
            }
            if ($req->file('galery6') != null) {
                $img6 = $slug . '_6.png';
                $req->file('galery6')->storeAs('post/' . $slug . '/', $img6);
            } else {
                $img6 = null;
            }
            $gal = new post_galery();
            $gal->id_post = $post->id;
            $gal->image_1 = $img1;
            $gal->image_2 = $img2;
            $gal->image_3 = $img3;
            $gal->image_4 = $img4;
            $gal->image_5 = $img5;
            $gal->image_6 = $img6;
            $gal->youtube_video = $req->yt_embed;
            $gal->created_by =  Auth::user()->name;
            $gal->save();

            // table contact
            $cont = new post_contact();
            $cont->id_post = $post->id;
            $cont->phone = $req->phone;
            $cont->address = $req->address;
            $cont->map = $req->gmaps;
            $cont->whatsapp = $req->whatsapp;
            $cont->instagram = $req->instagram;
            $cont->clicked = 0;
            $cont->owner = $req->owner;
            $cont->created_by =  Auth::user()->name;
            $cont->save();

            // table tags
            if ($req->tags != '') {
                foreach (explode(",", $req->tags) as $tag) {
                   $cek = tag::where('tag_name', $tag)->first();
                   if (!$cek) {
                        $ins_tag =  new tag();
                        $ins_tag->tag_name = strtolower(ltrim($tag));
                        $ins_tag->save();
    
                        $post_tag = new post_tag();
                        $post_tag->post_id = $post->id;
                        $post_tag->tag_id=  $ins_tag->id;
                        $post_tag->save();
                   } else {
                        $post_tag = new post_tag();
                        $post_tag->post_id = $post->id;
                        $post_tag->tag_id=  $cek->id;
                        $post_tag->save();
                   }
                }
            }
            DB::commit();
            return redirect(route('post'))->with([
                'notif'     => 'UMKM berhasil ditambahkan',
                'alert'     => 'success'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            // return $e;
            return back()->with([
                'notif'     => 'UMKM gagal ditambahkan, cek kelengkapan data terlebih dahulu!',
                'alert'     => 'error'
            ])->withInput();
        }
    }
    public function del_post(Request $req)
    {
        DB::beginTransaction();
        try {
            $del = post::findOrFail($req->id);
            $slug = $del->slug;
            // dd($slug);
            $del->delete();

            $deldet = post_detail::where('id_post',$req->id);
            $deldet->delete();

            $delgal = post_galery::where('id_post',$req->id);
            $delgal->delete();

            $delcont = post_contact::where('id_post',$req->id);
            $delcont->delete();

            $deltag = post_tag::where('post_id',$req->id);
            $deltag->delete();

            $delrev = post_review::where('id_post',$req->id);
            $delrev->delete();

            File::deleteDirectory(storage_path('app/post') . '/' . $slug);

            DB::commit();
            // // not ajax
            // return redirect(route('post'))->with([
            //     'notif'     => 'UMKM berhasil dihapus',
            //     'alert'     => 'success'
            // ]);
            // ajax
            return [
                'notif'     => 'UMKM berhasil dihapus',
                'alert'     => 'success'
            ];
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            // // not ajax
            // return back()->with([
            //     'notif'     => 'UMKM gagal dihapus!',
            //     'alert'     => 'error'
            // ]);
            // ajax
            return [
                'notif'     => 'UMKM gagal dihapus!',
                'alert'     => 'error',
            ];
        }
    }
    public function edit_post($id)
    {
        $cate = Category::all();
        $post = post::where('id', $id)->firstOrFail();
        return view('admin.post.post_content_edit', compact('cate', 'post', 'id'));
    }
    public function update_post(Request $req, $id)
    {
        $validated = $req->validate([
            'nama'        => 'required|max:250',
        ]);
        DB::beginTransaction();
        try {
            // table post
            $post = post::where('id', $id)->firstOrFail();
            $slug = Str::slug($req->nama);
            if ($req->nama != $post->title) {
                rename(storage_path('app/post') . '/' . $post->slug, storage_path('app/post') . '/' . $slug);
                $count = post::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
                $post->slug = $count ? "{$slug}-{$count}" : $slug;
            }
            $post->title = $req->nama;
            $post->status = $req->stts == null ? 'Pasif' : $req->stts;
            $post->id_category = $req->category;
            $post->updated_by =  Auth::user()->name;
            $post->save();

            // table post_detail
            $post_det = post_detail::where('id_post', $id)->firstOrFail();
            $post_det->id_post = $post->id;
            $post_det->content = $req->wysiwyg;
            $post_det->updated_by =  Auth::user()->name;
            $post_det->save();


            // table galery
            if ($req->file('galery1') != null) {
                $img1 = $slug . '_1.png';
                $req->file('galery1')->storeAs('post/' . $slug . '/', $img1);
            } else {
                if ($req->img_1) {
                    $img1 = $post->post_galeries->image_1;
                } else {
                    $img1 = null;
                } 
            }
            if ($req->file('galery2') != null) {
                $img2 = $slug . '_2.png';
                $req->file('galery2')->storeAs('post/' . $slug . '/', $img2);
            } else {
                if ($req->img_2) {
                    $img2 = $post->post_galeries->image_2;
                } else {
                    $img2 = null;
                }
            }
            if ($req->file('galery3') != null) {
                $img3 = $slug . '_3.png';
                $req->file('galery3')->storeAs('post/' . $slug . '/', $img3);
            } else {
                if ($req->img_3) {
                    $img3 = $post->post_galeries->image_3;
                } else {
                    $img3 = null;
                }
            }
            if ($req->file('galery4') != null) {
                $img4 = $slug . '_4.png';
                $req->file('galery4')->storeAs('post/' . $slug . '/', $img4);
            } else {
                if ($req->img_4) {
                    $img4 = $post->post_galeries->image_4;
                } else {
                    $img4 = null;
                }
            }
            if ($req->file('galery5') != null) {
                $img5 = $slug . '_5.png';
                $req->file('galery5')->storeAs('post/' . $slug . '/', $img5);
            } else {
                if ($req->img_5) {
                    $img5 = $post->post_galeries->image_5;
                } else {
                    $img5 = null;
                }
            }
            if ($req->file('galery6') != null) {
                $img6 = $slug . '_6.png';
                $req->file('galery6')->storeAs('post/' . $slug . '/', $img6);
            } else {
                if ($req->img_6) {
                    $img6 = $post->post_galeries->image_6;
                } else {
                    $img6 = null;
                }
            }
            $gal = post_galery::where('id_post', $id)->firstOrFail();
            $gal->id_post = $post->id;
            $gal->image_1 = $img1;
            $gal->image_2 = $img2;
            $gal->image_3 = $img3;
            $gal->image_4 = $img4;
            $gal->image_5 = $img5;
            $gal->image_6 = $img6;
            $gal->youtube_video = $req->yt_embed;
            $gal->updated_by =  Auth::user()->name;
            $gal->save();

            // table contact
            $cont = post_contact::where('id_post', $id)->firstOrFail();
            $cont->id_post = $post->id;
            $cont->phone = $req->phone;
            $cont->address = $req->address;
            $cont->map = $req->gmaps;
            $cont->whatsapp = $req->whatsapp;
            $cont->instagram = $req->instagram;
            $cont->owner = $req->owner;
            $cont->updated_by =  Auth::user()->name;
            $cont->save();

            // table tags
            $post_tag_del = post_tag::where('post_id', $id);
            $post_tag_del->delete();
            if ($req->tags != '') {
                foreach (explode(",", $req->tags) as $tag) {
                    $cek = tag::where('tag_name', $tag)->first();
                    if (!$cek) {
                        $ins_tag =  new tag();
                        $ins_tag->tag_name = strtolower(ltrim($tag));
                        $ins_tag->save();

                        $post_tag = new post_tag();
                        $post_tag->post_id = $post->id;
                        $post_tag->tag_id =  $ins_tag->id;
                        $post_tag->save();
                    } else {                      
                        $post_tag = new post_tag();
                        $post_tag->post_id = $post->id;
                        $post_tag->tag_id =  $cek->id;
                        $post_tag->save();
                    }
                }
            }
            DB::commit();
            return redirect(route('post'))->with([
                'notif'     => 'UMKM berhasil diedit',
                'alert'     => 'success'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            // return $e;
            return back()->with([
                'notif'     => 'UMKM gagal diedit!',
                'alert'     => 'error'
            ]);
        }
    }
}
