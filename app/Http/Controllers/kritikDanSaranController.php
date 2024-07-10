<?php

namespace App\Http\Controllers;

use App\Models\kritikDanSaran;
use Illuminate\Http\Request;

class kritikDanSaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $masukan = kritikDanSaran::all();
        return view('panel.admin.masukan.index', compact('masukan'));
    }

    public function create()
    {
        //
    }
    public function show()
    {
        //
    }
    public function update()
    {
        //
    }

    public function destroy($id)
    {
        try {
            $masukan = kritikDanSaran::find($id);
            $masukan->delete();

            toast('Masukan Berhasil Dihapus', 'success');
            return redirect()->route('masukan.index');
        } catch (\Exception $e) {
            toast('Terjadi kesalahan saat menghapus data. Silakan coba lagi. ', 'error');
            return redirect()->back();
        }
    }
}
