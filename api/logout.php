<?php
session_start();
include 'connection.php';
$data = json_decode(file_get_contents("php://input"),true);
$username = $_SESSION['username'];
if(!empty($data['value'])){
    $sql = "UPDATE `users` SET `Remember_token`= '' WHERE `Username` = '$username'";
    $result = $con->query($sql);
    if($result){
        $responseData = array('res'=>'done');
        echo json_encode($responseData);
    }
}
?> 