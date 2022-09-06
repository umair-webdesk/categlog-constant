<?php 

namespace App\Libraries;
use App\Models\admin\UserModel;
use Config\Services;

class Admin
{
    public function __construct(){
        $this->session = Services::session();

        $this->admin_id = '';
        $this->username = '';
        $this->email = '';
        $this->role = '';
        $this->loggedIn = false;

        $this->_session_to_library();
    }

    public function _session_to_library()
    {
        try{
            $this->admin_id = $this->session->id;
            $this->username = $this->session->username;
            $this->email = $this->session->email;
           // $this->role = $this->session->role;
            $this->loggedIn = $this->session->loggedIn;
        }catch(Exception $e){
            exit($e->getMessage());
        }
    }

    public function login(){
        try {

            $users = new UserModel();
            $user = $users->where('username', $_POST['username'])->first();
        
            if (is_null($user) || !password_verify($_POST['password'], $user['password'])) {
                return false;
            }


            $this->session->set([
                'loggedIn' => true,
                'id' 	    => $user['id'],
                'username' 	=> $user['username'],
                'email'     => $user['email'],
               // 'role' => $user['role']
            ]);
            $this->_session_to_library();

            return true;
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }

    public function logout(){

        try {
            $this->session->set([
                'loggedIn'  => false,
                'id' 	    => '',
                'username' 	=> '',
                'email'     => '',
                'role' => ''
            ]);

            return true;
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }
}
    

?>