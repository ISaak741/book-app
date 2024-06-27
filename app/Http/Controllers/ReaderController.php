<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReaderRequest;
use App\Models\Reader;
use App\Models\Plan;

class ReaderController extends Controller
{
    public function create(Request $request)
    {
        session()->put('planType', $request->input('pack-type'));
        $reader = Reader::create([
            'name' => session()->get('name'),
            'email' => session()->get('email'),
            'password' => session()->get('password'),
        ]);

        Plan::create([
            'planType' => session()->get('planType'),
            'planStartDate' =>  today(),
            'planEndDate' =>  today()->addMonth(),
            'userType' => 'reader',
            'userId' => $reader->id
        ]);

        session()->remove('password');
        session()->remove('planType');
        session()->put('id', $reader->id);

        return redirect()->route('home');
    }
    public function storeTemp(ReaderRequest $request)
    {
        session(
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]
        );
        return redirect()->route('register.plan', ['type' => 'reader']);
    }

    public function accessAccount(Request $request)
    {
        $reader = Reader::all()
            ->where('name', $request->input('name'))
            ->where('password', $request->input("password"))
            ->first();

        if ($reader == null)
            return redirect()->route('login.form', ['type' => 'reader'])->with('message', 'invalide pseudo ou/et mot de pass');
        else
            session([
                'auth' => true,
                'userType' => 'reader',
                'name' => $reader->name,
            ]);

        session()->put('id', $reader->id);
        return redirect()->route('home');
    }
}
