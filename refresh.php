<?php
include 'connection.php';
$respnose = array('SN' => $sortedNames, 'SD' => $sortedValues);
echo json_encode($respnose);
?>