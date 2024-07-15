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
    public function update($id)
    {
        try{
            $masukan = kritikDanSaran::find($id);

            if($masukan->status == 1)
                $masukan->update(['status' => 0]);
            else{
                $masukan->update(['status' => 1]);
            }

            toast('Masukan Berhasil Ditampilkan', 'success');
            return redirect()->route('masukan.index');
        }catch(\Exception $e){
            toast('Terjadi kesalahan saat mengupdate data. Silakan coba lagi. ', 'error');
            return redirect()->back();
        }
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
