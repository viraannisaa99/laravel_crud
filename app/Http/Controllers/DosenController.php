<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function __construct()
    {
        $this->Dosen = new Dosen();
    }

    public function index()
    {
        $data = [
            'dosen' => $this->Dosen->allData()

        ];
        return view('/dosen/v_dosen', $data);
    }

    public function create() //add
    {
        return view('/dosen/v_create_dosen');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dosen'  => 'required',
            'nip'         => 'required|unique:dosen|min:10|max:11',
            'matkul'      => 'required',
            'foto_dosen'  => 'required|mimes:jpg,bmp,png|max:1024'
        ], [
            'nama_dosen.required' => 'Nama wajib diisi!',
            'nip.required'      => 'NIP wajib diisi!',
            'nip.unique'        => 'NIP sudah terdaftar',
            'nip.min'           => 'NIP minimal 10 karakter',
            'nip.max'           => 'NIP maksimal 11 karakter',
            'matkul'            => 'Matkul wajib diisi!',
            'foto_dosen.required' => 'Foto wajib diisi!'
        ]);

        //jika validasi tidak ada, maka simpan data

        //upload gambar
        $file = Request()->foto_dosen;
        $fileName = Request()->nip . '.' . $file->extension();
        $file->move(public_path('foto_dosen'), $fileName);

        $data = [
            'nama_dosen' => Request()->nama_dosen,
            'nip'        => Request()->nip,
            'matkul'     => Request()->matkul,
            'foto_dosen' => $fileName,
        ];

        $this->Dosen->addData($data);
        return redirect()->route('dosen')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function show($id)
    {
        if (!$this->Dosen->detailData($id)) {
            abort(404);
        }

        $data = [
            'dosen' => $this->Dosen->detailData($id)
        ];
        return view('/dosen/v_detail_dosen', $data);
    }

    public function edit($id)
    {
        if (!$this->Dosen->detailData($id)) {
            abort(404);
        }
        $data = [
            'dosen' => $this->Dosen->detailData($id)
        ];
        return view('/dosen/v_edit_dosen', $data);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nama_dosen'  => 'required',
            'nip'         => 'required|min:10|max:11',
            'matkul'      => 'required',
            'foto_dosen'  => 'required|mimes:jpg,bmp,png|max:1024'
        ], [
            'nama_dosen.required' => 'Nama wajib diisi!',
            'nip.required'      => 'NIP wajib diisi!',
            'nip.min'           => 'NIP minimal 10 karakter',
            'nip.max'           => 'NIP maksimal 11 karakter',
            'matkul'            => 'Matkul wajib diisi!',
        ]);

        //jika validasi tidak ada, maka simpan data

        if (Request()->foto_dosen <> "") {
            //upload gambar
            $file = Request()->foto_dosen;
            $fileName = Request()->nip . '.' . $file->extension();
            $file->move(public_path('foto_dosen'), $fileName);

            $data = [
                'nama_dosen' => Request()->nama_dosen,
                'nip'        => Request()->nip,
                'matkul'     => Request()->matkul,
                'foto_dosen' => $fileName,
            ];
            $this->Dosen->updateData($id, $data);
        } else {
            //without photo update
            $data = [
                'nama_dosen' => Request()->nama_dosen,
                'nip'        => Request()->nip,
                'matkul'     => Request()->matkul,
            ];
            $this->Dosen->updateData($id, $data);
        }

        return redirect()->route('dosen')->with('pesan', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        //hapus foto
        $dosen = $this->Dosen->detailData($id);
        if ($dosen->foto_dosen <> "") {
            unlink(public_path('foto_dosen') . '/' . $dosen->foto_dosen);
        }

        $this->Dosen->deleteData($id);
        return redirect()->route('dosen')->with('pesan', 'Data Berhasil Dihapus');
    }
}
