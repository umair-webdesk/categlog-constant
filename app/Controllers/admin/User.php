<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\admin\UserModel;
use App\Models\admin\LogModel;

class User extends BaseController
{
    protected $data = [];
    protected $user;
    protected $log;

    public function __construct(){
        $this->user = new UserModel();
        $this->log = new LogModel();
        $this->data['page_title'] = 'User Management';
    }

    public function index()
    {
        try{
            
            return view('admin/comman/header',$this->data)
            . view('admin/comman/leftmenu')
            . view('admin/user_management/index')
            . view('admin/comman/footer');

        }catch(Exception $e){
            exit($e->getMessage());
        }
    }


    public function datatable(){
        try{
            $requestData = $_REQUEST;
            $requestData['sort']['field'] = 'id';

            $sql = "SELECT * ";
            $sql.=" FROM users";
            
            if( !empty($requestData['query']['generalSearch']) ) { 

                $sql.=" WHERE ( id LIKE '%".$requestData['query']['generalSearch']."%' ";
                $sql.=" OR username LIKE '%".$requestData['query']['generalSearch']."%' ";
                $sql.=" OR name LIKE '%".$requestData['query']['generalSearch']."%' ";
                $sql.=" OR email LIKE '%".$requestData['query']['generalSearch']."%'";
                $sql.=" OR created_at LIKE '%".$requestData['query']['generalSearch']."%' )";
            }
            if( !empty($requestData['query']['status']) ) { 
                if($requestData['query']['status']==2){
                    $requestData['query']['status']=0;
                }
                $sql.=" WHERE status = '".$requestData['query']['status']."' ";
            }
            

            $totalFiltered = $this->user->query($sql)->getNumRows();
            
            if(!empty($requestData['sort'])) {
                $sql.= " ORDER BY ".$requestData['sort']['field']." DESC";
            }

            if( !empty($requestData['pagination']) ) { 
            
                $page = $requestData['pagination']['page'];
                $perpage = $requestData['pagination']['perpage'];
                $pages = ceil($totalFiltered / $perpage);

                if($pages < $page){
                    $start_from = 0;
                }else{
                    $start_from = ($page - 1) * $perpage; 
                }

                $sql.= " LIMIT ".$start_from." ,".$perpage;
            }

            $query = $this->user->query($sql);

            $data = [];
            $i = 1;
            foreach($query->getResult() as $user){

                $edit = '';
                $delete = '';
                $status = '';

                    $edit = '<a href="'.base_url().'/admin/user/edit/'.$user->id.'" title="Edit User" class="btn btn-outline-info btn-elevate btn-pill btn-sm"><i class="flaticon-edit-1"></i>Edit</a>';

                    $deleteOrNot = $this->checkUserLoginOrNot($user->username);
                    if($deleteOrNot){
                        $delete = '<button type="button" title="Delete User" class="btn btn-outline-danger btn-elevate btn-pill btn-sm" onclick="javascript: deleteUser(document.form_userlist,'.$user->id.',\''.$user->username.'\');" ><i class="flaticon-delete"></i>Delete</button>';
                    }

                    $status = $user->status == '0' ? '<span><span onClick="javascript: changeStatus(document.form_userlist,'.$user->id.',1,\''.$user->username.'\');" title="Change Status" class="kt-cursor kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Inactive</span></span>' : '<span><span onClick="javascript: changeStatus(document.form_userlist,'.$user->id.',0,\''.$user->username.'\');" title="Change Status" class="kt-cursor kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Active</span></span>';

                $data['data'][$i]['id'] = $i;
                $data['data'][$i]['username'] = $user->username;
                $data['data'][$i]['email'] = $user->email;
                $data['data'][$i]['status'] = $status;
                $data['data'][$i]['action'] = $edit.$delete;
                $i++;
            }
            
            $data['meta']['sort'] = $requestData['sort']['sort'];
            $data['meta']['page'] = $page;
            $data['meta']['perpage'] = $perpage;
            $data['meta']['pages'] = $pages;
            $data['meta']['total'] = $totalFiltered;

            return $this->response->setJson($data,true);
        }catch(Exception $e){
            exit($e->getMessage());
        }
    }

    public function add()
    {

        $this->data['action'] = 'Add';
        return view('admin/comman/header',$this->data)
        . view('admin/comman/leftmenu')
        . view('admin/user_management/addedit',$this->data)
        . view('admin/comman/footer');
    }

    public function insert()
    {
        try{

            $rules = [
                "username" => [
                    "label" => "Username", 
                    "rules" => "required|is_unique[users.username]"
                ],
                "firstname" => [
                    "label" => "First Name", 
                    "rules" => "required"
                ],
                "lastname" => [
                    "label" => "Last Name", 
                    "rules" => "required"
                ],
                "email" => [
                    "label" => "E-Mail", 
                    "rules" => "required|valid_email|is_unique[users.email]"
                ],
                "password" => [
                    "label" => "Password", 
                    "rules" => "required|min_length[6]"
                ],
                "cpassword" => [
                    "label" => "Confirm Password", 
                    "rules" => "required|matches[password]"
                ],
                "status" => [
                    "label" => "Status", 
                    "rules" => "required"
                ],
            ];

            if (!$this->validate($rules)) {
                $this->data['action'] = 'Add';
                $this->data['validation'] = $this->validator;
                return view('admin/comman/header',$this->data)
                . view('admin/comman/leftmenu')
                . view('admin/user_management/addedit')     
                . view('admin/comman/footer');
            }

            $insert_date = [
                'username' => $this->request->getPost('username'),
                'firstname' => $this->request->getPost('firstname'),
                'lastname' => $this->request->getPost('lastname'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
                'status' => $this->request->getPost('status'),
            ];
            $this->user->insert($insert_date);

            $message = $this->admin->username.' has added a new user.';
            $type = "Users";
            activity_logs($message,$type,$this->request->getIPAddress());

            return redirect()->to('admin/user')->with('success', 'User has been added successfully.');

        }catch(Exception $e){
            exit($e->getMessage());
        }
    }

    public function edit($id = null)
    {
        try{

            if($id){
                
                $user_data = $this->user->where('id', $id)->where('id !=',1)->first();
                if($user_data){
                    $this->data['user_entry'] = $user_data;
                    $this->data['action'] = 'Edit';

                    return view('admin/comman/header',$this->data)
                    . view('admin/comman/leftmenu')
                    . view('admin/user_management/addedit',$this->data)
                    . view('admin/comman/footer');
                     
                }else{
                    return redirect()->to('admin/user')->with('error', 'Invalid request!'); 
                }
            }else{
                return redirect()->to('admin/user')->with('error', 'Invalid request!');
            }

        }catch(Exception $e){
            exit($e->getMessage());
        }
    }

    public function update(){
        try{

            $id = $this->request->getPost('id');

            $rules = [
                
                "username" => [
                    "label" => "Username", 
                    "rules" => "required|is_unique[users.username,id,{$id}]"
                ],
                "firstname" => [
                    "label" => "First Name", 
                    "rules" => "required"
                ],
                "lastname" => [
                    "label" => "Last Name", 
                    "rules" => "required"
                ],
                "email" => [
                    "label" => "E-Mail", 
                    "rules" => "required|valid_email|is_unique[users.email,id,{$id}]"
                ],
                "password" => [
                    "label" => "Password", 
                    "rules" => "permit_empty|min_length[6]"
                ],
                "cpassword" => [
                    "label" => "Confirm Password", 
                    "rules" => "permit_empty|matches[password]"
                ],
                "status" => [
                    "label" => "Status", 
                    "rules" => "required"
                ],
            ];
            
            if (!$this->validate($rules)) {
                $this->data['action'] = 'Edit';
                $this->data['validation'] = $this->validator;
                return view('admin/comman/header',$this->data)
                . view('admin/comman/leftmenu')
                . view('admin/user_management/addedit')      
                . view('admin/comman/footer');
            }
            
            $data_update = [
                'username' => $this->request->getPost('username'),
                'firstname' => $this->request->getPost('firstname'),
                'lastname' => $this->request->getPost('lastname'),
                'email' => $this->request->getPost('email'),
                'status' => $this->request->getPost('status'),
            ];

            if($this->request->getPost('password')){
                $data_update['password'] = password_hash($this->request->getPost('password'),PASSWORD_DEFAULT);
            }

            $this->user->update($id,$data_update);

            $message = $this->admin->username.' has updated the user id '.$id;
            $type = "Users";
            activity_logs($message,$type,$this->request->getIPAddress());

            return redirect()->to('admin/user')->with('success', 'User has been updated successfully.');

        }catch(Exception $e){
            exit($e->getMessage());
        }
    }

    public function checkUserLoginOrNot($username){
        try{
            $log = $this->log->where('type IN ("Login","Logout")')->where('DATE(created_at)',date('Y-m-d'))->where("(message LIKE '%".$username." has login to the system.%' OR message LIKE '%".$username." has logout to the system.%')")->orderBy('id','desc')->limit(1)->get();
            if($log->getNumRows()){
                if($log->getRow()->type == 'Login'){
                    return false;
                }else{
                    return true;
                }
            }else{
                return true;
            }
        }catch(Exception $e){
            exit($e->getMessage());
        }
    }

    public function actions(){
        try{

            if($this->request->getPost('action') == 'change_status'){
                
                $this->statusUpdate();
                return redirect()->to('admin/user')->with('success', 'User has been change status successfully.');
            }

            if($this->request->getPost('action') == 'delete'){
                $this->delete();
                return redirect()->to('admin/user')->with('success', 'User has been deleted successfully.');
            }
        }catch(Exception $e){
            exit($e->getMessage());
        }
    }

    private function delete(){
        try{
            $id = $this->request->getPost('userid');
            $this->user->delete($id);

            $message = $this->admin->username.' has delete the user id '.$id;
            $type = "Users";
            activity_logs($message,$type,$this->request->getIPAddress());
            return true;
        }catch(Exception $e){
            exit($e->getMessage());
        }
    }

    private function statusUpdate(){
        try{
            $id = $this->request->getPost('userid');
            $this->user->update($id,['status' => $this->request->getPost('publish')]);

            $message = $this->admin->username.' has change the status of the user id '.$id;
            $type = "Users";
            activity_logs($message,$type,$this->request->getIPAddress());

        }catch(Exception $e){
            exit($e->getMessage());
        }
    }
}
