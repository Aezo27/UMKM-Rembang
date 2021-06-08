<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\post;
use App\Models\post_tag;
use App\Models\setting_contact;
use App\Models\setting_home;
use App\Models\setting_web;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function main()
    {
        $main = setting_web::first();
        return view('admin.setting.main', compact('main'));
    }
    public function save_main(Request $req)
    {
        DB::beginTransaction();
        try {
            // table setting web
            $main = setting_web::first();
            $main->site_name = $req->site_name;
            $main->description = $req->description;
            $main->about = $req->about;
            $main->text_about = $req->text_about;
            $main->text_home = $req->text_home;
            $main->save();

            DB::commit();
            return back()->with([
                'notif'     => 'Detail web berhasil disimpan',
                'alert'     => 'success'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            // return $e;
            return back()->with([
                'notif'     => 'Detail web gagal disimpan!',
                'alert'     => 'error'
            ]);
        }
    }
    public function contact()
    {
        $contact = setting_contact::first();
        return view('admin.setting.contact', compact('contact'));
    }
    public function save_contact(Request $req)
    {
        DB::beginTransaction();
        try {
            // table setting web
            $contact = setting_contact::first();
            $contact->text_1 = $req->text1;
            $contact->text_2 = $req->text2;
            $contact->phone = $req->phone;
            $contact->address = $req->address;
            $contact->maps = $req->maps;
            $contact->whatsapp = $req->whatsapp;
            $contact->email = $req->email;
            $contact->save();

            DB::commit();
            return back()->with([
                'notif'     => 'Contact web berhasil disimpan',
                'alert'     => 'success'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            // return $e;
            return back()->with([
                'notif'     => 'Contact web gagal disimpan!',
                'alert'     => 'error'
            ]);
        }
    }
    public function tags()
    {
        return view('admin.setting.tag');
    }
    public function get_tags(Request $request)
    {
        if ($request->ajax()) {
            $data = tag::orderBy('tag_name')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void()" id="' . $data->id . '" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>';
                    return $button;
                })
                ->editColumn('tag_name', function ($data) {
                    return ucfirst($data->tag_name);
                })
                ->editColumn('post_count', function ($data) {
                    return $data->post->count();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function del_tags(Request $request)
    {
        DB::beginTransaction();
        try {
            $tag_del = tag::where('id', $request->id);
            $tag_del->delete();
            $post_tag_del = post_tag::where('tag_id', $request->id);
            $post_tag_del->delete();

            DB::commit();
            return [
                'notif'     => 'Tag berhasil dihapus',
                'alert'     => 'success'
            ];
        } catch (\Exception $e) {
            DB::rollback();
            // return $e;
            return [
                'notif'     => 'Tag gagal dihapus!',
                'alert'     => 'error'
            ];
        }
    }

    public function cate()
    {
        return view('admin.setting.category');
    }
    public function get_cate(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::orderBy('category_name')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void()" id="' . $data->id . '" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>';
                    return $button;
                })
                ->editColumn('category_name', function ($data) {
                    return ucfirst($data->category_name);
                })
                ->editColumn('post_count', function ($data) {
                    return $data->post->count();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function del_cate(Request $request)
    {
        DB::beginTransaction();
        try {
            $cate_del = Category::where('id', $request->id);
            $cate_del->delete();
            $post_cate_del =post::where('id_category', $request->id);
            $post_cate_del->update(['id_category' => null, 'updated_by' => Auth::user()->name]);

            DB::commit();
            return [
                'notif'     => 'Kategori berhasil dihapus',
                'alert'     => 'success'
            ];
        } catch (\Exception $e) {
            DB::rollback();
            // return $e;
            return [
                'notif'     => 'Kategori gagal dihapus!',
                'alert'     => 'error'
            ];
        }
    }
    public function add_cate(Request $request)
    {
        DB::beginTransaction();
        try {
            $category_name = strtolower(ltrim($request->category_name));
            $cek = Category::where('category_name', $category_name)->first();
            if ($cek != null) {
                return [
                    'notif'     => 'Kategori telah ada!',
                    'alert'     => 'error'
                ];
            }
            $cate = new Category();
            $cate->category_name =  $category_name;
            $cate->created_by =  Auth::user()->name;
            $cate->save();

            DB::commit();
            return [
                'notif'     => 'Kategori berhasil ditambahkan',
                'alert'     => 'success'
            ];
        } catch (\Exception $e) {
            DB::rollback();
            // return $e;
            return [
                'notif'     => 'Kategori gagal ditambahkan!',
                'alert'     => 'error'
            ];
        }
    }
    public function save_img(Request $request)
    {
        if ($request->file('bg1') != null) {
            $request->file('bg1')->storeAs('assets_user/img/', 'bg-1.jpg');
        }
        if ($request->file('bg2') != null) {
            $request->file('bg2')->storeAs('assets_user/img/', 'bg-2.jpg');
        }
        if ($request->file('bg3') != null) {
            $request->file('bg3')->storeAs('assets_user/img/', 'bg-3.jpg');
        }
        if ($request->file('logo') != null) {
            $request->file('logo')->storeAs('assets_user/img/', 'logo.png');

        }
        if ($request->file('favicon') != null) {
            $request->file('favicon')->storeAs('assets/img/', 'favicon.png');
        }
        return back()->with([
            'notif'     => 'Gambar web berhasil dirubah',
            'alert'     => 'success'
        ]);
    }
}
