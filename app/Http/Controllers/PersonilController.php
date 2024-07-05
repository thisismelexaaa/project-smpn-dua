<?php

namespace App\Http\Controllers;

use App\Models\Personil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PersonilController extends Controller
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
        $data = Personil::all()->map(function ($item) {
            $fullName = explode(' ', $item->name);
            $email = explode('@', $item->email);

            return [
                'id' => $item->id,
                'name' => $item->name,
                'jabatan' => $item->jabatan,
                'phone' => $item->phone,
                'image' => $item->image,
                'first_name' => $fullName[0],
                'last_name' => isset($fullName[1]) ? $fullName[1] : '',
                'email' => $email[0],
            ];
        })->toArray();

        return view('panel.admin.personil.index', compact('data'));
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
            $this->validate($request, [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            // Menggabungkan first_name dan last_name menjadi name
            $name = $request->first_name . ' ' . $request->last_name;
            $email = $request->email . $request->gmail;
            $data = [
                'name' => $name,
                'jabatan' => $request->jabatan,
                'email' => $email,
                'phone' => $request->phone,
            ];

            // Menghandle file upload jika ada
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('assets/panel/admin/images/personil'), $imageName);
                $data['image'] = $imageName;
            }

            // Menyimpan data ke database
            Personil::create($data);

            // Menampilkan pesan sukses
            toast('Data Berhasil Ditambahkan', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Menangkap dan mencatat pesan kesalahan
            Log::error('Error while saving personil: ' . $e->getMessage());

            // Menampilkan pesan kesalahan kepada pengguna
            toast('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.', 'error');
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
            $personil = Personil::find($id);

            if (!$personil) {
                toast('Data Personil Tidak Ditemukan', 'error');
                return redirect()->back();
            }

            $this->validate($request, [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
            ]);

            // Menggabungkan first_name dan last_name menjadi name
            $name = $request->first_name . ' ' . $request->last_name;
            $email = $request->email;
            $data = [
                'name' => $name,
                'jabatan' => $request->jabatan,
                'email' => $email,
                'phone' => $request->phone,
            ];

            // Menghandle file upload jika ada
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('assets/panel/admin/images/personil'), $imageName);
                $data['image'] = $imageName;
            }

            // Memperbarui data di database
            $personil->update($data);

            // Menampilkan pesan sukses
            toast('Data Berhasil Diperbarui', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Menangkap dan mencatat pesan kesalahan
            Log::error('Error while updating personil: ' . $e->getMessage());

            // Menampilkan pesan kesalahan kepada pengguna
            toast('Terjadi kesalahan saat menyimpan data. Silakan coba lagi. ' . $e->getMessage(), 'error');
            return redirect()->back();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $personil = Personil::find($id);
            if (!$personil) {
                toast('Data Personil Tidak Ditemukan', 'error');
                return redirect()->back();
            }

            // delete image
            if ($personil->image && $personil->image !== 'person.jpg') {
                $imagePath = public_path('assets/panel/admin/images/personil/' . $personil->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $personil->delete();
            toast('Data Berhasil Dihapus', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('Error while deleting personil: ' . $e->getMessage());
            toast('Terjadi kesalahan saat menghapus data. Silakan coba lagi. ' . $e->getMessage(), 'error');
            return redirect()->back();
        }
    }
}
