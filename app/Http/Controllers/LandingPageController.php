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
        $personils = Personil::all();
        $kepalaSekolah = Personil::where('jabatan', 1)->first();
        $prestasi = Berita::where('category', 'prestasi')->get();
        $pengumuman = Berita::where('category', 'pengumuman')->get();

        return view('landingpage.index', compact('personils', 'kepalaSekolah', 'prestasi', 'pengumuman'));
    }

    public function show($id){
        $berita = Berita::find($id);
        $beritas = Berita::where('category', 'prestasi')->get()->except($id);

        return view('landingpage.show', compact('berita', 'beritas'));
    }

    public function galleries(){
        $galleries = Galleries::where('status', 1)->get();
        return view('landingpage.galleries', compact('galleries'));
    }

    public function informasi(){
        $beritas = Berita::all();
        return view('landingpage.informasi', compact('beritas'));
    }

    public function profile(){
        return view('landingpage.profile');
    }
}
