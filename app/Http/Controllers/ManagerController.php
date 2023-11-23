<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    //
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
    
        // Query data manager dengan filter berdasarkan nama jika search term ada
        if ($searchTerm) {
            $datas = DB::select('SELECT * FROM manager WHERE nama_manager LIKE ? AND deleted = 0', ['%' . $searchTerm . '%']);
        } else {
            // Jika tidak ada search term, tampilkan semua data manager
            $datas = DB::select('SELECT * FROM manager WHERE deleted = 0');
        }
    
        return view('manager.index')->with('datas', $datas)->with('searchTerm', $searchTerm);
    }
    
    //to show deleted data
    public function trash(Request $request)
    {
        $searchTerm = $request->input('search');
    
        // Query data manager dengan filter berdasarkan nama jika search term ada
        if ($searchTerm) {
            $datas = DB::select('SELECT * FROM manager WHERE nama_manager LIKE ? AND deleted = 1', ['%' . $searchTerm . '%']);
        } else {
            // Jika tidak ada search term, tampilkan semua data manager
            $datas = DB::select('SELECT * FROM manager WHERE deleted = 1');
        }
    
        return view('manager.trash')->with('datas', $datas)->with('searchTerm', $searchTerm);
    }

    public function create()
    {
        return view('manager.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_manager' => 'required',
            'nama_manager' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);
        DB::insert(
            'INSERT INTO manager(id_manager,nama_manager, telepon, alamat) VALUES (:id_manager, :nama_manager, :telepon, :alamat)',
            [
                'id_manager' => $request->id_manager,
                'nama_manager' => $request->nama_manager,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
            ]
        );
        return redirect()->route('manager.index')->with('success', 'Data Manager berhasil disimpan');
    }

    // public function edit a row from a table
    public function edit($id)
    {
        $data = DB::select("SELECT * FROM manager WHERE id_manager = $id");
        $data = $data[0];
        $datas = DB::select("SELECT * FROM manager");
        return view('manager.edit')->with('data', $data)->with('datas', $datas);
    }

     // public function to update the table value
    public function update($id, Request $request)
    {
        $request->validate([
            'nama_manager' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        DB::update(
            'UPDATE manager SET nama_manager = :nama_manager, telepon = :telepon, alamat = :alamat WHERE id_manager = :id',
            [
                'id' => $id,
                'nama_manager' => $request->nama_manager,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
            ]
        );
        return redirect()->route('manager.index')->with('success', 'Data Manager berhasil diubah');
    }

    public function delete($id)
    {
        DB::update('UPDATE manager SET deleted = 1 WHERE id_manager = :id_manager', ['id_manager' => $id]);
        return redirect()->route('manager.index')->with('success', 'Data Manager berhasil dihapus');
    }

    public function restore($id)
    {
        DB::update('UPDATE manager SET deleted = 0 WHERE id_manager = :id_manager', ['id_manager' => $id]);
        return redirect()->route('manager.index')->with('success', 'Data Manager berhasil dipulihkan');
    }

    public function remove($id)
    {
        DB::delete('DELETE FROM manager WHERE id_manager = :id_manager', ['id_manager' => $id]);
        return redirect()->route('manager.trash')->with('success', 'Data Manager berhasil dihapus permanen');
    }

}
