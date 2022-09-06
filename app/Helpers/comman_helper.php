<?php

use Config\Services;
use App\Libraries\Admin;
use App\Libraries\System;
use App\Models\admin\LogModel;


if (! function_exists('admin_session'))
{
    /**
    * 
    */
    function admin_session()
    {
        try{
            $admin = new Admin();
            return $admin;
        }catch(Exception $e){
            echo $e;
            exit;
        }
    }
}

if (! function_exists('upload_image'))
{
    /**
    * 
    */
    function upload_image($filename,$path,$type = [],$size = false,$optimize = false)
    {
        $session = Services::session();
        try{

            if($type){
                if(!in_array($filename->guessExtension(),$type)){
                    $session->setFlashdata('error','Please upload file type '.implode(',',$type).' !');
                    return false;
                }
            }

            if($size){
                if($filename->getSizeByUnit('mb') > 2){
                    $session->setFlashdata('error','file size must be less than 2mb!');
                    return false;
                }
            }

            $newName = $filename->getRandomName();
            if($optimize){
                $image = Services::image();
                $image->withFile($filename)
                ->resize(100, 100, true, 'height')
                ->save(FCPATH . 'public/uploads/'.$path.'/thumb/100x100_'.$newName);
            }

            $filename->move(FCPATH . 'public/uploads/'.$path, $newName);
            return $newName;
        }catch(Exception $e){
            echo $e;
            exit;
        }
    }
}

if (! function_exists('activity_logs'))
{
    /**
    * 
    */
    function activity_logs($message,$type,$ip)
    {
        try{
            
            $log = new LogModel();

            $data = [
                'message' => $message,
                'type' => $type,
                'ip' => $ip
            ];

            $log->insert($data);
            
        }catch(Exception $e){
            echo $e;
            exit;
        }
    }
}

if (! function_exists('config_setting'))
{
    /**
    * 
    */
    function config_setting()
    {
        try{
            $system = new System();
            return $system;
        }catch(Exception $e){
            echo $e;
            exit;
        }
    }
}


if (! function_exists('active_link'))
{
    /**
    * 
    */
    function active_link($controller,$method = '',$active = 'kt-menu__item--active')
    {
        try{
            $router = Services::router();
            
            $class = class_basename($router->controllerName());

            if($method) {
                return ($method ==  $router->methodName() && $class == $controller) ? $active : '';
            }
            
            return ($class == $controller) ? $active : '';
        }catch(Exception $e){
            echo $e;
            exit;
        }
    }
}