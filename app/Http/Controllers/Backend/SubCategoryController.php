<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::latest()->get();

        return view('backend.category.subcategory_view', compact('subcategory','categories'));
    }

    public function SubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_hin' => 'required',

        ],[
            'category_id.required' => 'Please Select A Category',
            'subcategory_name_en.required' => 'Input Category English Name',
            'subcategory_name_hin.required' => 'Input Category Hindi Name',
        ]);

        
        SubCategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_name_en'=>$request->subcategory_name_en,
            'subcategory_name_hin'=>$request->subcategory_name_hin,
            'subcategory_slug_en'=>strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_hin'=>str_replace(' ', '-', $request->subcategory_name_hin),
        ]);

        $notification = array(
            'message' => 'New Sub Category Insertedd Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);

        return view('backend.category.subcategory_edit', compact('subcategory','categories'));
    }

    public function SubCategoryUpdate(Request $request, $id)
    {
        // $category_id = $request->id;
        
        $subcategory = SubCategory::find($id);
        $subcategory ->category_id= $request->category_id;
        $subcategory ->subcategory_name_en= $request->subcategory_name_en;
        $subcategory ->subcategory_name_hin= $request->subcategory_name_hin;
        $subcategory ->subcategory_slug_en= strtolower(str_replace(' ', '-', $request->subcategory_name_en));
        $subcategory ->subcategory_slug_hin= str_replace(' ', '-', $request->subcategory_name_hin);
        $subcategory->update();

        $notification = array(
            'message' => 'Sub Category Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subcategory')->with($notification);
        
    }

    public function SubCategoryDelete($id)
    {
        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Sub Category Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
