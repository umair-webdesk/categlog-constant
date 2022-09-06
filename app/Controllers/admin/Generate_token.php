<?php 
namespace App\Controllers\admin;
use App\Models\admin\GeneratetokenModel;

use App\Controllers\BaseController;
class Generate_token extends BaseController {

	function __construct()
	{	
		
		ini_set('display_errors', 1);
		error_reporting(E_ALL);
		
		//$this->load->model("admin/generatetokenmodel");
		$this->generatetokenmodel = new GeneratetokenModel();
	
	}
 
	public function index()
    {		
		
		$this->data['page_title'] = 'Generate Token';
        return view('admin/comman/header',$this->data)
        . view('admin/comman/leftmenu')
        . view('admin/generate_token')
        . view('admin/comman/footer');
	}

	
	public function request_code()
	{		
		$clientId = CLIENT_ID;
		$redirectURI = REDIRECT_URL;
		$scope = SCOPE;
		$state = STATE;

		$urlredirect = $this->getAuthorizationURL($clientId, $redirectURI, $scope, $state);
		return redirect()->to($urlredirect);
	}
	
	public function get_code()
	{		
		$code = $this->request->getGet('code');

		$clientId = CLIENT_ID;
		$redirectURI = REDIRECT_URL;
		$clientSecret = CLIENT_SECRET;
		
		
		$token_info = $this->getAccessToken($redirectURI, $clientId, $clientSecret, $code);

		if(!empty($token_info)){
			$data['token_type'] = $token_info['token_type'];
			$data['expires_in'] = $token_info['expires_in'];
			$data['access_token'] = $token_info['access_token'];
			$data['scope'] = $token_info['scope'];
			$data['refresh_token'] = $token_info['refresh_token'];
			$data['updated_at'] =date('Y-m-d H:i:s');
			
			$id = 1;
			
			$updateToken = $this->generatetokenmodel->update(1,$data);
			// echo "<pre>";
			// echo $this->generatetokenmodel->getLastQuery()->getQuery();
			// print_r($data);
			// print_r($updateToken);die;
			return redirect()->to('/admin/generate_token')->with('success_message', 'Token Generate Successfully.');
			
		}else{

			return redirect()->to('/admin/generate_token')->with('error_message', 'Something went wrong to generate token.');
		}
	}

	function getAuthorizationURL($clientId, $redirectURI, $scope, $state) {
		// Create authorization URL
		$baseURL = AUTHORIZE_URL;
		$authURL = $baseURL . "?client_id=" . $clientId . "&scope=" . $scope . "+offline_access&response_type=code&state=" . $state . "&redirect_uri=" . $redirectURI;
		return $authURL;
		//return redirect()->to($authURL);
	//	return redirect()->to(site_url());
		//echo "<script>top.location.href=".$authURL.";</script>";
		//return $this->redirect($authURL);  
		//redirect($authURL);
	}
	
	public function getAccessToken($redirectURI, $clientId, $clientSecret, $code) {
		$ch = curl_init();
		$base = AUTHORIZE_TOKEN_URL;
		
		$url = $base . '?code=' . $code . '&redirect_uri=' . $redirectURI . '&grant_type=authorization_code';
		curl_setopt($ch, CURLOPT_URL, $url);
	
		$auth = $clientId . ':' . $clientSecret;
		$credentials = base64_encode($auth);
		$authorization = 'Authorization: Basic ' . $credentials;
		curl_setopt($ch, CURLOPT_HTTPHEADER, array($authorization, 'Content-Type: application/x-www-form-urlencoded'));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
		$result = curl_exec($ch);
		curl_close($ch);
		$result = json_decode($result,true);
		return $result;
	}

	function getEmailContact()
	{
		//$token_data = $this->generatetokenmodel->getTokendata('1');
		$token_data = $this->generatetokenmodel->where('id', 1)->first(); 

		$email = "development.qatesting@gmail.com";
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
		"Authorization: Bearer ".$token_data['access_token'].""
		  ),
		 ));

		$response = curl_exec($curl);
		$data = json_decode($response, true);

		$email_data = array();
		foreach($data['contacts'] as $contacts)
		{
			if($contacts['email_address']['address'] == $email)
			{
				$email_data[] = $contacts['email_address']['address'];
			}
		}

		echo '<pre>';
		print_r($data);
		exit;
	}

	function createContect()
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.cc.email/v3/contacts",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
		"Authorization: Bearer eyJraWQiOiIycmd3S0Y2cnM4cTRTeWNqbXQ2MkJRMThkVXh6WldaaWJYdHBvQmswZWNJIiwiYWxnIjoiUlMyNTYifQ.eyJ2ZXIiOjEsImp0aSI6IkFULlVpdWpRc2dmY3VjdXJtYUljTkZtMGNnYWVYaFV0UHloNWc4VzN0a0tzaFEub2FycmV1bGYzRUxKeWczVzcwaDYiLCJpc3MiOiJodHRwczovL2lkZW50aXR5LmNvbnN0YW50Y29udGFjdC5jb20vb2F1dGgyL2F1czFsbTNyeTltRjd4MkphMGg4IiwiYXVkIjoiaHR0cHM6Ly9hcGkuY2MuZW1haWwvdjMiLCJpYXQiOjE2NjExNzgyMTEsImV4cCI6MTY2MTI2NDYxMSwiY2lkIjoiNTJmYWQ1MGItNzdkOS00N2ZkLWJmYzQtYTg5NTY2ODhiM2JiIiwidWlkIjoiMDB1MXA4ZnN4ZnhDS25zVHgwaDgiLCJzY3AiOlsib2ZmbGluZV9hY2Nlc3MiLCJjb250YWN0X2RhdGEiXSwiYXV0aF90aW1lIjoxNjYxMTc2NTA3LCJzdWIiOiJkZXZleXN0dWRpb3NAZ21haWwuY29tIiwicGxhdGZvcm1fdXNlcl9pZCI6IjA0NmZjOWI3LWYyYWItNGFlNi04OGU5LWJlZTA3ZDQwMzJlNiJ9.H9jOXuFgAVqn2XvWPLWhsj3jO_Gee2rrP37giXc2e-eGkqpeAFSJMQFDJI8IwP8TyNZc6i5Uq7WpFS_f7LWzVcdmjnQ_VfH2Qz5Eb--GKKvYdtWnScMgfqtZ7NVPMfKoLnm7_gwPhtEJ23pnhpQXinY1ixOqoMmiYiZYxdQzIpxe_Y8TayLg5NW5tnYYndxKxm95lJxGsRVQu22PtwLSrnvALZIj08p60YTD0n_4Pv2uurzXubGJUN6LsQ59-e4ibq5XeA-DCnLY20TTMunOOnAkKzKQV4V-AxgYDYo376Rar0rUAOH7g3ehMhXuKFymZ0Jkm9EU6meN7QRJcUsRJQ"
		  ),
		 ));

		$response = curl_exec($curl);
		$data = json_decode($response, true);

		foreach($data['contacts'] as $contacts)
		{
			echo '<pre>';
		print_r($contacts);
		exit;
		}
		
	}

	
}
?>