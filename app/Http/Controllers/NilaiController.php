<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    
    
    public function store(Request $request)
    {
        try {
            $nilai = Nilai::create([
                'siswa_id' => $request->siswa_id,
                'pelajaran_id' => $request->pelajaran_id,
                'latihan_1' => $request->latihan_1,
                'latihan_2' => $request->latihan_2,
                'latihan_3' => $request->latihan_3,
                'latihan_4' => $request->latihan_4,
                'ulangan_harian_1' => $request->ulangan_harian_1,
                'ulangan_harian_2' => $request->ulangan_harian_2,
                'ulangan_tengah_semester' => $request->ulangan_tengah_semester,
                'ulangan_semester' => $request->ulangan_semester,
            ]);
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data nilai gagal disimpan',
                'error' => $e->getMessage()
            ]);
        }

        return response()->json([
            'code' => '200',
            'message' => 'Data nilai berhasil disimpan',
            'data' => $nilai
        ]);
        

        return response()->json(['data' => $nilai]);
    }

    public function show($id)
    {
        $nilai = Nilai::where('pelajaran_id',$id)->get();
        return response()->json(['data' => $nilai]);
    }

    public function update(Request $request, $id)
    {
        $nilai = Pelajaran::find($id)->first(); //masukkan id utamanya
        
        try {
            $pelajaran->pelajaran = $request->pelajaran;
            $nilai->siswa_id = $request->siswa_id;
            $nilai->pelajaran_id = $request->pelajaran_id;
            $nilai->latihan_1 = $request->latihan_1;
            $nilai->latihan_2 = $request->latihan_2;
            $nilai->latihan_3 = $request->latihan_3;
            $nilai->latihan_4 = $request->latihan_4;
            $nilai->ulangan_harian_1 = $request->ulangan_harian_1;
            $nilai->ulangan_harian_2 = $request->ulangan_harian_2;
            $nilai->ulangan_tengah_semester = $request->ulangan_tengah_semester;
            $nilai->ulangan_semester = $request->ulangan_semeseter;
            $nilai->save();
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data nilai siswa gagal diubah',
                'error' => $e->getMessage()
            ]);
        }
        
        return response()->json([
            'code' => '200',
            'message' => 'Data nilai siswa berhasil diubah',
            'data' => $pelajaran
        ]);
    }

    public function destroy($id)
    {
        $nilai = Nilai::find($id)->first();
        
        try {
            $nilai->delete();
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data nilai siswa gagal dihapus',
                'error' => $e->getMessage()
            ]);
        }
        
        return response()->json([
            'code' => '200',
            'message' => 'Data nilai siswa berhasil dihapus',
            'data' => $nilai
        ]);
    }
    
}
