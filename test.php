<?php 
$servername = "mariadb.devser.net";
$username = "dev_minia";
$database = "dev_minia";
$password = "eb5777d5678d4e66ccff301295b166199cd9";

// Create connection
$conn = new mysqli($servername,$username,$password,$database);

// Check connection
if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: " . $conn->connect_error;
  exit();
}

if(isset($_GET['email']) && $_GET['email']!=''){
	$sql = "SELECT * FROM `constantcontact_token` WHERE id='1' ";
	$result = $conn->query($sql);

	$access_token = '';
    while($row = $result->fetch_assoc()) {
	    $access_token = $row['access_token'];
	}
   
    $email = $_GET['email'];
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

?>