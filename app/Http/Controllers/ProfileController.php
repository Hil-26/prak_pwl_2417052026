<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class ProfileController extends Controller
{
    public function profile($name = "", $npm = "", $kelas = "")
    {
        $data = [
            'name' => $name,
            'npm' => $npm,
            'kelas' => $kelas
        ];
        return view('profile', $data);
    }
}
