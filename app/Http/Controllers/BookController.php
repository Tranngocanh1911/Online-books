<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookCreateRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function list()
    {
        $books = Book::all();

        return view('backends.admin.books.list', compact('books'));
    }

    public function create()
    {
        return view('backends.admin.books.create');
    }

    public function cre(BookCreateRequest $request, Book $book): \Illuminate\Http\RedirectResponse
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $book->image = $path;
        }
        $book->name = $request->name;
        $book->author_id = $request->author;
        $book->category_id = $request->category;
        $book->year_publication = $request->year_publication;
        $book->content = $request->contents;
        $book->save();

        Session::flash('success', 'success');
        return redirect()->action([BookController::class, 'list']);
    }


    public function detail($id)
    {
        $book = DB::table('books')->where('id', $id)->get();
        return view('backends.admin.books.detail', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('backends.admin.books.edit', compact('book'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $book = Book::findOrFail($id);

        if ($request->hasFile('image')) {
            $currentImg = $book->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $book->image = $path;
        }

        $book->name = $request->name;
        $book->author_id = $request->author;
        $book->category_id = $request->category;
        $book->year_publication = $request->year_publication;
        $book->content = $request->contents;
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
