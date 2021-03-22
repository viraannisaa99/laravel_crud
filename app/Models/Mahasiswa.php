<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_mhs',
        'nim',
        'foto_mhs',
    ];

    public function allData()
    {
        return DB::table('mahasiswa')->get();
    }

    public function detailData($id)
    {
        return DB::table('mahasiswa')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('mahasiswa')->insert($data);
    }

    public function updateData($id, $data)
    {
        DB::table('mahasiswa')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('mahasiswa')
            ->where('id', $id)
            ->delete();
    }
}
