<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Subsicber;
use App\Newslatest;
use App\Subcategory;


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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $all_event = Event::count();
        $all_sub = Subsicber::count();
        $all_news = Newslatest::count();
        $all_cat = Subcategory::count();
        return view('home',compact('all_event','all_sub','all_news','all_cat'));
    }
}
