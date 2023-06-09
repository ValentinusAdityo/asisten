<?php 

namespace App\Controllers;
class Biodata extends BaseController{
    public function index()
    {
        return view('templates2/header')
            . view('biodata/dataDiri')
            . view('templates2/footer');
            
    }
}