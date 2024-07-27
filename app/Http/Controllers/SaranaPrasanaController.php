<?php

namespace App\Http\Controllers;

use App\Models\SaranaPrasarana;
use Exception;
use Illuminate\Http\Request;

class SaranaPrasanaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $sarana = SaranaPrasarana::all();
        return view('panel.admin.sarana-prasarana.index', compact('sarana'));
    }

    public function store(Request $request)
    {
        try {
            // Destructuring file format
            $file = $request->file('file');
            $fileExtension = $file->getClientOriginalExtension();

            $data = [
                'name' => $request->title,
                'keterangan' => $request->keterangan,
                'status' => 1,
            ];

            if ($file) {
                // Handle image files
                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'svg'])) {
                    // Delete old image if it exists
                    if ($request->image && file_exists(public_path('assets/panel/admin/images/sarana-prasarana/' . $request->image))) {
                        unlink(public_path('assets/panel/admin/images/sarana-prasarana/' . $request->image));
                    }

                    $fileName = time() . '.' . $fileExtension;
                    $file->move(public_path('assets/panel/admin/images/sarana-prasarana'), $fileName);
                    $data['image'] = $fileName;
                } else {
                    throw new \Exception("Unsupported file type: $fileExtension");
                }
            }

            SaranaPrasarana::create($data);

            toast()->success('Sarana Prasarana Berhasil Ditambah', 'Success');
            return redirect()->back();
        } catch (Exception $e) {
            toast()->error($e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $sarana = SaranaPrasarana::findOrFail($id);


            if ($sarana->status == 1) {
                $sarana->update(['status' => 0]);
            } else {
                $sarana->update(['status' => 1]);
            }

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
            $gallery = SaranaPrasarana::findOrFail($id);

            $gallery->delete();

            toast()->success('Sarana Prasarana Berhasil Dihapus', 'Success');
            return redirect()->back();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            toast()->error('Sarana Prasarana Tidak Ditemukan', 'Error');
            return redirect()->back();
        }
    }
}
