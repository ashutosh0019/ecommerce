<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $category = Category::latest()->get();

        return view('backend.category.category_view', compact('category'));
    }
    public function CategoryStore(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_hin' => 'required',
            'category_icon' => 'required',

        ],[
            'category_name_en.required' => 'Input Category English Name',
            'category_name_hin.required' => 'Input Category Hindi Name',
            'category_icon.required' => 'Input Category Icon',
        ]);

        
        Category::insert([
            'category_name_en'=>$request->category_name_en,
            'category_name_hin'=>$request->category_name_hin,
            'category_slug_en'=>strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_hin'=>str_replace(' ', '-', $request->category_name_hin),
            'category_icon'=>$request->category_icon,
        ]);

        $notification = array(
            'message' => 'New Category Add Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);

        return view('backend.category.category_edit', compact('category'));
    }

    public function CategoryUpdate(Request $request, $id)
    {
        // $category_id = $request->id;
        
        $category = category::find($id);
        
        $category ->category_name_en= $request->category_name_en;
        $category ->category_name_hin= $request->category_name_hin;
        $category ->category_slug_en= strtolower(str_replace(' ', '-', $request->category_name_en));
        $category ->category_slug_hin= str_replace(' ', '-', $request->category_name_hin);
        $category ->category_icon= $request->category_icon;
        $category->update();

        $notification = array(
            'message' => 'Category Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
        
    }

    public function CategoryDelete($id)
    {
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
