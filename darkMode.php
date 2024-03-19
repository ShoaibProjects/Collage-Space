<?php
$data = json_decode(file_get_contents("php://input"),true);
$defaultMode = 'false';
$modeClick = '';
if(!empty($data['value'])){
    $modeClick = $data['value'];
    setcookie('mode', $modeClick, time() + (30 * 24 * 60 * 60), '/');
}
$modeRaw = isset($_COOKIE['mode']) ? $_COOKIE['mode'] : $defaultMode;
$mode = '';
if($modeRaw=='true'){
    $mode=true;
}
else{
    $mode=false;
}
$responseData = array('res'=>$mode);
if(!empty($data['value'])){
    echo json_encode($responseData);
}
?>