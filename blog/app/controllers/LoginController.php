<?php

namespace MyApp\Controllers;

use Phalcon\Mvc\Controller;

session_start();
class LoginController extends Controller
{
    public function indexAction()
    {

        //  default
    }
    public function loginAction()
    {
        if ($this->request->isPost()) {
            $email = $this->request->getPost('email');
            $pass = $this->request->getPost("password");

            $collection = $this->mongo->Users;
            $data = $collection->findOne(["email" => $email, "password" => $pass]);
            $admin = $data['role'];
            $name = $data['name'];
            if ($admin) {
                if ($admin == "admin") {
                    setcookie("login", $data->uid, time() + 84000, "/");
                    $this->response->redirect("admin");
                } else {
                    setcookie("login", $data->uid, time() + 84000, "/");
                    $this->response->redirect('/chat/');
                }
            } else {

                $this->response->redirect('login');
            }
        }
    }
    public function logoutAction()
    {
        setcookie("login", "", time() - 84000, "/");
        $this->response->redirect("/login/");
    }
}
