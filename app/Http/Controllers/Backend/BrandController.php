<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;


class BrandController extends Controller
{
    public function BrandView()
    {
        $brand = Brand::latest()->get();

        return view('backend.brand.brand_view', compact('brand'));
    }
    public function BrandStore(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_hin' => 'required',
            'brand_image' => 'required',

        ],[
            'brand_name_en.required' => 'Input Brand English Name',
            'brand_name_hin.required' => 'Input Brand Hindi Name',
            
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        Brand::insert([
            'brand_name_en'=>$request->brand_name_en,
            'brand_name_hin'=>$request->brand_name_hin,
            'brand_slug_en'=>strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_hin'=>str_replace(' ', '-', $request->brand_name_hin),
            'brand_image'=>$save_url,
        ]);

        $notification = array(
            'message' => 'Brand Add Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function BrandEdit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('backend.brand.brand_edit', compact('brand'));
    }


    public function BrandUpdate(Request $request, $id)
    {
        // $brand_id = $request->id;
        
        $brand = Brand::find($id);

        $old_img = $request->old_image;
        
        $brand ->brand_name_en= $request->brand_name_en;
        $brand ->brand_name_hin= $request->brand_name_hin;
        $brand ->brand_slug_en= strtolower(str_replace(' ', '-', $request->brand_name_en));
        $brand ->brand_slug_hin= str_replace(' ', '-', $request->brand_name_hin);


        if($request->file('brand_image')){
            
            unlink($old_img);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
            $save_url = 'upload/brand/'.$name_gen;
            $brand->brand_image = $save_url;

        }
        
        $brand->update();

        $notification = array(
            'message' => 'Brand Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.brand')->with($notification);
        
    }

    public function BrandDelete($id)
    {
        $brand = Brand::find($id);
        // dd($brand);
        $img = $brand->brand_image;
        unlink($img);

        Brand::findOrFail($id)->delete();
        // $brand->delete();

        $notification = array(
            'message' => 'Brand Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
