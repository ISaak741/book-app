<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Mylist;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function storeBook(BookRequest $request)
    {
        $file = $request->file('file');
        $picture = $request->file('picture');

        $fileName = trim(str_replace(' ', '_', $request->input('title'))) . '.' . $file->getClientOriginalExtension();
        $pictureName = trim(str_replace(' ', '_', $request->input('title'))) . '.' . $picture->getClientOriginalExtension();


        $file->storeAs('books', $fileName, 'public');
        $picture->storeAs('covers', $pictureName, 'public');


        $book = Book::create([
            'title' => $request->input('title'),
            'genre' => $request->input('genre'),
            'language' => $request->input('language'),
            'description' => $request->input('description'),
            'file' => "books/$fileName",
            'picture' => "covers/$pictureName",
            'writer_id' => 1,
        ]);
        return redirect()->route('book.upload.submit')->with('success', "$book->title a été bien téléverselr");
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $books = Book::where('title', 'LIKE', '%' . $query . '%')->get();
        return response()->json([
            'books' => $books
        ]);
    }
    public function show($id)
    {
        $book = Book::where('id', $id)->first();
        $my_list = Mylist::where('user_id', session('id'))
            ->where('user_type', session('userType'))
            ->where('book_id', $id)
            ->first();
        $exist = !is_null($my_list);
        return view('book-details', ['book' => $book, 'exist' => $exist]);
    }

    public function renderReadView($id)
    {
        $book = Book::find($id)->file;
        return view('book-read', compact('book'));
    }
}
