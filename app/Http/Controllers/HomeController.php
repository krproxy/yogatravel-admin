<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $yogaUsers = \App\YogaUser::all();
      foreach ($yogaUsers as $yogaUser) {
        dd($yogaUser);
      }

        return view('home');
    }
}
