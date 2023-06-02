<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(){
        $mahasiswas = Mahasiswa::all();
        return response()->json($mahasiswas);
    }

    public function create(Request $request){
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->umur = $request->umur;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->kota = $request->kota;
        $mahasiswa->kelas = $request->kelas;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->save();

        return response()->json($mahasiswa);
    }

    public function read($nim){
        $mahasiswa = Mahasiswa::find($nim);
        if (!$mahasiswa){
            return response()->json(['message' => 'Mahasiswa not found', 404]);
        }
        return response()->json($mahasiswa);
    }

    public function update(Request $request, $nim){
        $mahasiswa = Mahasiswa::find($nim);
        if (!$mahasiswa){
            return response()->json(['message' => 'Mahasiswa not found', 404]);
        }
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->umur = $request->umur;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->kota = $request->kota;
        $mahasiswa->kelas = $request->kelas;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->save();

        return response()->json('$mahasiswa');
    }

    public function destroy($nim){
        $mahasiswa = Mahasiswa::find($nim);
        if (!$mahasiswa){
            return response()->json(['message' => 'Mahasiswa not found', 404]);
        }
        $mahasiswa->delete();

        return response()->json(['message' => 'Mahasiswa deleted successfully', 404]);
    }
}
