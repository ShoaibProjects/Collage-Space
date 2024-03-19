<?php
session_start();
include 'connection.php';
include 'sessionCreation.php';
include 'darkMode.php';
$responseData = array('Status'=>'notOKoookkkk');
if (isset($_COOKIE['remember_me_cookie'])) {
    $identifier = $_COOKIE['remember_me_cookie'];
    $escapedIdentifier = mysqli_real_escape_string($con, $identifier);
    $sql = "SELECT * FROM `users` WHERE `Remember_token`= '$identifier'";
    $result = $con->query($sql);
    $user='';
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['serial number'];
        $_SESSION['username'] = $user['Username'];
        $_SESSION['team'] = $user['Team'];
        $_SESSION['desc'] = $user['Description'];
        $_SESSION['role'] = $user['Role'];
        $responseData = array('Status'=>'OK', 'mode'=>$mode, 'name' => $_SESSION['username'], 'team' => $_SESSION['team'], 'desc' => $_SESSION['desc'], 'role' => $_SESSION['role']);
    } 
}

echo json_encode($responseData);
?>