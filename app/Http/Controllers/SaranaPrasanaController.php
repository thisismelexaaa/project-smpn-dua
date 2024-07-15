<?php

namespace App\Http\Controllers;

use App\Models\SaranaPrasarana;
use Exception;
use Illuminate\Http\Request;

class SaranaPrasanaController extends Controller
{
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
                'name' => $request->name,
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
                } else {
                    throw new \Exception("Unsupported file type: $fileExtension");
                }
            }

            SaranaPrasarana::create($data);

            toast()->success('Galeri Berhasil Ditambah', 'Success');
            return redirect()->back();
        } catch (Exception $e) {
            toast()->error($e->getMessage(), 'Error');
            return redirect()->back();
        }
    }
}
