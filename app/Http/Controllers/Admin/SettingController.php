<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Setting::class, Setting::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = ['Dashboard' => 'admin.dashboard', 'Setting' => '',];
        $categories = Category::all();
        return view('admin.setting', compact(['categories', 'breadcrumbs']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SettingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SettingRequest $request)
    {
        $locals = (config('translatable.locales'));
        foreach ($locals as $local) {

            $setting = Setting::where('lang', $local)->first();

            if ($request->hasFile($local . '.logo_url') && $request->file($local . '.logo_url')->isValid()) {
                $ext = $request->file($local . '.logo_url')->getClientOriginalExtension();
                File::delete($setting->logo_url);
                $request->file($local . '.logo_url')->move(public_path('assets/app/img/'), 'logo-' . $local . '.' . $ext);
                $logo = 'assets/app/img/logo-' . $local . '.' . $ext;
            }

            $setting->update(array_merge(array_filter($request->$local), ['logo_url' => $logo ?? $setting->logo_url]));
        }
        return redirect()->back()->with('status', __('The setting was :atrribute successfully!', ['atrribute' => __('updated')]));
    }
}
