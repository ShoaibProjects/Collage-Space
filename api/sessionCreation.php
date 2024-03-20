<?php
include 'connection.php';
function generateCookie(){
     $unique_identifier = generateUniqueIdentifier();
     setcookie('remember_me_cookie', $unique_identifier, time() + (30 * 24 * 60 * 60), '/');
     return $unique_identifier;
}
function generateUniqueIdentifier() {
    return bin2hex(random_bytes(32)); 
}

?>