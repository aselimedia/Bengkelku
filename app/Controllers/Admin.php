<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\BengkelModel;
use App\Models\UserModel;
use App\Models\UserUpload;

class Admin extends BaseController
{
    protected $bengkelModel;
    protected $usersModel;

    public function __construct()
    {
        $this->bengkelModel = new BengkelModel();
        $this->usersModel = new UserUpload();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'jumlah' => $this->bengkelModel->getCount(),
            'juser' => $this->usersModel->getCountUs(),

        ];
        return view('admin/dashboard', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'Login'
        ];

        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'nama' => 'required|min_length[3]|max_length[50]',
                'password' => 'required|min_length[8]|max_length[255]|validateAdmin[nama,password]'
            ];

            $errors = [
                'password' => [
                    'validateAdmin' => 'Email or Password don\'t match'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $m = new AdminModel();

                $admin = $m->where('nama', $this->request->getVar('nama'))->first();
                $this->setUserSession($admin);

                $session = session();
                $session->setFlashdata('success', 'Loggin Success');
                return redirect()->to('/admin');
            }
        }
        return view('admin/loginadmin', $data);
    }

    private function setUserSession($admin)
    {
        $data = [
            'id_admin' => $admin['id_admin'],
            'nama' => $admin['nama'],
            'alamat' => $admin['alamat'],
            'email' => $admin['email'],
            'loggin' => true,
        ];

        session()->set($data);
        return true;
    }

    public function bengkel()
    {
        $bengkel = $this->bengkelModel->findAll();
        $data = [
            'title' => 'Daftar Bengkel',
            'bengkel' => $bengkel

        ];

        return view('admin/bengkel', $data);
    }

    public function users()
    {
        $this->usersModel->findAll();
        $data = [
            'title' => 'Daftar Users',
            'user' => $this->usersModel->getUsers()

        ];

        return view('admin/users', $data);
    }

    public function detail($slug)
    {

        $data = [
            'title' => 'Detail Bengkel',
            'bengkel' => $this->bengkelModel->getBengkel($slug)
        ];
        return view('admin/detail', $data);
    }

    public function delete($id)
    {
        $this->bengkelModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to('/admin/bengkel');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Bengkel',
            'validation' => \Config\Services::validation(),
            'bengkel' => $this->bengkelModel->getBengkel($slug)
        ];
        return view('admin/edit', $data);
    }

    public function update($id_bengkel)
    {
        $bengkelLama = $this->bengkelModel->getBengkel($this->request->getVar('slug'));
        if ($bengkelLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[bengkel.nama]';
        }

        if (!$this->validate([
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} Bengkel harus diisi',
                    'is_unique' => '{field} Bengkel sudah terdaftar'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/bengkel/edit/' . $this->request->getVar('slug'))->with('validation', $validation);
        }
        $slug = url_title($this->request->getVar('nama'), '-', true);
        $newData = [
            'id_bengkel' => $id_bengkel,
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'no_telp' => $this->request->getVar('no_telp'),
            'alamat' => $this->request->getVar('alamat'),
            'kota' => $this->request->getVar('kota'),

        ];
        //dd($newData);
        $this->bengkelModel->save($newData);
        $session = session();
        $session->setFlashdata('success', 'Updated Successful');
        return redirect()->to('/admin/bengkel');
    }

    public function customer($id)
    {
        $data = [
            'title' => 'Detail Users',
            'user' => $this->usersModel->getUser($id)
        ];
        return view('admin/usersdetail', $data);
    }

    public function deleteuser($id)
    {
        $this->usersModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/customer');
    }

    public function edituser($id)
    {
        $data = [
            'title' => 'Form Ubah Data Users',
            'validation' => \Config\Services::validation(),
            'user' => $this->usersModel->getUser($id)
        ];
        return view('admin/usersedit', $data);
    }

    public function editcustomer($id)
    {
        if (!$this->validate([
            'nama_depan' => [
                'errors' => [
                    'required' => '{field} Nama depan harus diisi',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/users/edit_users/' . $this->request->getVar('id'))->with('validation', $validation);
        }
        $newData = [
            'id' => $id,
            'nama_depan' => $this->request->getVar('nama_depan'),
            'nama_belakang' => $this->request->getVar('nama_belakang'),
            'number' => $this->request->getVar('number'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
        ];

        $this->usersModel->save($newData);
        $session = session();
        $session->setFlashdata('success', 'Updated Successful');
        return redirect()->to('/admin/customer');
    }

    public function visitor()
    {
        $data = [
            'title' => 'Visitor',
        ];

        return view('admin/visitor', $data);
    }

    public function adminlogout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
    //--------------------------------------------------------------------

}
