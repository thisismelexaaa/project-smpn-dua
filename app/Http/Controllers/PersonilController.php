<?php

namespace App\Http\Controllers;

use App\Models\Galleries;
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
        try {
            // Mengambil semua data Personil kecuali jabatan 1
            $data = Personil::where('jabatan', '!=', 1)
                ->get(['id', 'name', 'jabatan', 'phone', 'image', 'email', 'mapel'])
                ->map(function ($item) {
                    $fullName = explode(' ', $item->name);
                    $email = explode('@', $item->email);

                    // Decode JSON mapel and ensure it is an array
                    $mapel = json_decode($item->mapel, true);
                    $mapel = is_array($mapel) ? implode(', ', $mapel) : $item->mapel;

                    return [
                        'id' => $item->id,
                        'name' => $item->name,
                        'jabatan' => $item->jabatan,
                        'phone' => $item->phone,
                        'image' => $item->image,
                        'first_name' => $fullName[0],
                        'last_name' => isset($fullName[1]) ? $fullName[1] : '',
                        'email' => $email[0],
                        'mapel' => $mapel,
                    ];
                });

            // Mengambil data Personil dengan jabatan sama dengan 1
            $jabatan = Personil::where('jabatan', 1)
                ->first(['id', 'name', 'jabatan', 'phone', 'image', 'email', 'sambutan']);

            if ($jabatan) {
                $fullName = explode(' ', $jabatan->name);
                $email = explode('@', $jabatan->email);

                $jabatan = [
                    'id' => $jabatan->id,
                    'name' => $jabatan->name,
                    'jabatan' => $jabatan->jabatan,
                    'phone' => $jabatan->phone,
                    'image' => $jabatan->image,
                    'first_name' => $fullName[0],
                    'last_name' => isset($fullName[1]) ? $fullName[1] : '',
                    'email' => $email[0],
                    'sambutan' => $jabatan->sambutan
                ];
            }
        } catch (\Exception $e) {
            // Menangani pengecualian (log, pemberitahuan, dll.)
            return back()->withErrors(['error' => 'Failed to fetch personil data.']);
        }

        return view('panel.admin.personil.index', compact('data', 'jabatan'));
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
        // dd($request->all());
        try {
            $this->validate($request, [
                'jabatan' => 'required|string|max:255',
                'email' => 'nullable|string|max:255',
                'phone' => 'required|string|max:20',
            ]);

            // Menggabungkan first_name dan last_name menjadi name
            $name = $request->first_name . ' ' . $request->last_name;

            $mapel = json_encode($request->mapel);

            // Combine email and gmail fields
            $email = $request->email;

            $data = [
                'name' => $name,
                'jabatan' => $request->jabatan,
                'email' => $email,
                'phone' => $request->phone,
                'mapel' => $mapel,
                'sambutan' => $request->sambutan
            ];

            if ($request->hasFile('image')) {
                $image = $request->file('image');

                // Generate unique filename
                $imageName = time() . '_' . $image->getClientOriginalName();

                // Determine destination paths
                $personilPath = public_path('assets/panel/admin/images/personil');

                // Ensure directories exist or create them
                if (!file_exists($personilPath)) {
                    mkdir($personilPath, 0777, true);
                }

                // Move file to personil directory
                $image->move($personilPath, $imageName);
                $data['image'] = $imageName;
            }

            // dd($data);

            // Store in personil table
            Personil::create($data);

            // Menampilkan pesan sukses
            toast('Data Berhasil Ditambahkan', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Menangkap dan mencatat pesan kesalahan
            Log::error('Error while saving personil: ' . $e->getMessage());

            // Menampilkan pesan kesalahan kepada pengguna
            toast('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.' . $e->getMessage(), 'error');
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
    public function update(Request $request, $id)
    {
        try {
            // Validate the request
            $this->validate($request, [
                'jabatan' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Find the personil data by ID
            $personil = Personil::findOrFail($id);

            // Combine first_name and last_name into name
            $name = $request->first_name . ' ' . $request->last_name;

            // Combine email and gmail fields
            $email = $request->email;

            $data = [
                'name' => $name,
                'jabatan' => $request->jabatan,
                'email' => $email,
                'phone' => $request->phone,
                'sambutan' => $request->sambutan
            ];

            // Handle file upload if present
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $personilPath = public_path('assets/panel/admin/images/personil');

                // Ensure directories exist or create them
                if (!file_exists($personilPath)) {
                    mkdir($personilPath, 0777, true);
                }

                // Move file to personil directory and copy to galleries directory
                $image->move($personilPath, $imageName);
                $data['image'] = $imageName;

                // Delete previous image file if exists
                if (!empty($personil->image)) {
                    $previousImagePath = $personilPath . '/' . $personil->image;
                    if (file_exists($previousImagePath)) {
                        unlink($previousImagePath);
                    }
                }
            }

            // Update personil data
            $personil->update($data);

            // Display success message
            toast('Data Berhasil Diperbarui', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Log and display error message
            Log::error('Error while updating personil: ' . $e->getMessage());
            toast('Terjadi kesalahan saat memperbarui data. Silakan coba lagi.' . $e->getMessage(), 'error');
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
