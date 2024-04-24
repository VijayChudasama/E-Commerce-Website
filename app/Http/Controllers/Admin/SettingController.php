<?php

namespace App\Http\Controllers\Admin;




use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;

class SettingController extends Controller
{

    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting.index', compact('setting'));
    }

    public function store(Request $request)
    {
        $setting = Setting::first();
        // Handle logo upload
        if ($request->hasFile('website_logo')) {
            $file = $request->file('website_logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/slider/', $filename);
            $data = [
                'website_name' => $request->website_name,
                'website_url' => $request->website_url,
                'page_title' => $request->page_title,
                'meta_keyword' => $request->meta_keyword,
                'website_logo' => "uploads/slider/" . $filename,
                'meta_description' => $request->meta_description,
                'address' => $request->address,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'email1' => $request->email1,
                'email2' => $request->email2,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'color' => $request->color,
                'map' => $request->map,
            ];
            $setting->update($data);
        } else {
            $data = [
                'website_name' => $request->website_name,
                'website_url' => $request->website_url,
                'page_title' => $request->page_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'address' => $request->address,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'email1' => $request->email1,
                'email2' => $request->email2,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'color' => $request->color,
                'map' => $request->map,
            ];
            $setting->fill($data)->save();
        }



        return redirect()->back()->with('message', 'Settings Saved');
    }



        public function updateBackgroundColor(Request $request)
        {
            $colorSetting = Setting::first();
            $colorSetting->color  = $request->color;
            $colorSetting->save();

            return redirect()->back()->with('success', 'Top navbar background color updated successfully.');
        }
}
