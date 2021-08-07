<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function list()
    {
        $books = Book::all();

        return view('books.list', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request, Book $book): \Illuminate\Http\RedirectResponse
    {

        $image = $request->file('image');
        $path = $image->store('images', 'public');
        $book->image = $path;

        $book->name = $request->name;
        $book->image = $request->image;
        $book->author = $request->author;
        $book->category = $request->category;
        $book->price = $request->price;
        $book->description = $request->description;
        $book->save();

        Session::flash('success', 'success');
        return redirect()->action([BookController::class, 'list']);
    }


    public function detail($id)
    {
        $book = DB::table('books')->where('id', $id)->get();
        return view('books.detail', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $currentImg = $book->image;
        if ($currentImg) {
            Storage::delete('/public/' . $currentImg);
        }
        $image = $request->file('image');
        $path = $image->store('images', 'public');
        $book->image = $path;


        $book->name = $request->name;
        $book->image=$request->image;
        $book->author = $request->author;
        $book->category = $request->category;
        $book->price = $request->price;
        $book->description = $request->description;
        $book->save();

        Session::flash('success', 'success');
        return redirect()->action([BookController::class, 'list']);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->action([BookController::class, 'list'])
            ->with('success', 'delete success');
    }

}
