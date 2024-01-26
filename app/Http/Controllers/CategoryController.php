<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categorys = Category::latest()->get();
        $total_category = Category::count();
        return view('category.index', compact('categorys', 'total_category'));
    }
    function insert(Request $request)
    {
        // echo $request->category_name;
        $request->validate([
            'category_name' => 'required|unique:categories,name'
        ],[
            // 'category_name.required' => 'CUSTOM MESSAGE',
            // 'category_name.unique' => 'CUSTOM MESSAGE'
        ]);

        Category::insert([
            'name' => $request->category_name,
            'created_at' => Carbon::now()
        ]);

        return back()->with('status', 'Category Added Successfully!');
    }
    function delete($category_id)
    {
        Category::find($category_id)->delete();
        return back();
    }
}
