<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /* sessions */
//        $request->session()->put(['mike'=>'senior developer']);
//        $request->session()->get('mike');
//        session(['tina'=>'ceo']); // global function
//        $request->session()->forget('mike'); delete mike session
//        $request->session()->flush(); // delete all
//        return session()->all();

        /* flashing data */
//        $request->session()->flash('message', 'Post has been created');
//        return $request->session()->get('message');
//        $request->session()->reFlash(); // keeps data longer
//        $request->session()->keep('message'); // keeps data longer

        return view('home');
    }
}
