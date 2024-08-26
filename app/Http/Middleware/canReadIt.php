<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class canReadIt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = session('id');
        $userType = session('userType');
        $bookId = $request->route('id');

        $hasAccess = \App\Models\Mylist::where('user_id', $userId)
            ->where('user_type', $userType)
            ->where('book_id', $bookId)
            ->exists();

        if ($hasAccess)
            return $next($request);
        return redirect()->route('home')->with([
            'message' => 'you are not allowed to read that book',
            'style' => 'alert-danger'
        ]);
    }
}
