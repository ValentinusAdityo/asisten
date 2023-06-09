<?php 

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return View('login/loginpage');
    }

    public function check()
    {
        $post = $this->request->getPost(['usr', 'pwd']);
        if ($post['usr'] == 'admin' && $post['pwd'] == '123'){
            $session = session();
            $session->set('pengguna', $post['usr']);
            return View('login/home');
        } else {
            return View('login/fail');
        }
    }

    public function home()
    {
        $session = session();
        if ($session->has('pengguna')){
            $item = $session->get('pengguna');
            if ($item == 'admin'){
                return View('login/home');
            } else {
                return View('login/loginpage');
            }
        } else {
            return View('login/loginpage');
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('pengguna');
        return View('login/loginpage');
    }
}
?>