<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Outlet};

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
        $outlets = Outlet::all();
        $mapOutlets = $outlets->makeHidden(['active', 'created_at', 'updated_at', 'image']);
        $latitude = $outlets->count() && (request()->filled('name') || request()->filled('search')) ? $outlets->average('latitude') : 23.7940146;
        $longitude = $outlets->count() && (request()->filled('name') || request()->filled('search')) ? $outlets->average('longitude') : 90.3782532;
        return view('home',compact('outlets', 'mapOutlets', 'latitude', 'longitude'));
    }
    
}
