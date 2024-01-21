<?php

namespace App\Http\Controllers;

use App\Models\Pelajaran;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    public function index()
    {
        $pelajaran = Pelajaran::all();
        return response()->json(['da' => $pelajaran]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $pelajaran = Pelajaran::create([
                'pelajaran' => $request->pelajaran
            ]);
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data pelajaran gagal disimpan',
                'error' => $e->getMessage()
            ]);
        }

        return response()->json([
            'code' => '200',
            'message' => 'Data pelajaran berhasil disimpan',
            'data' => $pelajaran
        ]);
    }

    public function update(Request $request, $id)
    {
        $pelajaran = Pelajaran::find($id)->first();
        
        try {
            $pelajaran->pelajaran = $request->pelajaran;
            $pelajaran->save();
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data pelajaran gagal diubah',
                'error' => $e->getMessage()
            ]);
        }
        
        return response()->json([
            'code' => '200',
            'message' => 'Data pelajaran berhasil diubah',
            'data' => $pelajaran
        ]);
    }

    public function destroy($id)
    {
        $pelajaran = Pelajaran::find($id)->first();
        
        try {
            $pelajaran->delete();
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data pelajaran gagal dihapus',
                'error' => $e->getMessage()
            ]);
        }
        
        return response()->json([
            'code' => '200',
            'message' => 'Data pelajaran berhasil dihapus',
            'data' => $pelajaran
        ]);
    }
}
