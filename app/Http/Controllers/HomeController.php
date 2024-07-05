<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Personil;
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
        $personilCount = Personil::count();
        $personil = Personil::all();

        $beritaCount = Berita::count();
        $berita = Berita::all();
        return view('panel.admin.dashboard.index', compact('personil','personilCount','beritaCount','berita'));
    }
}
