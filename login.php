<?php
require 'connection.php';
include 'sessionCreation.php';
$dataFromForm = json_decode(file_get_contents("php://input"),true);
$username = $password = $remember = '';
$username =$dataFromForm["username"];
$password =$dataFromForm["password"];
$remember =$dataFromForm["remember"];
$info = '';
    if (empty($username)){
        $info = ["Status"=>"EmptyUsername"];
    }
    elseif (empty($password)){
        $info = ["Status"=>"EmptyPassword"];
    }
    else{
        $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
$stmt = $con->prepare("SELECT * FROM `users` WHERE `Username`= ?");
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows>0){
    $row = $result->fetch_assoc();
    $hashedPassword = $row['Password'];
    if(password_verify($password, $hashedPassword)){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['team'] = $row['Team'];
        $_SESSION['desc'] = $row['Description'];
        $_SESSION['role'] = $row['Role'];
        $info = array('Status'=>'OK','name'=>$username,'team'=>$_SESSION['team'],'desc'=>$_SESSION['desc'],'role'=>$_SESSION['role']);
        echo json_encode($info);
        if(!empty($remember)){
            $remember = generateCookie();
            $sql = "UPDATE `users` SET `Remember_token`= '$remember' WHERE `Username` = '$username'";
            $result = $con->query($sql);
        }
    }
    else{
        $info = array('Status'=>'WrongPword');
        echo json_encode($info);
    }
}
else {
    $info = array('Status'=>'notOK');
    echo json_encode($info);
}
    }
?>