<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Book;
use App\Models\Category;
use App\Models\Plan;
use App\Models\Reader;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function accessAccount(Request $request)
    {
        $admin = Admin::all()
            ->where('name', $request->input('name'))
            ->where('password', $request->input("password"))
            ->first();

        if ($admin == null)
            return redirect()->route('login.form', ['type' => 'admin'])->with('message', 'invalide pseudo ou/et mot de passe');
        else
            session([
                'auth' => true,
                'userType' => 'reader',
                'name' => $admin->name,
            ]);

        session()->put('id', $admin->id);
        return redirect()->route('admin.stats');
    }

    public function renderStatistics()
    {
        $writers = Plan::where('userType', 'writer')->get();
        $readers = Plan::where('userType', 'reader')->get();

        $reader_writer = [$readers->count(), $writers->count()];

        $writerSubPlan =  [
            $writers->groupBy('planType')->get('Gratuit')?->count() ?? 0,
            $writers->groupBy('planType')->get('Premium')?->count() ?? 0,
            $writers->groupBy('planType')->get('Basique')?->count() ?? 0
        ];

        $readerSubPlan = [
            $readers->groupBy('planType')->get('Gratuit')?->count() ?? 0,
            $readers->groupBy('planType')->get('Premium')?->count() ?? 0,
            $readers->groupBy('planType')->get('Basique')?->count() ?? 0
        ];

        $books = Category::withCount('books')->get();

        $genres = [];
        $items = [];

        foreach ($books as $book) {
            if ($book->books_count != 0) {
                $genres[] = $book->name;
                $items[] = $book->books_count;
            }
        }
        $books = [
            'categories' => $genres,
            'items' => $items,
        ];



        return view('admin.stats', compact('reader_writer', 'books', 'readerSubPlan', 'writerSubPlan'));
    }

    public function renderReaders()
    {
        $readers = Reader::all();
        return view('admin.readers', compact('readers'));
    }

    public function renderWriters()
    {

        $writers = Writer::all();
        return view('admin.writers', compact('writers'));
    }

    public function renderBooks()
    {
        $books = Book::with('writer')->get();
        return view('admin.books', compact('books'));
    }
}
