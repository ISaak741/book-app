<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mylist;
use App\Models\Book;

class MylistController extends Controller
{
    /**
     * Display a listing of the books in the user's list.
     *
     */
    public function showBooks()
    {
        $userId = session('id');
        $userType = session('userType');
        $mylists = Mylist::where('user_id', $userId)
                        ->where('user_type', $userType)
                        ->with('book') 
                        ->get();
        $books = $mylists->map(function ($mylist) {
            return $mylist->book;
        });
        return view('my-books', ['books' => $books]);
    }
    public function addToList(Request $request)
    {
        $request->validate([
            'book_id' => 'required|integer|exists:books,id',
        ]);
        $userId = session('id'); 
        $userType = session('userType'); 
        $book = Book::findOrFail($request->book_id);
        $writerId = $book->writer_id;
        Mylist::create([
            'user_id' => $userId,
            'book_id' => $request->book_id, 
            'writer_id' => $writerId,
            'user_type' => $userType,
        ]);
        return redirect()->route('books.reading')->with('success', 'Book added to your list!');
    }}
