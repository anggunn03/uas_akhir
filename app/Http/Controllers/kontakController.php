<?php

namespace App\Http\Controllers;

use App\Models\kontak;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Return_;

class kontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)){
            $data = kontak::where('nohp', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('alamat', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        }else{
            $data = kontak::orderBy('nohp', 'desc')->paginate($jumlahbaris);
        }
        return view('kontak.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kontak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nohp',$request->nohp);
        Session::flash('nama',$request->nama);
        Session::flash('alamat',$request->alamat);
        $request->validate([
            'nohp'=>'required|numeric|unique:kontak,nohp',
            'nama'=>'required',
            'alamat'=>'required',
        ],[
            'nohp.required'=>'NoHp wajib diisi',
            'nohp.numeric'=>'NoHp wajib dalam angka',
            'nohp.unique'=>'NoHp yang diisikan sudah ada dalam database',
            'nama.required'=>'Nama wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
        ]);
        $data = [
            'nohp'=>$request->nohp,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
        ];
        kontak::create($data);
        return redirect()->to('kontak')->with('success','Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = kontak::where('nohp', $id)->first();
        return view('kontak.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ],[
            'nama.required' => 'Nama wajib diisi',
            'alamat.required' => 'Alamat wajib diisi'
        ]);
        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ];
        kontak::where('nohp', $id)->update($data);
        return redirect()->to('kontak')->with('success', 'Berhasil melakukan update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        kontak::where('nohp',$id)->delete();
        return redirect()->to('kontak')->with('success', 'Berhasil melakukan delete data');
    }
}
