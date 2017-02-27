<?php

namespace App\Http\Controllers;

use App\Page;
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
        $pages = Page::query()->orderBy('created_at','desc')->paginate(5);

        return view('admin.index',compact('pages'));
    }
}
