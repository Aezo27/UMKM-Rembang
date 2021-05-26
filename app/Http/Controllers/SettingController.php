<?php

namespace App\Http\Controllers;

use App\Models\setting_contact;
use App\Models\setting_web;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            return $e;
            return back()->with([
                'notif'     => 'Contact web gagal disimpan!',
                'alert'     => 'error'
            ]);
        }
    }
}
