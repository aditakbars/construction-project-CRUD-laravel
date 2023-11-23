<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KlienController extends Controller
{
    //
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
    
        // Query data klien dengan filter berdasarkan nama jika search term ada
        if ($searchTerm) {
            $datas = DB::select('SELECT * FROM klien WHERE nama_klien LIKE ? AND deleted = 0', ['%' . $searchTerm . '%']);
        } else {
            // Jika tidak ada search term, tampilkan semua data klien
            $datas = DB::select('SELECT * FROM klien WHERE deleted = 0');
        }
    
        return view('klien.index')->with('datas', $datas)->with('searchTerm', $searchTerm);
    }
    
    //to show deleted data
    public function trash(Request $request)
    {
        $searchTerm = $request->input('search');
    
        // Query data klien dengan filter berdasarkan nama jika search term ada
        if ($searchTerm) {
            $datas = DB::select('SELECT * FROM klien WHERE nama_klien LIKE ? AND deleted = 1', ['%' . $searchTerm . '%']);
        } else {
            // Jika tidak ada search term, tampilkan semua data klien
            $datas = DB::select('SELECT * FROM klien WHERE deleted = 1');
        }
    
        return view('klien.trash')->with('datas', $datas)->with('searchTerm', $searchTerm);
    }

    public function create()
    {
        return view('klien.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_klien' => 'required',
            'nama_klien' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'industri' => 'required',
        ]);
        DB::insert(
            'INSERT INTO klien(id_klien,nama_klien, telepon, alamat, industri) VALUES (:id_klien, :nama_klien, :telepon, :alamat, :industri)',
            [
                'id_klien' => $request->id_klien,
                'nama_klien' => $request->nama_klien,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'industri' => $request->industri,
            ]
        );
        return redirect()->route('klien.index')->with('success', 'Data Klien berhasil disimpan');
    }

    // public function edit a row from a table
    public function edit($id)
    {
        $data = DB::select("SELECT * FROM klien WHERE id_klien = $id");
        $data = $data[0];
        $datas = DB::select("SELECT * FROM klien");
        return view('klien.edit')->with('data', $data)->with('datas', $datas);
    }

     // public function to update the table value
    public function update($id, Request $request)
    {
        $request->validate([
            'nama_klien' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'industri' => 'required',
        ]);

        DB::update(
            'UPDATE klien SET nama_klien = :nama_klien, telepon = :telepon, alamat = :alamat, industri = :industri WHERE id_klien = :id',
            [
                'id' => $id,
                'nama_klien' => $request->nama_klien,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'industri' => $request->industri,
            ]
        );
        return redirect()->route('klien.index')->with('success', 'Data Klien berhasil diubah');
    }

    public function delete($id)
    {
        DB::update('UPDATE klien SET deleted = 1 WHERE id_klien = :id_klien', ['id_klien' => $id]);
        return redirect()->route('klien.index')->with('success', 'Data klien berhasil dihapus');
    }

    public function restore($id)
    {
        DB::update('UPDATE klien SET deleted = 0 WHERE id_klien = :id_klien', ['id_klien' => $id]);
        return redirect()->route('klien.index')->with('success', 'Data klien berhasil dipulihkan');
    }

    public function remove($id)
    {
        DB::delete('DELETE FROM klien WHERE id_klien = :id_klien', ['id_klien' => $id]);
        return redirect()->route('klien.trash')->with('success', 'Data Klien berhasil dihapus permanen');
    }

}
