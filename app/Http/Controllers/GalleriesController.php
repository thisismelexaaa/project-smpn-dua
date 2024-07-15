<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekskul;
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
        $ekskul = Ekskul::all();
        return view('panel.admin.gallery.index', compact('galleries', 'ekskul'));
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
            // Destructuring file format
            $file = $request->file('file');
            $fileExtension = $file->getClientOriginalExtension();

            $data = [
                'title' => $request->title,
                'category' => $request->category,
                'status' => 1,
            ];

            if ($file) {
                // Handle image files
                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'svg'])) {
                    // Delete old image if it exists
                    if ($request->image && file_exists(public_path('assets/panel/admin/images/galleries/' . $request->image))) {
                        unlink(public_path('assets/panel/admin/images/galleries/' . $request->image));
                    }

                    $fileName = time() . '.' . $fileExtension;
                    $file->move(public_path('assets/panel/admin/images/galleries'), $fileName);
                    $data['image'] = $fileName;
                }
                // Handle video files
                else if ($fileExtension == 'mp4') {
                    // Delete old video if it exists
                    if ($request->video && file_exists(public_path('assets/panel/admin/video/galleries/' . $request->video))) {
                        unlink(public_path('assets/panel/admin/video/galleries/' . $request->video));
                    }

                    $fileName = time() . '.' . $fileExtension;
                    $file->move(public_path('assets/panel/admin/video/galleries'), $fileName);
                    $data['video'] = $fileName;
                } else {
                    throw new \Exception("Unsupported file type: $fileExtension");
                }
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
        try {
            $gallery = Galleries::findOrFail($id);

            $gallery->update(['status' => 1]);

            toast()->success('Galeri Berhasil Dihapus', 'Success');
            return redirect()->back();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            toast()->error('Galeri Tidak Ditemukan', 'Error');
            return redirect()->back();
        }
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
            return redirect()->back();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            toast()->error('Galeri Tidak Ditemukan', 'Error');
            return redirect()->back();
        }
    }
}
