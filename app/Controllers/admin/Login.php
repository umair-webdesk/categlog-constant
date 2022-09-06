<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use Config\Services;

class Login extends BaseController
{
    protected $data = [];
    protected $session;

    public function __construct(){
        $this->session = Services::session();
        $this->data['page_title'] = 'Login';
        helper(['form','url']);
        
    }

    public function index()
    {
        try{

            if($this->admin->loggedIn){
                return redirect()->to('admin/dashboard');
            }
            return view('admin/login',$this->data);

        }catch(Exception $e){
            exit($e->getMessage());
        }
    }

    public function verify(){
        try{
            $rules = [
                'username'  => 'required',
                'password' 	=> 'required',
            ];

            if (!$this->validate($rules)) {
                $this->data['validation'] = $this->validator;
                return view('admin/login',$this->data);
            }
            
            if(!$this->admin->login()){
                return redirect()->to('/')->withInput()->with('error', 'Invalid username or password!');
            }

            // Activity Log
            $message = $this->admin->username.' has login to the system.';
            $type = "Login";
            //activity_logs($message,$type,$this->request->getIPAddress());

            return redirect()->to('admin/dashboard');
        }catch(Exception $e){
            exit($e->getMessage());
        }
    }

    public function logout(){

        try{
            $message = $this->admin->username.' has logout to the system.';
            $type = "Logout";
            //activity_logs($message,$type,$this->request->getIPAddress());

            $this->admin->logout();
            return redirect()->to('/');
        }catch(Exception $e){
            exit($e->getMessage());
        }
    }
}
