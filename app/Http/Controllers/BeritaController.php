<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galleries;
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
                'kode_berita' => $request->kode
            ];

            // Menghandle file upload jika ada
            if ($request->hasFile('image')) {
                $image = $request->file('image');

                // Generate unique filename
                $imageName = time() . '_' . $image->getClientOriginalName();

                // Determine destination paths
                $beritaPath = public_path('assets/panel/admin/images/berita');
                // $galleriesPath = public_path('assets/panel/admin/images/galleries');

                // Ensure directories exist or create them
                if (!file_exists($beritaPath)) {
                    mkdir($beritaPath, 0777, true);
                }
                // if (!file_exists($galleriesPath)) {
                //     mkdir($galleriesPath, 0777, true);
                // }

                // Move file to berita directory
                $image->move($beritaPath, $imageName);
                $data['image'] = $imageName;

                // Optionally copy to galleries directory
                // copy($beritaPath . '/' . $imageName, $galleriesPath . '/' . $imageName);
                // Or, if you want to move instead of copy, uncomment the line below:
                // $image->move($galleriesPath, $imageName);
            }

            // $dataGalleries = [
            //     'kode' => $request->kode,
            //     'category' => 'berita',
            //     'title' => $request->title,
            //     'status' => 1,
            //     'image' => $data['image'],
            // ];

            Berita::create($data);

            // Galleries::create($dataGalleries);

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

            // Handle file upload if present
            if ($request->hasFile('image')) {
                $image = $request->file('image');

                // Generate unique filename
                $imageName = time() . '_' . $image->getClientOriginalName();

                // Determine destination paths
                $beritaPath = public_path('assets/panel/admin/images/berita');
                // $galleriesPath = public_path('assets/panel/admin/images/galleries');

                // Ensure directories exist or create them
                if (!file_exists($beritaPath)) {
                    mkdir($beritaPath, 0777, true);
                }
                // if (!file_exists($galleriesPath)) {
                //     mkdir($galleriesPath, 0777, true);
                // }

                // Move file to berita directory
                $image->move($beritaPath, $imageName);
                $data['image'] = $imageName;

                // Optionally copy to galleries directory
                // copy($beritaPath . '/' . $imageName, $galleriesPath . '/' . $imageName);
                // Or, if you want to move instead of copy, uncomment the line below:
                // $image->move($galleriesPath, $imageName);
            }

            // Update galleries data if it exists
            // $findGalleries = Galleries::where('kode', $berita->kode_berita)->first();

            // if ($findGalleries) {
            //     $dataGalleries = [
            //         'category' => 'berita',
            //         'title' => $request->title,
            //         'status' => 1,
            //     ];

            //     if (isset($data['image'])) {
            //         $dataGalleries['image'] = $data['image'];
            //     }

            //     $findGalleries->update($dataGalleries);
            // }

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
        try {
            $berita = Berita::find($id);

            // Update galleries data if it exists
            // $findGalleries = Galleries::where('kode', $berita->kode_berita)->first();

            // if ($findGalleries) {
            //     $dataGalleries = [
            //         'status' => 0,
            //     ];

            //     $findGalleries->update($dataGalleries);
            // }

            $berita->delete();
            toast()->success('Berita Berhasil Dihapus', 'Success');
            return redirect()->back();
        } catch (\Throwable $th) {
            toast()->error('Hapus gagal, Ada kesalahan dalam proses, Silakan coba lagi' . $th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
