<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateSiswaRequest;
use App\Models\Nilai;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return response()->json(['data' => $siswa]);
    }

    public function store(Request $request)
    {
        try {
            $siswa = Siswa::create([
                'nama' => $request->nama,
                'kelas_id' => $request->kelas_id
            ]);
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data siswa gagal disimpan',
                'error' => $e->getMessage()
            ]);
        }

        return response()->json([
            'code' => '200',
            'message' => 'Data siswa berhasil disimpan',
            'data' => $siswa
        ]);
    }

    public function show($id)
    {
        $siswa = Siswa::where('_id',$id)->get();
        $nilai2 = [];
        $nilai = Nilai::where('siswa_id',$id)->get();
        foreach ($siswa as $s) {
            foreach ($nilai as $n) {
                $nama    = $n->pelajaran->pelajaran;
                $latihan = 0.15 * (($n->latihan_1+$n->latihan_2+$n->latihan_3+$n->latihan_4) / 4);
                $harian  = 0.2 * (($n->ulangan_harian_1+$n->ulangan_harian_2) / 2);
                $uts     = 0.25 * $n->ulangan_tengah_semester;
                $uas     = 0.4 * $n->ulangan_semester;
                $hasil   = $latihan+$harian+$uts+$uas;

                $nilai1  = [
                    'pelajaran_id' => $n->id,
                    'pelajaran' => $nama,
                    'nilai_total' => $hasil
                ];

                array_push($nilai2, $nilai1);
            }
            $response = [
                'id' => $s->_id,
                'nama' => $s->nama,
                'kelas_id' => $s->kelas_id,
                'nilai' => $nilai2
            ];
        }
        return response()->json(['data' => $response]);
    }



    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id)->first();
        
        try {
            $siswa->nama = $request->nama;
            $siswa->kelas_id = $request->kelas_id;
            $siswa->save();
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data siswa gagal diubah',
                'error' => $e->getMessage()
            ]);
        }
        
        return response()->json([
            'code' => '200',
            'message' => 'Data siswa berhasil diubah',
            'data' => $siswa
        ]);
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id)->first();
        
        try {
            $siswa->delete();
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data siswa gagal dihapus',
                'error' => $e->getMessage()
            ]);
        }
        
        return response()->json([
            'code' => '200',
            'message' => 'Data siswa berhasil dihapus',
            'data' => $siswa
        ]);
    }
}
