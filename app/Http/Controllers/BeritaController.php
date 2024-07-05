<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::all();
        return view('panel.admin.berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'category' => 'required',
                'content' => 'required',
            ]);

            $data = [
                'title' => $request->title,
                'category' => $request->category,
                'content' => $request->content,
                'penulis' => Auth::user()->name,
                'tgl_posting' => date('Y-m-d'),
            ];

            Berita::create($data);

            toast()->success('Berita Berhasil Di Posting', 'Success');
            return redirect()->route('berita.index')->with('success', 'Berita Berhasil');
        } catch (\Throwable $th) {
            toast()->error('Posting gagal, Ada kesalahan dalam proses input', $th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $berita = Berita::find($id);
        return view('panel.admin.berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
