<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Menu;
use App\Models\User;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lastPages = Page::latest()->take(3)->get();
        $lastMenuItems = Menu::latest()->take(3)->get();
        $users = User::latest()->take(3)->get();

        return view('home', compact('lastPages', 'lastMenuItems', 'users'));
    }

}
