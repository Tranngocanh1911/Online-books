<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{

    public function list()
    {
        $authors = Author::all();
        return view('backends.admin.authors.list', compact('authors'));
    }


    public function create()
    {
        return view('backends.admin.authors.create');
    }


    public function cre(Author $author, Request $request): RedirectResponse
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $author->image = $path;
        }

        $author->name = $request->name;
        $author->date_of_birth = $request->dateOfBirth;
        $author->address = $request->address;
        $author->save();

        session('success', 'create success');
        return redirect()->action([AuthorController::class, 'list']);
    }


    public function show($id)
    {
        $author = Author::findOrFail($id);
        return view('backends.admin.authors.detail', compact('author'));
    }


    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('backends.admin.authors.edit', compact('author'));
    }


    public function update(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            $author = Author::findOrFail($id);
            $currentImg = $author->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $author->image = $path;
        }

        $author->name = $request->name;
        $author->date_of_birth = $request->dateOfBirth;
        $author->address = $request->address;
        $author->save();

        Session::flash('success', 'success');
        return redirect()->action([AuthorController::class, 'list']);
    }


    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        return redirect()->action([AuthorController::class, 'list'])
            ->with('success', 'delete success');
    }
}
