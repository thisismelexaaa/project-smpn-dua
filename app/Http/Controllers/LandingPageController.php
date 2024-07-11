<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galleries;
use App\Models\kritikDanSaran;
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
        $masukan = kritikDanSaran::all();

        return view('landingpage.index', compact('personils', 'kepalaSekolah', 'prestasi', 'pengumuman', 'masukan'));
    }

    public function show($id)
    {
        $berita = Berita::find($id);
        $beritas = Berita::all()->except($id);

        return view('landingpage.show', compact('berita', 'beritas'));
    }

    public function galleries()
    {
        $galleries = Galleries::where('status', 1)->get();
        return view('landingpage.galleries', compact('galleries'));
    }

    public function informasi()
    {
        $beritas = Berita::all();
        return view('landingpage.informasi', compact('beritas'));
    }

    public function profile()
    {
        return view('landingpage.profile');
    }

    public function kritikDanSaran(Request $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email . $request->gmail,
                'message' => $request->message,
                'rating' => $request->rating
            ];

            // dd($data);

            kritikDanSaran::create($data);

            toast()->success('Pesan Terkirim, Terima kasih. Pesan anda akan kami terima.', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {

            toast()->error('Gagal Mengirim Pesan', 'Error');
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silahkan coba lagi.');
        };
    }
}
