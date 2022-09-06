<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\admin\SettingModel;
use Config\Services;

class Setting extends BaseController
{
    protected $data = [];
    protected $setting;

    public function __construct(){
        $this->setting = new SettingModel();
        $this->data['page_title'] = 'Setting Management';
    }

    public function index()
    {
        try{
            $router = Services::router();
            return view('admin/comman/header',$this->data)
            . view('admin/comman/leftmenu')
            . view('admin/setting/index')
            . view('admin/comman/footer');
        }catch(Exception $e){
            exit($e->getMessage());
        }
    }

    public function update(){
        try{

            $rules = [
                "store_url" => [
                    "label" => "Store URL", 
                    "rules" => "required|valid_url"
                ],
                "store_front_url" => [
                    "label" => "Store Front URL", 
                    "rules" => "permit_empty|valid_url"
                ],
                "api_path" => [
                    "label" => "API Path", 
                    "rules" => "required"
                ],
                "api_username" => [
                    "label" => "API Username", 
                    "rules" => "required"
                ],
                "api_token" => [
                    "label" => "API Token", 
                    "rules" => "required"
                ],
                "logo" => [
                    "label" => "Logo9", 
                    "rules" => "permit_empty|uploaded[logo]|max_size[logo,1024]|mime_in[logo,image/jpg,image/jpeg,image/png]"
                ]
            ];


            if (!$this->validate($rules)) {
                $this->data['validation'] = $this->validator;
                return view('admin/comman/header',$this->data)
                . view('admin/comman/leftmenu')
                . view('admin/setting/index',$this->data) 
                . view('admin/comman/footer');
            }

            $filename = '';
            
            $logo = $this->request->getFile('logo');
            if ($logo->isValid()) {
                if (!$logo->hasMoved()) {
                    if(!$filename = upload_image($logo,'logo',['png','jpeg','jpg'],true,true)){
                        return redirect()->to('admin/setting')->withInput();
                    }
                }
            }
                
            $update_data = [
                'store_url' => $this->request->getPost('store_url'),
                'store_front_url' => $this->request->getPost('store_front_url'),
                'api_path' => $this->request->getPost('store_url'),
                'api_username' => $this->request->getPost('store_url'),
                'api_token' => $this->request->getPost('store_url')
            ];

            if($filename){
                $update_data['logo'] = $filename;
            }
            $this->setting->update(1, $update_data);

            $message = $this->admin->username.' has update setting';
            $type = "Setting";
            activity_logs($message,$type,$this->request->getIPAddress());

            
            return redirect()->to('admin/setting')->with('success', 'Setting has been updated successfully.');
        }catch(Exception $e){
            exit($e->getMessage());
        }
    }
}
