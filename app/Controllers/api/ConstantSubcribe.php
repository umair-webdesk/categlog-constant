<?php

namespace App\Controllers\api;
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
header('Access-Control-Allow-Headers: token, Content-Type');
header('Access-Control-Max-Age: 1728000');
header('Content-Length: 0');
header('Content-Type: text/plain');
use App\Controllers\BaseController;
use App\Models\admin\GeneratetokenModel;



class ConstantSubcribe extends BaseController
{

    protected $productVariant;

    public function __construct(){
        $this->generatetokenmodel = new GeneratetokenModel();
    }

    public function index()
    {
        try{
            $reqBody = json_decode(file_get_contents('php://input'),true);
            $response= array();
            if(isset($reqBody['email']) && $reqBody['email']!=''){
                $token_data = $this->generatetokenmodel->where('id', 1)->first();
                $result  = $this->generatetokenmodel->findAll();
               
                $access_token = $result[0]['access_token'];
               
                $email = $reqBody['email'];
                $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.cc.email/v3/contacts?email=".$email."&status=all",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                "authorization: Bearer ".$access_token.""
                ),
                ));

                $response = curl_exec($curl);
                $data = json_decode($response, true);
               // echo "<pre>";print_r($data);die;
                $email_data = array();
                if(!empty($data['contacts'])){
                    foreach($data['contacts'] as $contacts)
                    {
                        if($contacts['email_address']['address'] == $email)
                        {
                            //$email_data[] = $contacts['email_address']['address'];
                            $email_data[] = $contacts;
                        }
                    }

                    $reponse = array('sucess' => true,'data' =>$email_data,  'message' => 'This email is already exists.'); 
                }else{
                    $reponse = array('sucess' => false,'data' =>$email_data,  'message' => 'This email doest not exist.'); 
                }
                
            }else{
                $reponse = array('sucess' => false, 'data' =>$email_data,  'message' => 'Please provide valid email.'); 
            }

            echo json_encode($reponse);

        }catch(Exception $e){

            $error = $e->getMessage();
            $reponse = array('sucess' => false, 'message' => $error); 
            echo json_encode($reponse);
            exit;
        }
    }

    public function create_subscribe()
    {
        try{
            $reqBody = json_decode(file_get_contents('php://input'),true);
            // echo "<pre>";
            // print_r($reqBody);die;
            $response= array();
            $first_name = '';$last_name = '';$street_address_1 = '';$street_address_2 = '';
            $city = '';$state_dropdown = '';$postal_code = '';$country_dropdown = '';
            $phone = '';$email_address1 = '';$email_address2 = '';
            foreach($reqBody as $key => $value){
               
               if($value['name']=='first_name'){
                    $first_name = $value['value'];
               }

               if($value['name']=='last_name'){
                    $last_name = $value['value'];
               }

               if($value['name']=='street_address_1'){
                    $street_address_1 = $value['value'];
               }
               
               if($value['name']=='street_address_2'){
                    $street_address_2 = $value['value'];
               }

               if($value['name']=='city'){
                    $city = $value['value'];
               }

               if($value['name']=='state_dropdown'){
                    $state_dropdown = $value['value'];
               }

               if($value['name']=='postal_code'){
                    $postal_code = $value['value'];
               }
               
               if($value['name']=='country_dropdown'){
                    $country_dropdown = $value['value'];
               }

               if($value['name']=='phone'){
                    $phone = $value['value'];
               }
               
               if($value['name']=='email_address1'){
                    $email_address1 = $value['value'];
               }

               if($value['name']=='email_address2'){
                    $email_address2 = $value['value'];
               }

               $resources = 'Contact';
               
            }
            
            if(isset($email_address1) && $email_address1!=''){
                $token_data = $this->generatetokenmodel->where('id', 1)->first();
                $result  = $this->generatetokenmodel->findAll();
               
                $access_token = $result[0]['access_token'];
               
                $email = $email_address1;
                $curl = curl_init();
                curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.cc.email/v3/contacts?email=".$email."&status=all",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                "authorization: Bearer ".$access_token.""
                ),
                ));

                $response = curl_exec($curl);
                $data = json_decode($response, true);
                //echo "<pre>";print_r($data);die;
                $email_data = array();
                if(!empty($data['contacts'])){
                    foreach($data['contacts'] as $contacts)
                    {
                        if($contacts['email_address']['address'] == $email)
                        {
                            //$email_data[] = $contacts['email_address']['address'];
                            $email_data[] = $contacts;
                        }
                    }

                    $reponse = array('sucess' => true,'data' =>$email_data,  'message' => 'This email is already exists.'); 
                }else{
                    $contactData = array(
                            "email_address" => array("address" => $email_address1, "permission_to_send"=>"implicit"),
                            "first_name" => $first_name,
                            "last_name" => $last_name,
                            "company_name" => "",
                            "create_source" => $resources,
                            "phone_numbers" => [array("phone_number" => $phone, "kind"=>"work")],
                            "street_addresses" => [array("kind" => "work", "street"=>$street_address_1.' '.$street_address_2, "city" => $city, "state" => $state_dropdown, "postal_code" => $postal_code, "country" => $country_dropdown)]
                        );
                        
                        $contactData = json_encode($contactData);
                        //echo "<pre>";print_r($contactData);die;
                       $create_contact = $this->curl_execution($contactData, $access_token);
                    $reponse = array('sucess' => false,'data' =>json_decode($create_contact,true),  'message' => 'Subscribe created successfully .'); 
                }
                
            }else{
                $reponse = array('sucess' => false, 'data' =>$email_data,  'message' => 'Please provide valid data.'); 
            }

            echo json_encode($reponse);

        }catch(Exception $e){

            $error = $e->getMessage();
            $reponse = array('sucess' => false, 'message' => $error); 
            echo json_encode($reponse);
            exit;
        }
    }

    function curl_execution($data, $access_token){
        $curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.cc.email/v3/contacts",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $data,
		CURLOPT_HTTPHEADER => array(
            "authorization: Bearer ".$access_token."",
            "content-type: application/json"
		  ),
		 ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        if ($err) {
            return $err;
        } else {
            return $response;
        }
    }

}
