<?php

namespace App\Controllers;

use App\Models\BengkelUpload;
use App\Models\ReviewModel;
use App\Models\ProfilModel;
use App\Models\OnlineModel;
use App\Models\BengkelUserModel;
use App\Models\BengkelVerifi;

class Pages extends BaseController
{
    protected $PesananModel;
    protected $ProfilModel;
    protected $model;
    protected $OnlineModel;
    protected $ReviewModel;
    protected $email;
    protected $active;

    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->OnlineModel = new OnlineModel();
        $this->ReviewModel = new ReviewModel();
        $this->model = new BengkelUpload();
        $this->email = \Config\Services::email();
        $this->active = new BengkelVerifi();
    }
    public function register()
    {
        $data = [
            'title' => 'Register'
        ];

        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'nama' => 'required|min_length[3]|max_length[20]',
                'alamat' => 'required',
                'kota' => 'required',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[bengkel.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password2' => 'matches[password]'
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new BengkelUserModel();
                $vkey = md5(time() . $this->request->getVar('namadepan'));

                $slug = url_title($this->request->getVar('nama'), '-', true);
                $newData = [
                    'nama' => $this->request->getVar('nama'),
                    'alamat' => $this->request->getVar('alamat'),
                    'slug' => $slug,
                    'kota' => $this->request->getVar('kota'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    'is_active' => $this->request->getVar('is_active'),
                    'vkey' => $vkey,
                ];

                $nam = $this->request->getVar('nama');
                $em = $this->request->getVar('email');
                $this->email->setFrom('infobengkel@info.in', 'noreply');
                $this->email->setTo($em);
                $this->email->setSubject('bengkelku.id : Registration');
                $this->email->setMessage('
                <h3>Hai ' . $nam . ' thank you for joining us</h3>
                <p>Please click active for activate your account : <a href="http://localhost:8080/bengkel/active?vkey=' . $vkey . '">Active</a></p>
                <hr>
                <p color="#474747">This is an automated email. Please do not reply to this email.</p>
                ');

                // /dd($newData);
                $model->save($newData);
                if (!$this->email->send()) {
                    $session = session();
                    $session->setFlashdata('danger', 'Gagal Mengirim');
                } else {
                    $session = session();
                    $session->setFlashdata('success', 'Registration Success, Please Activate Your Email');
                }
                return redirect()->to('/bengkel/login');
            }
        }

        return view('pages/register', $data);
    }

    public function active()
    {
        if (isset($_GET['vkey'])) {
            $vkey = $_GET['vkey'];
            $result = $this->active->getActive($vkey);

            if ($result->countAll() > 1) {
                $update = $this->active->setActive($vkey);

                if ($update) {
                    $session = session();
                    $session->setFlashdata('success', 'Your account has been verified. You may now login');
                    return redirect()->to('/bengkel/login');
                } else {
                    $session = session();
                    $session->setFlashdata('danger', 'Sorry something whent wrong');
                    return redirect()->to('/bengkel/login');
                }
            } else {
                $session = session();
                $session->setFlashdata('danger', 'This account invalid or already verified');
                return redirect()->to('/bengkel/login');
            }
        }
    }

    public function bengkelforget()
    {
        $data = [
            'title' => 'Forget Password',
        ];

        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {

                $vkey = md5(time() . $this->request->getVar('email'));

                $em = $this->request->getVar('email');
                $this->email->setFrom('infobengkel@info.in', 'noreply');
                $this->email->setTo($em);
                $this->email->setSubject('bengkelku.id : Forget Password');
                $this->email->setMessage('
                <h3>Have you forgotten your password</h3>
                <p>Please click forget for change new password : <a href="http://localhost:8080/bengkel/forget/change?vkey=' . $vkey . '">Forget</a></p>
                <hr>
                <p color="#474747">This is an automated email. Please do not reply to this email.</p>
                ');

                $this->active->setForget($vkey, $em);
                if (!$this->email->send()) {
                    $session = session();
                    $session->setFlashdata('danger', 'Gagal Mengirim');
                } else {
                    $session = session();
                    $session->setFlashdata('success', 'Registration Success, Please Activate Your Email');
                }
                return redirect()->to('/bengkel/login/forget/success');
            }
        }

        return view('pages/forget', $data);
    }

    public function bengkelchange()
    {
        if (isset($_GET['vkey'])) {
            $vkey = $_GET['vkey'];
            $data = [
                'title' => 'Change Password',
                'vkey' => $vkey
            ];

            $rules = [
                'password' => 'required|min_length[8]|max_length[255]',
                'password2' => 'matches[password]'
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $pass = $this->request->getVar('password');

                $passhash = password_hash($pass, PASSWORD_DEFAULT);
                $result = $this->active->getForget($vkey);

                if ($result->countAll() > 1) {
                    $update = $this->active->updateForget($passhash, $vkey);

                    if ($update) {
                        $session = session();
                        $session->setFlashdata('success', 'Password has been successfully changed');
                        return redirect()->to('/bengkel/login');
                    } else {
                        $session = session();
                        $session->setFlashdata('danger', 'Sorry something whent wrong');
                        return redirect()->to('/bengkel/login');
                    }
                }
            }

            return view('pages/change', $data);
        }
    }

    public function sforget()
    {
        $data = [
            'title' => 'Forget Password',
        ];

        return view('pages/sforget', $data);
    }

    public function login()
    {
        $data = [
            'title' => 'Login'
        ];

        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateBengkel[email,password]'
            ];

            $errors = [
                'password' => [
                    'validateBengkel' => 'Email or Password don\'t match'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new BengkelUserModel();

                $bengkeluser = $model->where('email', $this->request->getVar('email'))->first();
                $this->setUserSession($bengkeluser);

                return redirect()->to('/pages/isActive');
            }
        }

        return view('pages/login', $data);
    }

    public function isActive()
    {
        if (session()->get('is_active') == 1) {
            return redirect()->to('/bengkel');
        } else {
            session()->destroy();
            return redirect()->to('/pages/notActive');
        }
    }

    public function notActive()
    {
        $session = session();
        $session->setFlashdata('danger', 'Your account has not been verified');
        return redirect()->to('/bengkel/login');
    }

    private function setUserSession($bengkeluser)
    {
        $data = [
            'id_bengkel' => $bengkeluser['id_bengkel'],
            'nama' => $bengkeluser['nama'],
            'deskripsi' => $bengkeluser['deskripsi'],
            'buka' => $bengkeluser['buka'],
            'kota' => $bengkeluser['kota'],
            'alamat' => $bengkeluser['alamat'],
            'no_tlp' => $bengkeluser['no_telp'],
            'slug' => $bengkeluser['slug'],
            'email' => $bengkeluser['email'],
            'gambar' => $bengkeluser['gambar'],
            'gambar2' => $bengkeluser['gambar2'],
            'gambar3' => $bengkeluser['gambar3'],
            'gambar4' => $bengkeluser['gambar4'],
            'is_active' => $bengkeluser['is_active'],
            'bengkelLoggin' => true,
        ];

        session()->set($data);
        return true;
    }

    public function profil()
    {
        $data = [
            'title' => 'Profile',

        ];

        return view('Pages/Profil', $data);
    }

    public function update()
    {
        helper(['form']);

        $rules = [
            'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,2048]',
            'gambar2' => 'uploaded[gambar2]|mime_in[gambar2,image/jpg,image/jpeg=,image/png]|max_size[gambar2,2048]',
            'gambar3' => 'uploaded[gambar3]|mime_in[gambar3,image/jpg,image/jpeg,image/png]|max_size[gambar3,2048]',
            'gambar4' => 'uploaded[gambar4]|mime_in[gambar4,image/jpg,image/jpeg,image/png]|max_size[gambar4,2048]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
        } else {
            $gambar = $this->request->getFile('gambar');
            $gambar2 = $this->request->getFile('gambar2');
            $gambar3 = $this->request->getFile('gambar3');
            $gambar4 = $this->request->getFile('gambar4');

            $namaFile = $gambar->getRandomName();
            $namaFile2 = $gambar2->getRandomName();
            $namaFile3 = $gambar3->getRandomName();
            $namaFile4 = $gambar4->getRandomName();

            $gambar->move('assets/img', $namaFile);
            $gambar2->move('assets/img', $namaFile2);
            $gambar3->move('assets/img', $namaFile3);
            $gambar4->move('assets/img', $namaFile4);
            $file = [
                'id_bengkel' => session()->get('id_bengkel'),
                'email' => $this->request->getVar('email'),
                'gambar' => $namaFile,
                'gambar2' => $namaFile2,
                'gambar3' => $namaFile3,
                'gambar4' => $namaFile4,
            ];

            //dd($file);
            $this->model->save($file);
            $session = session();
            $session->setFlashdata('success', 'Successful Upload');

            $bengkeluser = $this->model->where('email', $this->request->getVar('email'))->first();
            $this->setUserSession($bengkeluser);
            return redirect()->to('/bengkel');
        }
    }

    public function save()
    {
        helper(['form']);
        $rules = [
            'nama' => 'max_length[20]',
            'number' => 'max_length[13]',
            'email' => 'max_length[50]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
        } else {
            $newData = [
                'id_bengkel' => session()->get('id_bengkel'),
                'email' => $this->request->getVar('email'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'no_telp' => $this->request->getVar('number'),
                'alamat' => $this->request->getVar('alamat'),
                'buka' => $this->request->getVar('buka'),
            ];

            //dd($newData);
            $this->model->save($newData);
            $session = session();
            $session->setFlashdata('success', 'Successful Upload');

            $user = $this->model->where('email', $this->request->getVar('email'))->first();
            $this->setUserSession($user);
            return redirect()->to('/bengkel');
        }
    }

    public function pesanan()
    {
        $data = [
            'title' => 'Daftar Pesanan',
            'pesan' => $this->OnlineModel->getOnline()
        ];
        return view('pages/pesanan', $data);
    }

    public function layanan()
    {
        $data = [
            'title' => 'Layanan Costumer'
        ];
        return view('pages/layanan', $data);
    }

    public function penilaian()
    {
        $data = [
            'title' => 'Penilaian',
            'coment' => $this->ReviewModel->getRiview()
        ];
        return view('pages/penilaian', $data);
    }


    public function detail($antrian)
    {
        $data = [
            'title' => 'Detail',
            'pesanan' => $this->PesananModel->getPesanan($antrian),
        ];
        return view('pages/detail', $data);
    }

    public function detailonline($id)
    {
        $data = [
            'title' => 'Detail',
            'pesan' => $this->OnlineModel->getOnline($id),
            'user' => $this->OnlineModel->getUser($id),
        ];
        return view('pages/detailonline', $data);
    }

    public function bengkellogout()
    {
        session()->destroy();
        return redirect()->to('/bengkel/login');
    }

    //--------------------------------------------------------------------
}
