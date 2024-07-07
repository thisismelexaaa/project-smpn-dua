<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galleries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GalleriesController extends Controller
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
        $galleries = Galleries::all();
        return view('panel.admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request;

            $data = [
                'title' => $data->title,
                'status' => 1,
                'category' => $data->category
            ];

            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if ($request->image && file_exists(public_path('assets/panel/admin/images/galleries/' . $request->image))) {
                    unlink(public_path('assets/panel/admin/images/galleries/' . $request->image));
                }

                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('assets/panel/admin/images/galleries'), $imageName);
                $data['image'] = $imageName;
            }

            Galleries::create($data);

            toast()->success('Galeri Berhasil Ditambah', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('Error while creating gallery: ' . $e->getMessage());
            toast()->error('Terjadi kesalahan saat menambahkan data. Silakan coba lagi. ' . $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        try {
            $gallery = Galleries::findOrFail($id);

            $gallery->update(['status' => 0]);

            toast()->success('Galeri Berhasil Dihapus', 'Success');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            toast()->error('Galeri Tidak Ditemukan', 'Error');
        } catch (\Exception $e) {
            toast()->error('Terjadi Kesalahan Saat Menghapus Galeri', 'Error');
            Log::error('Error while deleting gallery: ' . $e->getMessage());
        }

        return redirect()->back();
    }
}
