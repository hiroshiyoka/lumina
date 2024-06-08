<?php

    namespace App\Controllers;
    use App\Entities\Users;
    use App\Models\UserModel;
    
    class Auth extends BaseController {
        protected $validation;
        public function __construct() {
            helper('form');
            $this -> validation = \Config\Services::validation();
            $this -> session = \Config\Services::session();
        }

        public function register() {
            if ($this -> request -> getPost()) {
                $data = $this -> request -> getPost();
                $validate = $this -> validation -> run($data, 'register');
                $errors = $this -> validation -> getErrors();

                if (!$errors) {
                    $userModel = new UserModel();

                    $users = new Users();

                    $users -> username = $this -> request -> getPost('username');
                    $users -> password = $this -> request -> getPost('password');

                    $users -> created_by = 0;
                    $users -> created_date = date("Y-m-d H:i:s");

                    $userModel -> save($users);

                    return view('login');
                }

                $this -> session -> setFlashdata('errors', $errors);
            }

            return view('register');
        }

        public function login() {
            if ($this -> request -> getPost()) {
                $data = $this -> request -> getPost();
                $validate = $this -> validation -> run($data, 'login');
                $errors = $this -> validation -> getErrors();

                if ($errors) {
                    return view('login');
                }

                $userModel = new UserModel();

                $username = $this -> request -> getPost('username');
                $password = $this -> request -> getPost('password');

                $user = $userModel -> where('username', $username) -> first();

                if ($user) {
                    $salt = $user -> salt;

                    if ($user -> password !== md5($salt.$password)) {
                        $this -> session -> setFlashdata('errors', ['Password yang Anda masukkan salah!']);
                    } else {
                        $sessionData = [
                            'username' => $user -> username,
                            'id' => $user -> id,
                            'role' => $user -> role,
                            'isLoggedIn' => TRUE,
                        ];

                        $this -> session -> set($sessionData);

                        return redirect() -> to(site_url('/'));
                    }
                } else {
                    $this -> session -> setFlashdata('errors', ['Username yang Anda masukkan tidak ditemukan!']);
                }
            }

            return view('login');
        }

        public function logout() {
            $this -> session -> destroy();

            return redirect() -> to(site_url('auth/login'));
        }
    }