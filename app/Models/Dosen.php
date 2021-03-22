<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dosen extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_dosen',
        'nip',
        'foto_dosen',
        'matkul',
    ];

    public function allData()
    {
        return DB::table('dosen')->get();
    }

    public function detailData($id)
    {
        return DB::table('dosen')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('dosen')->insert($data);
    }

    public function updateData($id, $data)
    {
        DB::table('dosen')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('dosen')
            ->where('id', $id)
            ->delete();
    }
}
