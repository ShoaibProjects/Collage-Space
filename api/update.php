<?php
session_start();
include 'connection.php';
$data = json_decode(file_get_contents("php://input"),true);
$preUsername = $_SESSION['username'];
$username = $data['username'];
$password = $data['password'];
$team = $data['team'];
$desc = $data['desc'];
$role = $data['role'];
$responseData = '';
if (empty($username)){
    $responseData = ["res"=>"EmptyUsername"];
}
elseif (empty($password)){
    $responseData = ["res"=>"EmptyPassword"];
}
elseif (strlen($password) < 8) {
    $responseData = ["res"=>"LessThan8Chars"];
}
else{
    $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
    $team = htmlspecialchars($team, ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($desc, ENT_QUOTES, 'UTF-8');
    $role = htmlspecialchars($role, ENT_QUOTES, 'UTF-8');

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);    

    $stmt = $con->prepare("UPDATE `users` SET `Username`=?, `Password`=?, `Team`=?, `Description`=?, `Role`=? WHERE `Username` = ?");
        $stmt->bind_param('ssssss', $username, $hashedPassword,$team,$description,$role,$preUsername);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        if($affectedRows > 0){
            $responseData = array('res'=>'done');
            $_SESSION['username'] = $username;
            $_SESSION['team'] = $team;
            $_SESSION['desc'] = $description;
            $_SESSION['role'] = $role;
        }    
}
echo json_encode($responseData);
?>