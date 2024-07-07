<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
                'title' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'content' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $data = [
                'title' => $request->title,
                'category' => $request->category,
                'content' => $request->content,
                'penulis' => Auth::user()->name,
                'tgl_posting' => now()->format('Y-m-d'),
            ];

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('assets/panel/admin/images/berita'), $imageName);
                $data['image'] = $imageName;
            }

            Berita::create($data);

            toast()->success('Berita Berhasil Di Posting', 'Success');
            return redirect()->route('berita.index')->with('success', 'Berita Berhasil');
        } catch (\Throwable $th) {

            toast()->error('Posting gagal, Ada kesalahan dalam proses, Silakan coba lagi' . $th->getMessage());
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
        $berita = Berita::find($id);
        return view('panel.admin.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'content' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $berita = Berita::findOrFail($id);

            $data = [
                'title' => $request->title,
                'category' => $request->category,
                'content' => $request->content,
                'penulis' => Auth::user()->name,
                'tgl_posting' => now()->format('Y-m-d'),
            ];

            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if ($berita->image && file_exists(public_path('assets/panel/admin/images/berita/' . $berita->image))) {
                    unlink(public_path('assets/panel/admin/images/berita/' . $berita->image));
                }

                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('assets/panel/admin/images/berita'), $imageName);
                $data['image'] = $imageName;
            }

            // dd($data);

            $berita->update($data);

            toast()->success('Berita Berhasil Diupdate', 'Success');
            return redirect()->route('berita.index')->with('success', 'Berita Berhasil Diupdate');
        } catch (\Throwable $th) {
            toast()->error('Update gagal, Ada kesalahan dalam proses, Silakan coba lagi' . $th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $berita = Berita::find($id);
        $berita->delete();
        toast()->success('Berita Berhasil Dihapus', 'Success');
        return redirect()->back();
    }
}
