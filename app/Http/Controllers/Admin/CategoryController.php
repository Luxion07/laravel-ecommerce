<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends BaseController
{
    public function index()
    {

        $categories = Category::latest()->paginate(5);

        return view('admin.categories.index', compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'parent_id' =>  'required|not_in:0',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return $this->responseRedirectBack('Category deleted successfully.', 'success');
    }


}
