<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function list()
    {
        $categories = Category::all();
        return view('backends.admin.categories.list', compact('categories'));
    }


    public function create()
    {
        return view('backends.admin.categories.create');
    }


    public function cre(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->save();

        session('success', 'create success');
        return redirect()->action([CategoryController::class, 'list']);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category=Category::findOfFail($id);
        return view('backends.admin.categories.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
      $category=Category::findOfFail($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->action([CategoryController::class, 'list']);
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->action([CategoryController::class, 'list'])
            ->with('success', 'delete success');
    }
}
