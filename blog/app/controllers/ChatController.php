<?php

namespace MyApp\Controllers;

use Codeception\Lib\Di;
use Phalcon\Mvc\Controller;

class ChatController extends Controller
{
    public function indexAction()
    {
        $output = $this->mongo->msg->findOne();
        $this->view->data = json_encode($output['msg']);
    }
    public function addAction()
    {
        $uid = $this->cookies->get('login');
        $value = $uid->getValue();
        $collection = $this->mongo->Users;
        $data = $collection->findOne(["uid" => $value]);
        $msg[$value]['msg'] =$_POST['chat'];
        $msg = json_encode($msg);
        $this->mongo->msg->updateOne(
            ['_id' => new \MongoDB\BSON\ObjectID('649ac59df4f6e425bc09af73')],
            ['$push' => ['msg' => json_decode($msg)]]
        );
        $this->response->redirect('/chat/');
    
    }

}
