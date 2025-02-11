<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('service-list')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);
        })->only('index');
    }
    public function index()
    {
        $service = Service::all();
        $category = Category::all();
        return view('admin.pages.service.index', compact('service', 'category'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'category_id' => 'required',
                'title' => 'required',
                'image' => 'required',
            ]);
            if ($request->hasFile('image')) {
                $file = time() . '.' . $request->file('image')->extension();
                $request->file('image')->move(public_path('images/service'), $file);
            } else {
                return redirect()->back()->with('error', 'No file uploaded');
            }
//            $request->file->move(public_path('images/service'), $file);
            $service = new Service();
            $service->title = $request->title;
            $service->details = $request->details;
            $service->price = $request->price;
            $service->category_id = $request->category_id;
            $service->image = $file;
            $service->save();
            Toastr::success('Service Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle the exception here
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'category_id' => 'required',
                'title' => 'required',
            ]);
            $service = Service::find($id);
            $service->title = $request->title;
            $service->details = $request->details;
            $service->price = $request->price;
            $service->category_id = $request->category_id;
            $service->status = $request->status;

            if ($request->image) {
                $file = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/service'), $file);
                $service->image = $file;
            }
            $service->save();
            Toastr::success('Service Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $service = Service::find($id);
            $service->delete();
            Toastr::success('Service Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


}
