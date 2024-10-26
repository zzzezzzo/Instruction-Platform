<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('courses.category_list', [
            'categories' => $categories
        ]);
    }
    public function store(Request $req)
    {
        $validateData = $req->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255'
        ],[
            'name.required' => 'name should not be empty',
            'name.string' => 'name should be string',
            'name.max' => 'name should not be more than 100 characters',
            'description.required' => 'description should not be empty',
            'description.string' => 'description should be string',
            'description.max' => 'description should not be more than 255 characters'
        ]);
        $item = Category::create($validateData);
        return redirect()->route('courses.create');
    }
}
