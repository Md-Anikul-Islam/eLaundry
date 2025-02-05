<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class SiteSettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('site-setting')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }
    public function index()
    {
        $siteSettings = SiteSetting::where('id', 1)->first();
        return view('admin.pages.siteSetting.siteSetting', compact('siteSettings'));
    }

    public function createOrUpdate(Request $request, $id = null)
    {
        // Validation rules
        $rules = [
            'name' => 'nullable',
            'title' => 'nullable',
            'meta_description' => 'nullable',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,svg,gif|max:5120', // Adjust max file size as needed
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg,gif|max:5120', // Adjust max file size as needed
            'site_preview_image' => 'nullable|image|mimes:jpeg,png,jpg,svg,gif|max:5120', // Adjust max file size as needed
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'address_bn' => 'nullable',
            'short_description' => 'nullable',
            'site_link' => 'nullable',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check if the setting with the provided ID exists
        if ($id) {
            $setting = SiteSetting::findOrFail($id);
            $setting->update($request->except(['favicon', 'logo', 'site_preview_image','team_banner','notice_banner','news_banner','project_banner','contact_banner','training_banner','object_of_project_image_1','object_of_project_image_2'])); // Exclude image fields from update
        } else {
            // If no ID provided, create a new setting
            $setting = new SiteSetting($request->except(['favicon', 'logo', 'site_preview_image','team_banner','notice_banner','news_banner','project_banner','contact_banner','training_banner','object_of_project_image_1','object_of_project_image_2'])); // Exclude image fields from creation
        }

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            $faviconName = time().'.'.$request->file('favicon')->extension();
            $request->file('favicon')->move(public_path('images/favicons'), $faviconName);
            $setting->favicon = 'images/favicons/'.$faviconName;
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logoName = time().'.'.$request->file('logo')->extension();
            $request->file('logo')->move(public_path('images/logos'), $logoName);
            $setting->logo = 'images/logos/'.$logoName;
        }

        // Handle logo upload
        if ($request->hasFile('site_preview_image')) {
            $previewName = time().'.'.$request->file('site_preview_image')->extension();
            $request->file('site_preview_image')->move(public_path('images/site_preview_image'), $previewName);
            $setting->site_preview_image = 'images/site_preview_image/'.$previewName;
        }

        // Team Banner
        if ($request->hasFile('team_banner')) {
            $teamName = time().'.'.$request->file('team_banner')->extension();
            $request->file('team_banner')->move(public_path('images/team_banner'), $teamName);
            $setting->team_banner = 'images/team_banner/'.$teamName;
        }
        // Notice Banner
        if ($request->hasFile('notice_banner')) {
            $noticeName = time().'.'.$request->file('notice_banner')->extension();
            $request->file('notice_banner')->move(public_path('images/notice_banner'), $noticeName);
            $setting->notice_banner = 'images/notice_banner/'.$noticeName;
        }
        // News Banner
        if ($request->hasFile('news_banner')) {
            $newsName = time().'.'.$request->file('news_banner')->extension();
            $request->file('news_banner')->move(public_path('images/news_banner'), $newsName);
            $setting->news_banner = 'images/news_banner/'.$newsName;
        }
        // Project Banner
        if ($request->hasFile('project_banner')) {
            $projectName = time().'.'.$request->file('project_banner')->extension();
            $request->file('project_banner')->move(public_path('images/project_banner'), $projectName);
            $setting->project_banner = 'images/project_banner/'.$projectName;
        }

        // Contact Banner
        if ($request->hasFile('contact_banner')) {
            $contactName = time().'.'.$request->file('contact_banner')->extension();
            $request->file('contact_banner')->move(public_path('images/contact_banner'), $contactName);
            $setting->contact_banner = 'images/contact_banner/'.$contactName;
        }

        // Training Banner
        if ($request->hasFile('training_banner')) {
            $trainingName = time().'.'.$request->file('training_banner')->extension();
            $request->file('training_banner')->move(public_path('images/training_banner'), $trainingName);
            $setting->training_banner = 'images/training_banner/'.$trainingName;
        }

        // Object Of Project image 1
        if ($request->hasFile('object_of_project_image_1')) {
            $object1Name = time().'.'.$request->file('object_of_project_image_1')->extension();
            $request->file('object_of_project_image_1')->move(public_path('images/object'), $object1Name);
            $setting->object_of_project_image_1 = 'images/object/'.$object1Name;
        }

        // Object Of Project image 2
        if ($request->hasFile('object_of_project_image_2')) {
            $object2Name = time().'.'.$request->file('object_of_project_image_2')->extension();
            $request->file('object_of_project_image_2')->move(public_path('images/object'), $object2Name);
            $setting->object_of_project_image_2 = 'images/object/'.$object2Name;
        }


        $setting->save();
        $message = $id ? 'Site settings updated successfully!' : 'Site settings created successfully!';
        return redirect()->back()->with('success', $message);
    }

}
