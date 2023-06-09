<?php

namespace App\Controllers;

use \App\Models\AsistenModel;
use CodeIgniter\Controller;

class AsistenController extends BaseController
{

    protected $AsistenModel;
    public function __construct()
    {
        $this->AsistenModel = new AsistenModel();
    }

    public function index()
    {
        return view('asisten/loginpage');
    }

    public function tampil()
    {
        $session = session();
        if ($session->has('pengguna')) {
            $modelA = model(AsistenModel::class);
            $data = ['list' => $modelA->getAsisten()];

            return view('asisten/AsistenView', $data);
        } else {
            return view('/asisten/fail');
        }
    }

    public function simpan()
    {
        $session = session();
        if ($session->has('pengguna')) {

            helper('form');
            // Memeriksa apakah melakukan submit data atau tidak.
            if (!$this->request->is('post')) {
                return view('/asisten/simpan');
            }
            // Mengambil data yang disubmit dari form
            $post = $this->request->getPost([
                'nim', 'nama', "praktikum",
                "ipk"
            ]);
            // Mengakses Model untuk menyimpan data
            $model = model(AsistenModel::class);
            $model->simpan($post);
            return view('/asisten/success');
        } else {
            return view('/asisten/fail');
        }
    }

    public function update()
    {
        $session = session();
        if ($session->has('pengguna')) {

            $db = \Config\Database::connect();
            $Builder = $db->table('asisten');

            helper('form');
            if (!$this->request->is('post')) {
                return view('/asisten/update');
            }
            $data = [
                'nama' => [$this->request->getPost('nama')],
                'praktikum' => [$this->request->getPost('praktikum')],
                'ipk' => [$this->request->getPost('ipk')],
            ];
            $Builder->where('nim', $this->request->getPost('nim'));
            $Builder->update($data);
            return view('/asisten/success');
        } else {
            return view('/asisten/fail');
        }
    }

    public function delete()
    {
        $session = session();
        if ($session->has('pengguna')) {

            $db = \Config\Database::connect();
            $Builder = $db->table('asisten');

            helper('form');
            if (!$this->request->is('post')) {
                return view('/asisten/delete');
            }

            $nim = $this->request->getPost('nim');

            $result = $Builder->getWhere(['nim' => $nim])->getResult();
            if (count($result) == 0) {
                return "NIM tidak ditemukan.";
            }
            $Builder->where('nim', $nim);
            $Builder->delete();
            return view('/asisten/success');
        } else {
            return view('/asisten/fail');
        }
    }

    public function search()
    {
        $session = session();
        if ($session->has('pengguna')) {

            if (!$this->request->is('post')) {
                return view('/asisten/search');
            }

            $nim = $this->request->getPost(['key']); //mengambil attribut yang diambil dari form

            $model = model(AsistenModel::class);
            $asisten = $model->ambil($nim['key']);

            $data = ['hasil' => $asisten];
            return view('asisten/search', $data);
        } else {
            return view('/asisten/fail');
        }
    }

    public function check()
    {
        $modelA = model(AsistenModel::class);
        $data = ['list' => $modelA->getAsisten()];

        $model = model(LoginModel::class);
        $post = $this->request->getPost(['usr', 'pwd']);
        $user = $model->where('Username', $post['usr'])->first();
        $pass = $model->where('Password', $post['pwd'])->first();

        if ($user && $pass) {
            $session = session();
            $session->set('pengguna', $post['usr']);
            return view('asisten/AsistenView', $data);
        } else {
            return view('/asisten/fail');
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('pengguna');
        return View('asisten/loginpage');
    }
}
