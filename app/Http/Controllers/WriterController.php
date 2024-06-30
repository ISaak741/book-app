<?php

namespace App\Http\Controllers;

use App\Http\Requests\WriterRequest;
use App\Models\Book;
use App\Models\Plan;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class WriterController extends Controller
{
    public function create(Request $request)
    {
        session()->put('planType', $request->input('pack-type'));
        $writer = Writer::create([
            'name' => session()->get('name'),
            'email' => session()->get('email'),
            'password' => session()->get('password'),
            'phone' => session()->get('phone'),
        ]);

        Plan::create([
            'planType' => session()->get('planType'),
            'planStartDate' =>  today(),
            'planEndDate' =>  today()->addMonth(),
            'userType' => 'writer',
            'userId' => $writer->id
        ]);

        session()->remove('password');
        session()->put('id', $writer->id);
        session()->put('auth', true);
        session()->put('userType', 'writer');

        return redirect()->route('home');
    }
    public function storeTemp(WriterRequest $request)
    {
        session(
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'phone' => $request->input('phone'),
            ]
        );
        return redirect()->route('register.plan', ['type' => 'writer']);
    }
    public function accessAccount(Request $request)
    {
        $writer = Writer::all()
            ->where('name', $request->input('name'))
            ->where('password', $request->input("password"))
            ->first();

        if ($writer == null)
            return redirect()->route('login.form', ['type' => 'writer'])->with('message', 'invalide pseudo ou/et mot de pass');

        $plan = Plan::where('userId', $writer->id)
            ->where('userType', 'writer')
            ->first();
        session([
            'id' => $writer->id,
            'auth' => true,
            'userType' => 'writer',
            'name' => $writer->name,
            'planType' => $plan->planType,
        ]);

        return redirect()->route('home');
    }

    public function myBooks()
    {
        $books = Book::all()->where('writer_id', session()->get('id'));
        $uploaded = true;
        return view('my-books', compact('books', 'uploaded'));
    }
}
