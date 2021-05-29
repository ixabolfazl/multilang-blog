<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AddCategoryReqest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public $breadcrumbs = [
        'Dashboard' => 'admin.dashboard',
        'Categories' => 'admin.categories.index',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $breadcrumbs = $this->breadcrumbs;
        $categories = Category::orderBy('id', 'DESC')->paginate(15);
        $parents = Category::all();
        return view('admin.categories.categories', compact(['breadcrumbs', 'categories', 'parents']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddCategoryReqest $request)
    {

        // remove null fields in languages
        $request = $this->removeNullFields($request);
        Category::create($request->all());
        return redirect()->back()->with('status', __('The category was :atrribute successfully!', ['atrribute' => __('created')]));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the Category resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $breadcrumbs = array_merge($this->breadcrumbs, ['Edit Category' => 'admin.categories.edit']);
        $parents = Category::where('id', '!=', $category->id)->get();
        return view('admin.categories.edit-category', compact(['breadcrumbs', 'category', 'parents']));
    }

    /**
     * Update the specified Category in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // remove null fields in languages
        $request = $this->removeNullFields($request);
        $category->update($request->all());
        return redirect()->route('admin.categories.index')->with('status', __('The category was :atrribute successfully!', ['atrribute' => __('updated')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
