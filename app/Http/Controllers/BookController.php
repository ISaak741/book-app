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

        $book = Book::create([
            'title' => trim($request->input('title')),
            'language_id' => $request->input('language'),
            'category_id' => $request->input('genre'),
            'description' => trim($request->input('description')),
            'file' => "books/$fileName",
            'picture' => "covers/$pictureName",
            'writer_id' => session()->get('id'),
        ]);

        $file->storeAs('books', $fileName, 'public');
        $picture->storeAs('covers', $pictureName, 'public');

        return redirect()->route('book.upload.submit')->with('success', "$book->title a été bien téléverser");
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $books = Book::with(['category', 'language'])->where('title', 'LIKE', '%' . $query . '%')->get();
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
        $show = true;
        $count = Mylist::where('user_id', session('id'))
            ->where('user_type', session('userType'))
            ->count();

        if (session('planType') == 'Gratuit') {
            if ($count >= 2) {
                $show = false;
            }
        } else if (session('planType') == 'Basique') {
            if ($count >= 20) {
                $show = false;
            }
        }
        return view('book-details', ['book' => $book, 'exist' => $exist, 'show' => $show]);
    }

    public function renderReadView($id)
    {
        $book = Book::find($id)->file;
        return view('book-read', compact('book'));
    }
}
