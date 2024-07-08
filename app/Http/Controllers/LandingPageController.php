<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galleries;
use App\Models\Personil;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $galleries = Galleries::where('status', 1)->get();
        $personils = Personil::all();
        $beritas = Berita::all();

        return view('landingpage.index', compact('galleries', 'personils', 'beritas'));
    }

    public function show($id){
        $berita = Berita::find($id);
        return view('landingpage.show', compact('berita'));
    }
}
