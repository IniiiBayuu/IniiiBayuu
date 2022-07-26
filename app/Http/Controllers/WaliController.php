<?php

namespace App\Http\Controllers;

use App\Models\Wali;
use App\Models\Siswa;
use Illuminate\Http\Request;

class WaliController extends Controller
{
  
    public function index()
    {
        // memanggil data data Wali bersama dengan data siswa
        // yang doibuat dari methiod 'siswa' di model 'Wali'
        $wali = Wali::with('siswa')->get();
        return view('wali.index', ['wali' => $wali]);
    }

  
    public function create()
    {
        $siswa = Siswa::all();
        return view('wali.create', compact('siswa'));
    }

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'id_siswa' => 'required|unique:walis',
            'foto' => 'required|image|max:2048',
            
        ]);

        $wali = new Wali();
        $wali->nama = $request->nama;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/wali/', $name);
            $wali->foto = $name;
        }
        $wali->id_siswa = $request->id_siswa;
        $wali->save();
        return redirect()->route('wali.index')->with('succes', 'Data Berhasil Dibuat!');
    }

 
    public function show($id)
    {
        $wali = Wali::findOrFail($id);
        return view('wali.show', compact('wali'));
    }

    
    public function edit($id)
    {
        $wali = Wali::findOrFail($id);
        $siswa = Siswa::all();
        return view('wali.edit', compact('wali', 'siswa'));
    }

   
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'id_siswa' => 'required',
            'foto' => 'required|max:2048',
            
        ]);

        $wali = Wali::findOrFail($id);
        $wali->nama = $request->nama;
        if ($request->hasFile('foto')) {
            $wali->deleteImage();
            $image = $request->file('foto');
            $name = rand(1000, 9999). $image->getClientOriginalName();
            $image->move('images/wali/', $name);
            $wali->foto = $name;
        }
        $wali->id_siswa = $request->id_siswa;
        $wali->save();
        return redirect()->route('wali.index')->with('success', 'Data Berhasil Dibuat!');
    }

    public function destroy($id)
    {
        $wali = Wali::findOrFail($id);
        $wali->deleteImage();
        $wali->delete();
        return redirect()->route('wali.index')->with('success', 'Data Berhasil Dibuat!');
    }
}
