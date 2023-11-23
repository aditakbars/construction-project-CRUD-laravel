<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyekController extends Controller
{
    //
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
    
        // Query data proyek dengan filter berdasarkan nama jika search term ada
        if ($searchTerm) {
            $datas = DB::select('SELECT * 
            FROM proyek 
            JOIN manager ON proyek.id_manager = manager.id_manager 
            JOIN klien ON proyek.id_klien = klien.id_klien 
            JOIN vendor ON proyek.id_vendor = vendor.id_vendor 
            WHERE nama_proyek LIKE ? AND proyek.deleted = 0', ['%' . $searchTerm . '%']);
        } else {
            // Jika tidak ada search term, tampilkan semua data proyek
            $datas = DB::select('SELECT * 
            FROM proyek 
            JOIN manager ON proyek.id_manager = manager.id_manager 
            JOIN klien ON proyek.id_klien = klien.id_klien 
            JOIN vendor ON proyek.id_vendor = vendor.id_vendor
            WHERE proyek.deleted = 0');
        }
    
        return view('proyek.index')->with('datas', $datas)->with('searchTerm', $searchTerm);
    }
    
    //to show deleted data
    public function trash(Request $request)
    {
        $searchTerm = $request->input('search');
    
        // Query data proyek dengan filter berdasarkan nama jika search term ada
        if ($searchTerm) {
            $datas = DB::select('SELECT * 
            FROM proyek 
            JOIN manager ON proyek.id_manager = manager.id_manager 
            JOIN klien ON proyek.id_klien = klien.id_klien 
            JOIN vendor ON proyek.id_vendor = vendor.id_vendor 
            WHERE nama_proyek LIKE ? AND proyek.deleted = 1', ['%' . $searchTerm . '%']);
        } else {
            // Jika tidak ada search term, tampilkan semua data proyek
            $datas = DB::select('SELECT * 
            FROM proyek 
            JOIN manager ON proyek.id_manager = manager.id_manager 
            JOIN klien ON proyek.id_klien = klien.id_klien 
            JOIN vendor ON proyek.id_vendor = vendor.id_vendor
            WHERE proyek.deleted = 1');
        }
    
        return view('proyek.trash')->with('datas', $datas)->with('searchTerm', $searchTerm);
    }

    public function create()
    {
        $kliens = DB::select("SELECT * FROM klien");
        $managers = DB::select("SELECT * FROM manager");
        $vendors = DB::select("SELECT * FROM vendor");
        return view('proyek.add')->with('kliens', $kliens)->with('managers', $managers)->with('vendors', $vendors);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_proyek' => 'required',
            'nama_proyek' => 'required',
            'lokasi' => 'required',
            'durasi' => 'required',
            'anggaran' => 'required',
            'id_manager' => 'required',
            'id_vendor' => 'required',
            'id_klien' => 'required',
        ]);
        DB::insert(
            'INSERT INTO proyek(id_proyek,nama_proyek, lokasi, durasi, anggaran, id_manager, id_vendor, id_klien) VALUES (:id_proyek, :nama_proyek, :lokasi, :durasi, :anggaran, :id_manager, :id_vendor, :id_klien)',
            [
                'id_proyek' => $request->id_proyek,
                'nama_proyek' => $request->nama_proyek,
                'lokasi' => $request->lokasi,
                'durasi' => $request->durasi,
                'anggaran' => $request->anggaran,
                'id_manager' => $request->id_manager,
                'id_vendor' => $request->id_vendor,
                'id_klien' => $request->id_klien,
            ]
        );
        return redirect()->route('proyek.index')->with('success', 'Data proyek berhasil disimpan');
    }

    // public function edit a row from a table
    public function edit($id)
    {
        $data = DB::select("SELECT * FROM proyek WHERE id_proyek = $id");
        $data = $data[0];
        $kliens = DB::select("SELECT * FROM klien");
        $managers = DB::select("SELECT * FROM manager");
        $vendors = DB::select("SELECT * FROM vendor");
        return view('proyek.edit')->with('data', $data)->with('kliens', $kliens)->with('managers', $managers)->with('vendors', $vendors);
    }

     // public function to update the table value
    public function update($id, Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required',
            'lokasi' => 'required',
            'durasi' => 'required',
            'anggaran' => 'required',
            'id_manager' => 'required',
            'id_vendor' => 'required',
            'id_klien' => 'required',
        ]);

        DB::update(
            'UPDATE proyek SET nama_proyek = :nama_proyek, lokasi = :lokasi, durasi = :durasi, anggaran = :anggaran, id_klien = :id_klien, id_manager = :id_manager, id_vendor = :id_vendor WHERE id_proyek = :id',
            [
                'id' => $id,
                'nama_proyek' => $request->nama_proyek,
                'lokasi' => $request->lokasi,
                'durasi' => $request->durasi,
                'anggaran' => $request->anggaran,
                'id_klien' => $request->id_klien,
                'id_manager' => $request->id_manager,
                'id_vendor' => $request->id_vendor,
            ]
        );
        return redirect()->route('proyek.index')->with('success', 'Data Proyek berhasil diubah');
    }

    public function delete($id)
    {
        DB::update('UPDATE proyek SET deleted = 1 WHERE id_proyek = :id_proyek', ['id_proyek' => $id]);
        return redirect()->route('proyek.index')->with('success', 'Data Proyek berhasil dihapus');
    }

    public function restore($id)
    {
        DB::update('UPDATE proyek SET deleted = 0 WHERE id_proyek = :id_proyek', ['id_proyek' => $id]);
        return redirect()->route('proyek.index')->with('success', 'Data Proyek berhasil dipulihkan');
    }

    public function remove($id)
    {
        DB::delete('DELETE FROM proyek WHERE id_proyek = :id_proyek', ['id_proyek' => $id]);
        return redirect()->route('proyek.trash')->with('success', 'Data Proyek berhasil dihapus permanen');
    }

}
