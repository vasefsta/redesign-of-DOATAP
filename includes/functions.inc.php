<?php

function emptyInputSignup($name, $surname, $afm, $adt, $address, $phone, $email, $password, $password_repeat) {
    $result;
    if ( empty($name) || empty($surname) || empty($afm) || empty($adt) || empty($address) || empty($phone) || empty($email) || empty($password) || empty($password_repeat) ) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function InvaliEmail($email) {
    $result;
    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch ($password, $password_repeat) {
    $result;
    if ($password !== $password_repeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function afmExists($conn, $afm) {
    $sql = "SELECT * FROM users WHERE afm = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/SignUp.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $afm);

    mysqli_stmt_execute($stmt);

    $result_data = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result_data)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function adtExists($conn, $adt) {
    $sql = "SELECT * FROM users WHERE adt= ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/SignUp.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $adt);

    mysqli_stmt_execute($stmt);

    $result_data = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result_data)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function emailExists($conn, $email) {
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/SignUp.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);

    mysqli_stmt_execute($stmt);

    $result_data = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result_data)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $surname, $afm, $adt, $address, $phone, $email, $password) {
    $sql = "INSERT INTO users (name, surname, afm, adt, address, phone, email, passwd) VALUES (?, ?, ?, ?, ?, ?, ?, ? );";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/SignupForm/SignUp.php?error=stmtfailed");
        exit();
    }
    
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    
    
    mysqli_stmt_bind_param($stmt, "ssssssss", $name, $surname, $afm, $adt, $address, $phone, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("location: ../Pages/SignupForm/SignUp.php?error=none");
        exit();

}

function emptyInputLogin($email, $password) {
    $result;
    if ( empty($email) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $email, $password) {
    $userexists = emailExists($conn, $email);

    if ($userexists === false) {
        header("location: ../Pages/LoginForm/Login.php?error=wronglogin");
        exit();
    }

    $UsersPasswd = $userexists["passwd"];

    $checkpasswd = password_verify($password, $UsersPasswd);

    if ($checkpasswd === false) {
        header("location: ../Pages/LoginForm/Login.php?error=wronglogin");
        exit();
    } else if ($checkpasswd === true) {
        session_start();
        $_SESSION["userid"] = $userexists["usersId"];
        $_SESSION["name"] = $userexists["name"];
        $_SESSION["surname"] = $userexists["surname"];
        $_SESSION["afm"] = $userexists["afm"];
        $_SESSION["adt"] = $userexists["adt"];
        $_SESSION["email"] = $userexists["email"];
        $_SESSION["phone"] = $userexists["phone"];
        $_SESSION["address"] = $userexists["address"];

        header("location: ../index.php");
        exit();
    }

} 

function fillForm($conn, $afm, $adt, $name, $surname, $mobile, $email, $address, 
$type, $uni_tei, $department, $country, $university, $ects, $title, $regDate, $gradDate, $adtPhoto, $gradPhoto, $ectsPhoto, $status){
    
    $date1=date("Y-m-d",strtotime($regDate));
    $date2=date("Y-m-d",strtotime($gradDate));

    session_start();
    $usersId = $_SESSION["userid"];
    $_SESSION["type"] = $type;
    $_SESSION["uni_tei"] = $uni_tei;
    $_SESSION["department"] = $department;
    $_SESSION["country"] = $country;
    $_SESSION["university"] = $university;
    $_SESSION["ects"] = $ects;
    $_SESSION["title"] = $title;
    $_SESSION["regDate"] = $regDate;
    $_SESSION["gradDate"] = $gradDate;
    $_SESSION["adtPhoto"] = $adtPhoto;
    $_SESSION["gradPhoto"] = $gradPhoto;
    $_SESSION["ectsPhoto"] = $ectsPhoto;

    $sql = "UPDATE users SET afm=?, adt=?, name=?, surname=?, phone=?, address=?, email=? WHERE usersId=". $usersId ."; ";
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: editApplication.inc.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssss", $afm, $adt, $name, $surname, $mobile, $address, $email);

    mysqli_stmt_execute($stmt);

    
    $sql = "INSERT INTO application (usersId, type, uni_tei, department, country, universityName, ects, title, registrationDate, graduationDate, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Pages/NewApplication.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "isssssissss", $usersId, $type, $uni_tei, $department, $country, $university, $ects, $title, $date1, $date2, $status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    //###############################################################

    $sql = "SELECT LAST_INSERT_ID();";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);

    if($status == "saved"){
        header("location: editApplication.inc.php?id=$row[0]");
        exit();
    } else if ($status == "submitted") {
        header("location: ../index.php?error=submitted");
        exit();        
    }

}

function UpdateForm($conn, $userId, $id, $afm, $adt, $name, $surname, $mobile, $email, $address, $type, $uni_tei, $department, $country, $university, $ects, $title, $regDate, $gradDate, $adtPhoto, $gradPhoto, $ectsPhoto){
    $date1=date("Y-m-d",strtotime($regDate));
    $date2=date("Y-m-d",strtotime($gradDate));
    $sql = "UPDATE application SET type=?, uni_tei=?, department=?, country=?, universityName=?, ects=?, title=?, registrationDate=?, graduationDate=? WHERE applicationId=". $id ."; ";
    $stmt = mysqli_stmt_init($conn);
    echo "$sql";
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: editApplication.inc.php?error=stmtfailed");
        exit();
    }
    echo "AAAAAA";
    mysqli_stmt_bind_param($stmt, "sssssisss", $type, $uni_tei, $department, $country, $university, $ects, $title, $regDate, $gradDate);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

// #######################################################################################

    $sql = "UPDATE users SET afm=?, adt=?, name=?, surname=?, phone=?, address=?, email=? WHERE usersId=". $userId ."; ";
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: editApplication.inc.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssss", $afm, $adt, $name, $surname, $mobile, $address, $email);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("location: editApplication.inc.php?id=$id");
    exit();

}


function UpdateMe ($conn, $userId, $name, $surname, $afm, $adt, $address, $phone, $email){

    $sql = "UPDATE users SET afm=?, adt=?, name=?, surname=?, phone=?, address=?, email=? WHERE usersId=". $userId ."; ";
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: editApplication.inc.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssss", $afm, $adt, $name, $surname, $phone, $address, $email);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    
    header("location: ../Pages/Profile/Me.php");
    exit();
}

function SubmitForm($conn, $userId, $id, $afm, $adt, $name, $surname, $mobile, $email, $address, $type, $uni_tei, $department,
    $country, $university, $ects, $title, $regDate, $gradDate, $adtPhoto, $gradPhoto, $ectsPhoto){
    $date1=date("Y-m-d",strtotime($regDate));
    $date2=date("Y-m-d",strtotime($gradDate));
    $status = "submitted";

    $sql = "UPDATE application SET type=?, uni_tei=?, department=?, country=?, universityName=?, ects=?, title=?, registrationDate=?, graduationDate=?, status=? WHERE applicationId=". $id ."; ";
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: editApplication.inc.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssissss", $type, $uni_tei, $department, $country, $university, $ects, $title, $regDate, $gradDate, $status);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

// #######################################################################################

    $sql = "UPDATE users SET afm=?, adt=?, name=?, surname=?, phone=?, address=?, email=? WHERE usersId=". $userId ."; ";
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: editApplication.inc.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssss", $afm, $adt, $name, $surname, $mobile, $address, $email);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("location: ../Pages/MyApplications.php?error=submitted");
    exit();
}