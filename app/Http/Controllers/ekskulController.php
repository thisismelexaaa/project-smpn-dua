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
            $file = $request->file('file');
            $fileExtension = $file->getClientOriginalExtension();

            $data = [
                'title' => $request->title,
                'status' => 1,
            ];

            if ($file) {
                // Handle image files
                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'svg'])) {
                    // Delete old image if it exists
                    if ($request->image && file_exists(public_path('assets/panel/admin/images/ekskul/' . $request->image))) {
                        unlink(public_path('assets/panel/admin/images/ekskul/' . $request->image));
                    }

                    $fileName = time() . '.' . $fileExtension;
                    $file->move(public_path('assets/panel/admin/images/ekskul'), $fileName);
                    $data['image'] = $fileName;
                }
                // Handle video files
                else if ($fileExtension == 'mp4') {
                    // Delete old video if it exists
                    if ($request->video && file_exists(public_path('assets/panel/admin/video/ekskul/' . $request->video))) {
                        unlink(public_path('assets/panel/admin/video/ekskul/' . $request->video));
                    }

                    $fileName = time() . '.' . $fileExtension;
                    $file->move(public_path('assets/panel/admin/video/ekskul'), $fileName);
                    $data['video'] = $fileName;
                } else {
                    throw new \Exception("Unsupported file type: $fileExtension");
                }
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
