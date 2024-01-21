<?php

namespace App\Http\Controllers;

use App\Http\Resources\KelasResource;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return response()->json(['data' => $kelas]);
    }

    public function store(Request $request)
    {
        try {
            $kelas = Kelas::create([
                'kelas' => $request->kelas
            ]);
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data kelas gagal disimpan',
                'error' => $e->getMessage()
            ]);
        }

        return response()->json([
            'code' => '200',
            'message' => 'Data kelas berhasil disimpan',
            'data' => $kelas
        ]);
    }

    public function show($id)
    {
        $kelas = Kelas::where('_id',$id)->get();
        $siswa = Siswa::where('kelas_id', $id)->get();    
        foreach ($kelas as $k) {
            $response = [
                'id' => $k->_id, 
                'kelas' => $k->kelas,
                'siswa' => $siswa
            ];
        }
        
        return response()->json(['data' => $response]);
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id)->first();
        
        try {
            $kelas->kelas = $request->kelas;
            $kelas->save();
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data kelas gagal diubah',
                'error' => $e->getMessage()
            ]);
        }
        
        return response()->json([
            'code' => '200',
            'message' => 'Data kelas berhasil diubah',
            'data' => $kelas
        ]);
    }

    public function destroy($id)
    {
        $kelas = Kelas::find($id)->first();
        
        try {
            $kelas->delete();
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data kelas gagal dihapus',
                'error' => $e->getMessage()
            ]);
        }
        
        return response()->json([
            'code' => '200',
            'message' => 'Data kelas berhasil dihapus',
            'data' => $kelas
        ]);
    }
}
