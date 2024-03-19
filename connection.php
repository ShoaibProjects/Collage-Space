<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "TSEC CSE";

  // $con = mysqli_connect($server, $username, $password);
  $con = new mysqli($server, $username, $password, $database);

  if(!$con){
    die("connect is nille ".mysqli_connect_error());
  }
  $sql = "SELECT count(*) as java_count FROM `users` where `team` = 'TJ'";
  $jnum = $con->query($sql);
  $row = $jnum->fetch_assoc();
  $java = $row['java_count'];

  $sql = "SELECT count(*) as cpp_count FROM `users` where `team` = 'TCPP'";
  $cppnum = $con->query($sql);
  $row = $cppnum->fetch_assoc();
  $cpp = $row['cpp_count'];

  $sql = "SELECT count(*) as p_count FROM `users` where `team` = 'TP'";
  $pnum = $con->query($sql);
  $row = $pnum->fetch_assoc();
  $python = $row['p_count'];

  $sql = "SELECT count(*) as ai_count FROM `users` where `team` = 'TAI'";
  $ainum = $con->query($sql);
  $row = $ainum->fetch_assoc();
  $AI = $row['ai_count'];

  $sql = "SELECT count(*) as w_count FROM `users` where `team` = 'TW'";
  $wnum = $con->query($sql);
  $row = $wnum->fetch_assoc();
  $web = $row['w_count'];

  $sql = "SELECT count(*) as d_count FROM `users` where `team` = 'TD'";
  $dnum = $con->query($sql);
  $row = $dnum->fetch_assoc();
  $data = $row['d_count'];

  $sql = "SELECT count(*) as and_count FROM `users` where `team` = 'TAnd'";
  $andnum = $con->query($sql);
  $row = $andnum->fetch_assoc();
  $android = $row['and_count'];

  $sql = "SELECT count(*) as dsa_count FROM `users` where `team` = 'TDSA'";
  $dsanum = $con->query($sql);
  $row = $dsanum->fetch_assoc();
  $DSA = $row['dsa_count'];
  // $con->close();

  $vars = array(
    'Team Java' => $java,
    'Team C++' => $cpp,
    'Team Python' => $python,
    'Team AI ML' => $AI,
    'Team Web Dev' => $web,
    'Team Data Science' => $data,
    'Team Android Dev' => $android,
    'Team DSA' => $DSA
  );

  arsort($vars);

  $sortedNames = array_keys($vars);
  $sortedValues = array_values($vars);
  
?>