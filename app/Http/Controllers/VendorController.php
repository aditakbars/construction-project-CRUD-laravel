<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    //
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
    
        // Query data vendor dengan filter berdasarkan nama jika search term ada
        if ($searchTerm) {
            $datas = DB::select('SELECT * FROM vendor WHERE nama_vendor LIKE ? AND deleted = 0', ['%' . $searchTerm . '%']);
        } else {
            // Jika tidak ada search term, tampilkan semua data vendor
            $datas = DB::select('SELECT * FROM vendor WHERE deleted = 0');
        }
    
        return view('vendor.index')->with('datas', $datas)->with('searchTerm', $searchTerm);
    }
    
    //to show deleted data
    public function trash(Request $request)
    {
        $searchTerm = $request->input('search');
    
        // Query data vendor dengan filter berdasarkan nama jika search term ada
        if ($searchTerm) {
            $datas = DB::select('SELECT * FROM vendor WHERE nama_vendor LIKE ? AND deleted = 1', ['%' . $searchTerm . '%']);
        } else {
            // Jika tidak ada search term, tampilkan semua data vendor
            $datas = DB::select('SELECT * FROM vendor WHERE deleted = 1');
        }
    
        return view('vendor.trash')->with('datas', $datas)->with('searchTerm', $searchTerm);
    }

    public function create()
    {
        return view('vendor.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_vendor' => 'required',
            'nama_vendor' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'jenis' => 'required',
        ]);
        DB::insert(
            'INSERT INTO vendor(id_vendor,nama_vendor, telepon, alamat, jenis) VALUES (:id_vendor, :nama_vendor, :telepon, :alamat, :jenis)',
            [
                'id_vendor' => $request->id_vendor,
                'nama_vendor' => $request->nama_vendor,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'jenis' => $request->jenis,
            ]
        );
        return redirect()->route('vendor.index')->with('success', 'Data Vendor berhasil disimpan');
    }

    // public function edit a row from a table
    public function edit($id)
    {
        $data = DB::select("SELECT * FROM vendor WHERE id_vendor = $id");
        $data = $data[0];
        $datas = DB::select("SELECT * FROM vendor");
        return view('vendor.edit')->with('data', $data)->with('datas', $datas);
    }

     // public function to update the table value
    public function update($id, Request $request)
    {
        $request->validate([
            'nama_vendor' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'jenis' => 'required',
        ]);

        DB::update(
            'UPDATE vendor SET nama_vendor = :nama_vendor, telepon = :telepon, alamat = :alamat, jenis = :jenis WHERE id_vendor = :id',
            [
                'id' => $id,
                'nama_vendor' => $request->nama_vendor,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
                'jenis' => $request->jenis,
            ]
        );
        return redirect()->route('vendor.index')->with('success', 'Data Vendor berhasil diubah');
    }

    public function delete($id)
    {
        DB::update('UPDATE vendor SET deleted = 1 WHERE id_vendor = :id_vendor', ['id_vendor' => $id]);
        return redirect()->route('vendor.index')->with('success', 'Data Vendor berhasil dihapus');
    }

    public function restore($id)
    {
        DB::update('UPDATE vendor SET deleted = 0 WHERE id_vendor = :id_vendor', ['id_vendor' => $id]);
        return redirect()->route('vendor.trash')->with('success', 'Data Vendor berhasil dipulihkan');
    }

    public function remove($id)
    {
        DB::delete('DELETE FROM vendor WHERE id_vendor = :id_vendor', ['id_vendor' => $id]);
        return redirect()->route('vendor.trash')->with('success', 'Data Vendor berhasil dihapus permanen');
    }

}
