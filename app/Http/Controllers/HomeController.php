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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard(){
        $pageConfigs = ['pageHeader' => true];
        $breadcrumbs = [["link" => "/admin/dashboard", "name" => "Dashboard"]];
        return view('admin.dashboard', compact('pageConfigs','breadcrumbs'));
    }
}
