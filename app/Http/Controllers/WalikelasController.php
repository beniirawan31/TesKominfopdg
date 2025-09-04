<?php

namespace App\Http\Controllers;

use App\Models\WalikelasModel;
use App\Models\KelasModel;
use Illuminate\Http\Request;

class WalikelasController extends Controller
{
    public function index()
    {
        $walikelas = WalikelasModel::with('kelas')->get();
        return view('walikelas.index', compact('walikelas'));
    }

    public function create()
    {
        $kelas = KelasModel::all();
        return view('walikelas.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas_models,id',
        ]);

        WalikelasModel::create($request->all());

        return redirect()->route('walikelas.index')->with('success', 'Walikelas berhasil ditambahkan');
    }

    public function edit($id)
    {
        $walikelas = WalikelasModel::findOrFail($id);
        $kelas = KelasModel::all();
        return view('walikelas.edit', compact('walikelas', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'     => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas_models,id',
        ]);

        $walikelas = WalikelasModel::findOrFail($id);
        $walikelas->update($request->all());

        return redirect()->route('walikelas.index')->with('success', 'Walikelas berhasil diperbarui');
    }

    public function destroy($id)
    {
        $walikelas = WalikelasModel::findOrFail($id);
        $walikelas->delete();

        return redirect()->route('walikelas.index')->with('success', 'Walikelas berhasil dihapus');
    }
}
