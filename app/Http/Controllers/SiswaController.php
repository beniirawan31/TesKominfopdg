<?php

namespace App\Http\Controllers;

use App\Models\t_siswa;
use App\Models\TbSiswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {

        $siswa = TbSiswa::all();
        return view('Dashboard.index', compact('siswa'));
        
    }

    public function create()
    {
        return view('Dashboard.create');
    }

    // simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama'       => 'required|string|max:255',
            'nisn'       => 'required|string|unique:tb_siswas,nisn',
            'alamat'     => 'required|string',
            'id_sekolah' => 'required|string',
            'id_kelas'   => 'nullable|string',
            'id_th_ajar' => 'required|string',
            'id_mesjid'  => 'required|string',
            'id_card'    => 'required|string|unique:tb_siswas,id_card',
        ]);

        TbSiswa::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
    }
}
