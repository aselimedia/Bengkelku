<?php

namespace App\Controllers;

use App\Models\BengkelModel;
use App\Models\UserModel;
use App\Models\UserReview;
use App\Models\UserUpload;
use App\Models\UserPesan;
use App\Models\UserVerifi;
use Config\App;

class Users extends BaseController
{
    protected $model;
    protected $bengkelModel;
    protected $reviewBengkel;
    protected $userPesan;
    protected $email;
    protected $active;

    public function __construct()
    {
        $this->model = new UserUpload();
        $this->bengkelModel = new BengkelModel();
        $this->reviewBengkel = new UserReview();
        $this->userPesan = new UserPesan();
        $this->email = \Config\Services::email();
        $this->active = new UserVerifi();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $bengkel = $this->bengkelModel->search($keyword);
        } else {
            $bengkel = $this->bengkelModel;
        }
        $data = [
            'title' => 'bengkelku.id',
            'bengkel' => $bengkel->paginate(50, 'bengkel'),
            'pager' => $this->bengkelModel->pager,
            'rating' => $this->reviewBengkel->getRating(),
        ];

        return view('users/home', $data);
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
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]'
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password don\'t match'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))->first();
                $this->setUserSession($user);

                return redirect()->to('/users/isActive');
            }
        }

        return view('users/login', $data);
    }

    public function isActive()
    {
        if (session()->get('is_active') == 1) {
            return redirect()->to('/');
        } else {
            session()->destroy();
            return redirect()->to('/users/notActive');
        }
    }

    public function notActive()
    {
        $session = session();
        $session->setFlashdata('danger', 'Your account has not been verified');
        return redirect()->to('/login');
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'namadepan' => $user['nama_depan'],
            'namabelakang' => $user['nama_belakang'],
            'number' => $user['number'],
            'alamat' => $user['alamat'],
            'email' => $user['email'],
            'is_active' => $user['is_active'],
            'picture' => $user['picture'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function register()
    {
        $data = [
            'title' => 'Register'
        ];

        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'namadepan' => 'required|min_length[3]|max_length[20]',
                'namabelakang' => 'required|min_length[3]|max_length[20]',
                'number' => 'required|min_length[10]|max_length[13]',
                'alamat' => 'required',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password2' => 'matches[password]'
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();

                $vkey = md5(time() . $this->request->getVar('namadepan'));

                $newData = [
                    'nama_depan' => $this->request->getVar('namadepan'),
                    'nama_belakang' => $this->request->getVar('namabelakang'),
                    'number' => $this->request->getVar('number'),
                    'alamat' => $this->request->getVar('alamat'),
                    'is_active' => $this->request->getVar('is_active'),
                    'vkey' => $vkey,
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];

                $nam = $this->request->getVar('namadepan');
                $em = $this->request->getVar('email');
                $this->email->setFrom('infobengkel@info.in', 'noreply');
                $this->email->setTo($em);
                $this->email->setSubject('bengkelku.id');
                $this->email->setMessage('
                <h3>Hai ' . $nam . ' thank you for joining us</h3>
                <p>Please click active for activate your account : <a href="http://localhost:8080/active?vkey=' . $vkey . '">Active</a></p>
                <hr>
                <p color="#474747">This is an automated email. Please do not reply to this email.</p>
                ');

                //dd($newData);
                $model->save($newData);
                if (!$this->email->send()) {
                    $session = session();
                    $session->setFlashdata('danger', 'Gagal Mengirim');
                } else {
                    $session = session();
                    $session->setFlashdata('success', 'Registration Success, Please Activate Your Email');
                }
                return redirect()->to('/login');
            }
        }

        return view('users/register', $data);
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
                    return redirect()->to('/login');
                } else {
                    $session = session();
                    $session->setFlashdata('danger', 'Sorry something whent wrong');
                    return redirect()->to('/login');
                }
            } else {
                $session = session();
                $session->setFlashdata('danger', 'This account invalid or already verified');
                return redirect()->to('/login');
            }
        }
    }

    public function forget()
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
                <p>Please click forget for change new password : <a href="http://localhost:8080/forget/change?vkey=' . $vkey . '">Forget</a></p>
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
                return redirect()->to('/login/forget/success');
            }
        }

        return view('users/forget', $data);
    }

    public function change()
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
                        return redirect()->to('/login');
                    } else {
                        $session = session();
                        $session->setFlashdata('danger', 'Sorry something whent wrong');
                        return redirect()->to('/login');
                    }
                }
            }

            return view('users/change', $data);
        }
    }

    public function sforget()
    {
        $data = [
            'title' => 'Forget Password',
        ];

        return view('users/sforget', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile',

        ];

        return view('users/profile', $data);
    }

    public function update()
    {
        helper(['form']);

        $rules = [
            'fileupload' => 'uploaded[fileupload]|mime_in[fileupload,image/jpg,image/jpeg,image/gif,image/png]|max_size[fileupload,2048]'
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
        } else {
            $newData = $this->request->getFile('fileupload');

            $namaFile = $newData->getRandomName();
            $newData->move('assets/img', $namaFile);
            $file = [
                'id' => session()->get('id'),
                'email' => $this->request->getVar('email'),
                'picture' => $namaFile
            ];

            $this->model->save($file);
            $session = session();
            $session->setFlashdata('success', 'Successful Upload');

            $user = $this->model->where('email', $this->request->getVar('email'))->first();
            $this->setUserSession($user);
            return redirect()->to('/profile');
        }
    }

    public function save()
    {
        helper(['form']);
        $rules = [
            'namadepan' => 'max_length[20]',
            'namabelakang' => 'max_length[20]',
            'number' => 'max_length[13]',
            'email' => 'max_length[50]',
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
        } else {
            $newData = [
                'id' => session()->get('id'),
                'nama_depan' => $this->request->getVar('namadepan'),
                'nama_belakang' => $this->request->getVar('namabelakang'),
                'number' => $this->request->getVar('number'),
                'alamat' => $this->request->getVar('alamat'),
                'email' => $this->request->getVar('email'),
            ];

            $this->model->save($newData);
            $session = session();
            $session->setFlashdata('success', 'Successful Upload');

            $user = $this->model->where('email', $this->request->getVar('email'))->first();
            $this->setUserSession($user);
            return redirect()->to('/profile');
        }
    }

    public function detail($slug)
    {
        $rating = $this->reviewBengkel->getRating($slug);
        $data = [
            'title' => 'Detail',
            'bengkel' => $this->bengkelModel->getBengkel($slug),
            'review' => $this->reviewBengkel->get_Review($slug),
            'rev' => $this->reviewBengkel->get_Review($slug),
            'pesan' => $this->userPesan->getAntrian($slug),
            'cek' => $this->userPesan->cekAntrian($slug),
            'rating' => $rating,
        ];

        return view('users/detail', $data);
    }

    public function review($slug)
    {
        $data = [
            'title' => 'Review',
            'bengkel' => $this->bengkelModel->getBengkel($slug),
            'pesan' => $this->userPesan->getAntrian($slug),
        ];

        return view('users/review', $data);
    }

    public function ulasan()
    {
        helper(['form']);
        $newData = [
            'id_pesan' => $this->request->getVar('idpesan'),
            'rating' => $this->request->getVar('rating'),
            'komentar' => $this->request->getVar('ulasan'),
        ];

        //dd($newData);
        $this->reviewBengkel->save($newData);
        $session = session();
        $session->setFlashdata('success', 'Ulasan Telah Ditambahkan');
        return redirect()->to('/');
    }

    public function pesan()
    {
        helper(['form']);

        $antrian = $this->request->getVar('antrian');

        if ($antrian == 'selesai' || $antrian == null) {
            $isi = 1;
        } else {
            $isi = $antrian + 1;
        }

        $newData = [
            'id_bengkel' => $this->request->getVar('idbengkel'),
            'id' => $this->request->getVar('iduser'),
            'status' => $this->request->getVar('status'),
            'antrian' => $isi,
        ];

        $this->userPesan->save($newData);
        $session = session();
        $session->setFlashdata('success', 'Berhasil Memesan');
        return redirect()->to('/');
    }

    public function pemesanan($slug)
    {
        $data = [
            'title' => 'Pemesanan',
            'bengkel' => $this->bengkelModel->getBengkel($slug),
            'pesan' => $this->userPesan->getAntrian($slug),
            'cek' => $this->userPesan->cekAntrian($slug),
        ];

        return view('users/pesanan', $data);
    }

    public function selesai($id)
    {
        helper(['form']);
        $complated = 'completed';
        if ($complated) {
            $a = 'selesai';
        }
        $newData = [
            'id_pesan' => $id,
            'status' => $complated,
            'antrian' => $a,
        ];

        //dd($newData);
        $this->userPesan->updateStatus($newData, $id);
        $session = session();
        $session->setFlashdata('success', 'Sevice Telah Selesai');
        return redirect()->to('/');
    }

    public function canceled($id)
    {
        helper(['form']);
        $cancel = 'canceled';
        if ($cancel) {
            $a = 'batal';
        }
        $newData = [
            'id_pesan' => $id,
            'status' => $cancel,
        ];

        // dd($newData, $id);
        $this->userPesan->updateStatus($newData, $id);
        $session = session();
        $session->setFlashdata('success', 'Sevice Telah Dibatalkan');
        return redirect()->to('/');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    //--------------------------------------------------------------------

}
