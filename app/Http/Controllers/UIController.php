<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Language;
use App\Models\Writer;
use Illuminate\Http\Request;

class UIController extends Controller
{
    public function renderRegister($type)
    {
        return view("register", compact('type'));
    }
    public function renderLogin($type)
    {
        return view("login", compact('type'));
    }
    public function renderSubscriptionPlan($type)
    {
        return view('plans', compact('type'));
    }

    public function renderHome()
    {
        $categories = Category::withCount('books')->get();
        return view('index', compact('categories'));
    }
    public function renderBooks()
    {
        $categories = Category::all(['id', 'name']);
        $languages = Language::all(['id', 'name']);

        return view('books', compact('categories', 'languages'));
    }
    public function renderBookUpload()
    {
        $categories = Category::all(['id', 'name']);
        $languages = Language::all(['id', 'name']);

        return view('book-upload', compact('categories', 'languages'));
    }

    public function storeComment(CommentRequest $commentRequest)
    {
        Comment::create([
            'name' => $commentRequest->input('name'),
            'email' => $commentRequest->input('email'),
            'message' => $commentRequest->input('message'),
        ]);

        return redirect()->back()->with('message', 'Votre commentaire a été pris en considération.');
    }
}
