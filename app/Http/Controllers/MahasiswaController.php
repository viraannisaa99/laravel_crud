<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->Mahasiswa = new Mahasiswa();
    }

    public function index()
    {
        $data = [
            'mahasiswa' => $this->Mahasiswa->allData()

        ];
        return view('v_mhs', $data);
    }

    public function create() //add
    {
       return view('v_create_mhs');
    } 

    public function store(Request $request)
    {
        $request->validate([
            'nama_mhs'  => 'required',
            'nim'       => 'required|unique:mahasiswa|min:10|max:11',
            'foto_mhs'  => 'required|mimes:jpg,bmp,png|max:1024'
        ], [
            'nama_mhs.required' => 'Nama wajib diisi!',
            'nim.required'      => 'NIM wajib diisi!',
            'nim.unique'        => 'NIM sudah terdaftar',
            'nim.min'           => 'NIM minimal 10 karakter',
            'nim.max'           => 'NIM maksimal 11 karakter',
            'foto_mhs.required' => 'Foto wajib diisi!'
        ]);

        //jika validasi tidak ada, maka simpan data

        //upload gambar
        $file = Request()->foto_mhs;
        $fileName = Request()->nim .'.'. $file->extension();
        $file->move(public_path('foto_mhs'), $fileName);
        
        $data = [
            'nama_mhs' => Request()->nama_mhs,
            'nim'      => Request()->nim,
            'foto_mhs' => $fileName,
        ];

        $this->Mahasiswa->addData($data);
        return redirect()->route('mhs')->with('pesan', 'Data Berhasil Ditambahkan');
    } 

    public function show($id)
    {
        if(!$this->Mahasiswa->detailData($id)){
            abort(404);
        }

        $data = [
            'mahasiswa' => $this->Mahasiswa->detailData($id)
        ];
        return view('v_detail_mhs', $data);
    }

    public function edit($id)
    {
        if(!$this->Mahasiswa->detailData($id)){
            abort(404);
        }
        $data = [
            'mahasiswa' => $this->Mahasiswa->detailData($id)
        ];
        return view('v_edit_mhs', $data);
    } 

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mhs'  => 'required',
            'nim'       => 'required|min:10|max:11',
            'foto_mhs'  => 'mimes:jpg,bmp,png|max:1024'
        ], [
            'nama_mhs.required' => 'Nama wajib diisi!',
            'nim.required'      => 'NIM wajib diisi!',
            'nim.min'           => 'NIM minimal 10 karakter',
            'nim.max'           => 'NIM maksimal 11 karakter',
        ]);

        //jika validasi tidak ada, maka simpan data

        if(Request()->foto_mhs <> ""){
            //upload gambar
            $file = Request()->foto_mhs;
            $fileName = Request()->nim . '.' . $file->extension();
            $file->move(public_path('foto_mhs'), $fileName);

            $data = [
                'nama_mhs' => Request()->nama_mhs,
                'nim'      => Request()->nim,
                'foto_mhs' => $fileName,
            ];
            $this->Mahasiswa->updateData($id, $data);

        }else{
            //without photo update
            $data = [
                'nama_mhs' => Request()->nama_mhs,
                'nim'      => Request()->nim,
            ];
            $this->Mahasiswa->updateData($id, $data);
        }

        return redirect()->route('mhs')->with('pesan', 'Data Berhasil Diubah');
    } 

    public function destroy($id)
    {
        //hapus foto
        $mhs = $this->Mahasiswa->detailData($id);
        if($mhs->foto_mhs <> ""){
            unlink(public_path('foto_mhs') . '/' . $mhs->foto_mhs);
        }

        $this->Mahasiswa->deleteData($id);
        return redirect()->route('mhs')->with('pesan', 'Data Berhasil Dihapus');
    } 
}
