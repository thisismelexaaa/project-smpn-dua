<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ekskulController extends Controller
{
    public function index()
    {
        $ekskuls = Ekskul::latest()->get();
        return view('panel.admin.ekskul.index', compact('ekskuls'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request;

            $data = [
                'title' => $data->title,
                'status' => 1,
            ];

            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if ($request->image && file_exists(public_path('assets/panel/admin/images/ekskul/' . $request->image))) {
                    unlink(public_path('assets/panel/admin/images/ekskul/' . $request->image));
                }

                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('assets/panel/admin/images/ekskul'), $imageName);
                $data['image'] = $imageName;
            }

            if ($request->hasFile('video')) {
                if ($request->video && file_exists(public_path('assets/panel/admin/video/ekskul/' . $request->video))) {
                    unlink(public_path('assets/panel/admin/video/ekskul/' . $request->video));
                }   

                $videoName = time() . '.' . $request->file('video')->getClientOriginalExtension();
                $request->file('video')->move(public_path('assets/panel/admin/video/ekskul'), $videoName);
                $data['video'] = $videoName;
            }

            Ekskul::create($data);

            toast()->success('Galeri Berhasil Ditambah', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('Error while creating gallery: ' . $e->getMessage());
            toast()->error('Terjadi kesalahan saat menambahkan data. Silakan coba lagi. ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $ekskuls = Ekskul::findOrFail($id);

            $ekskuls->update(['status' => 1]);

            toast()->success('Galeri Berhasil Dihapus', 'Success');
            return redirect()->back();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            toast()->error('Galeri Tidak Ditemukan', 'Error');
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        try {
            $ekskuls = Ekskul::findOrFail($id);

            $ekskuls->update(['status' => 0]);

            toast()->success('Galeri Berhasil Dihapus', 'Success');
            return redirect()->back();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            toast()->error('Galeri Tidak Ditemukan', 'Error');
            return redirect()->back();
        }
    }
}
