<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pengguna',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Pengguna Baru',
            'kelas' => $this->kelasModel->getKelas(),
        ];
        return view('create_user', $data);
    }

    public function store(Request $request)
    {
        $this->userModel->create([
            'name'     => $request->input('name') ?? $request->input('nama'),
            'npm'      => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);

        return redirect()->to('/user')->with('success', 'Data user berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Edit Pengguna',
            'user'  => $user,
            'kelas' => $kelas,
        ];

        return view('edit_user', $data);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'npm'      => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
        ];

        if ($request->has('nama')) {
            $rules['nama'] = 'required|string|max:255';
        } else {
            $rules['name'] = 'required|string|max:255';
        }

        $request->validate($rules);

        $user = UserModel::findOrFail($id);
        $user->update([
            'name'     => $request->input('nama') ?? $request->input('name'),
            'npm'      => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);

        return redirect()->to('/user')->with('success', 'Data user berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->to('/user')->with('success', 'Data user berhasil dihapus!');
    }
}