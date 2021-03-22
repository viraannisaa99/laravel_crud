<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'nama_kampus'=>'SM University',
            'alamat'     =>'South Korean'
        ];
        return view('v_home', $data);
    }
}
