<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekskul;
use App\Models\Galleries;
use App\Models\kritikDanSaran;
use App\Models\Personil;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $personils = Personil::all();
        $kepalaSekolah = Personil::where('jabatan', 1)->first();
        $prestasi = Berita::where('category', 'prestasi')->get()->take(3);
        $pengumuman = Berita::where('category', 'pengumuman')->get()->take(3);
        $masukan = kritikDanSaran::all();
        $ekskuls = Ekskul::all();

        return view('landingpage.index', compact('personils', 'kepalaSekolah', 'prestasi', 'pengumuman', 'masukan', 'ekskuls'));
    }

    public function show($id)
    {
        $berita = Berita::find($id);
        $beritas = Berita::all()->except($id);

        return view('landingpage.show', compact('berita', 'beritas'));
    }

    public function berita()
    {
        $beritas = Berita::where('category', 'pengumuman')->get();
        return view('landingpage.berita', compact('beritas'));
    }

    public function prestasi()
    {
        $beritas = Berita::where('category', 'prestasi')->get();
        return view('landingpage.prestasi', compact('beritas'));
    }

    public function personil()
    {
        $personils = Personil::where('jabatan', '!=', 1)
            ->get(['id', 'name', 'jabatan', 'phone', 'image', 'email', 'mapel'])
            ->map(function ($item) {
                $fullName = explode(' ', $item->name);
                $email = explode('@', $item->email);

                // Decode JSON mapel and ensure it is an array
                $mapel = json_decode($item->mapel, true);
                $mapel = is_array($mapel) ? implode(', ', $mapel) : $item->mapel;

                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'jabatan' => $item->jabatan,
                    'phone' => $item->phone,
                    'image' => $item->image,
                    'first_name' => $fullName[0],
                    'last_name' => isset($fullName[1]) ? $fullName[1] : '',
                    'email' => $email[0],
                    'mapel' => $mapel,
                ];
            });
        return view('landingpage.personil', compact('personils'));
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
                'email' => $request->email,
                'message' => $request->message,
                'rating' => $request->rating,
                'status' => 0,
            ];

            kritikDanSaran::create($data);

            toast()->success('Pesan Terkirim, Terima kasih. Pesan anda akan kami terima.', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e);
            toast()->error('Gagal Mengirim Pesan' . $e, 'Error');
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silahkan coba lagi.');
        };
    }

    public function ekskul()
    {
        $ekskuls = Ekskul::all();
        return view('landingpage.ekskul', compact('ekskuls'));
    }

    public function galleriesFoto()
    {
        $galleries = Galleries::where('status', 1)->get();
        return view('landingpage.foto', compact('galleries'));
    }

    public function galleriesVideo()
    {
        $galleries = Galleries::where('status', 1)
            ->get();
        return view('landingpage.video', compact('galleries'));
    }
}
