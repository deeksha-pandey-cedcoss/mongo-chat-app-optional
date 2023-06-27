<?php

namespace MyApp\Controllers;

use Phalcon\Mvc\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        // default action
        $output = $this->mongo->msg->find();
        echo "<pre>";
        foreach ($output as $value) {
         print_r($value);
        }
        $d = $this->mongo->Users->find();
        echo "<pre>";
        foreach ($d as $value) {
         print_r($value);
        }
        die;
        
    }
   
}
