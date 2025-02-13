<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('category-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }
    public function index()
    {
        $category = Category::latest()->get();
        return view('admin.pages.category.index', compact('category'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
            $file = time().'.'.$request->file->extension();
            $request->file->move(public_path('images/category'), $file);
            $category = new Category();
            $category->name = $request->name;
            $category->save();
            Toastr::success('Category Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
            $category = Category::find($id);
            $category->name = $request->name;
            $category->status = $request->status;
            if ($request->file) {
                $file = time() . '.' . $request->file->extension();
                $request->file->move(public_path('images/category'), $file);
                $category->file = $file;
            }
            $category->save();
            Toastr::success('Category Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();
            Toastr::success('Category Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
