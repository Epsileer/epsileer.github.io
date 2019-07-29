<?php 
 require_once 'DbOperation.php';
 $response = array(); 
 
 if($_SERVER['REQUEST_METHOD']=='GET'){
 
 $device = $_GET['device'];
 $username = $_GET['username'];
 
 $db = new DbOperation(); 
 
 $result = $db->registerDevice($username,$device);
 
 if($result == 0){
 $response['error'] = false; 
 $response['message'] = 'Device registered successfully';
 }elseif($result == 2){
 $response['error'] = true; 
 $response['message'] = 'Device already registered';
 }else{
 $response['error'] = true;
 $response['message']='Device not registered';
 }
 }else{
 $response['error']=true;
 $response['message']='Invalid Request...';
 }
 
 echo json_encode($response);
