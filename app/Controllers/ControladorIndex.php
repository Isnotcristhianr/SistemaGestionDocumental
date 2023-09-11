<?php

namespace App\Controllers;

class ControladorIndex extends BaseController
{
    public function index()
    {
        try{

            return view('index.php');
        }catch (\Exception $e) {
            die($e->getMessage());
        }
        
    }
}
