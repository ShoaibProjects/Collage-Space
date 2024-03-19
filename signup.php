    <?php
    include 'connection.php';
    include 'sessionCreation.php';
    $dataFromForm = json_decode(file_get_contents("php://input"),true);
    $username = $password = $team = $description = $role = $remember = '';
    if(empty($dataFromForm)){
        header("Location: index.php");
        exit;
    }
    $username =$dataFromForm["username"];
    $password =$dataFromForm["password"];
    $team =$dataFromForm["team"];
    $description =$dataFromForm["description"];
    $role =$dataFromForm["role"];
    $remember=$dataFromForm["remember"];
    $responseData = '';
    if (empty($username)){
        $responseData = ["Status"=>"EmptyUsername"];
    }
    elseif (empty($password)){
        $responseData = ["Status"=>"EmptyPassword"];
    }
    elseif (strlen($password) < 8) {
        $responseData = ["Status"=>"LessThan8Chars"];
    }
    else{
        $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
        $team = htmlspecialchars($team, ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
        $role = htmlspecialchars($role, ENT_QUOTES, 'UTF-8');
        
    // $sqlUsernameSearch = "SELECT `serial number` FROM `users` WHERE `Username`= '$username'";
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);    
        $stmt = $con->prepare("SELECT `serial number` FROM `users` WHERE `Username`= ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $resultInit = $stmt->get_result();

    // $resultInit = $con->query($sqlUsernameSearch);
    if($resultInit->num_rows>0){
        $responseData = ["Status" => "usernameDuplication", "Username" => $username, "Team" => $team, "Desc" => $description, "Role" => $role];
        // echo json_encode($responseData);
    }
    else{
        if(!empty($remember)){
            $remember = generateCookie();
        }
        // $sqlinsert = "INSERT INTO `users` (`Username`, `Password`, `Team`, `Description`, `Role`) VALUES ('$username', '$password', '$team', '$description', '$role')";
        $stmt = $con->prepare("INSERT INTO `users` (`Username`, `Password`, `Team`, `Description`, `Role`, `Remember_token`) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssssss', $username, $hashedPassword,$team,$description,$role,$remember);
        $stmt->execute();
        // $result = mysqli_query($con,$sqlinsert);
        $affectedRows = $stmt->affected_rows;
        if($affectedRows > 0){
        // $responseData = ["message" => "Username: ".$username. " Password: ".$password. "Team ".$team." Desc: ".$description." Role: ".$role];
        $responseData = ["Status" => "OK", "Username" => $username,"Password" => $password, "Team" => $team, "Desc" => $description, "Role" => $role];
        // echo json_encode($responseData);  
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['team'] = $team;
        $_SESSION['desc'] = $description;
        $_SESSION['role'] = $role;

        }
      }
    }
    echo json_encode($responseData);
    ?>