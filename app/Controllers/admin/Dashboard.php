<?php
namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $data = [];

    public function index()
    {   
        
        $this->data['page_title'] = 'Dashboard';
        return view('admin/comman/header',$this->data)
        . view('admin/comman/leftmenu')
        . view('admin/dashboard')
        . view('admin/comman/footer');
    }
}
