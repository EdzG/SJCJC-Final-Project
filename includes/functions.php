<?php 

#Sign up Page

function emptyInputSignup($fname, $lname, $address, $DOB, $issDate, $expDate, $class, $bldType, $sex,  $eyeCol,  $height,  $weight,  $region, $password, $pwdRepeat, $userImg, $userSig, $manSig, $licNo){
    $result;

    if(empty($fname) || empty($lname) || empty($address) || empty($DOB) || empty($issDate) || empty($expDate) || empty($class) || empty($bldType) || empty($sex) || empty($eyeCol) || empty($height) || empty($weight) || empty($region) || empty($password) || empty($pwdRepeat) || empty($userImg) || empty($userSig) || empty($manImg) || empty($licNo)){
        $results = true;
    }
    else {
        $results = false;
    }

    return $results;
}

function pwdMatch($password, $pwdRepeat){
    $result;

    if($password !== $pwdRepeat){
        $results = true;
    }
    else {
        $results = false;
    }

    return $results;
}

function imageVerification($imageActualExt, $allowed, $imageTmpName, $imageError) {
    if (in_array($imageActualExt, $allowed)) {
        if($imageError === 0){
            $verification = true;

            return $verification;
        } else {
            header("location: ../uploadlogin.php?error=uploaderror");
        exit();
        }
    } else {
        header("location: ../uploadlogin.php?error=wrongext");
        exit();
    }
}

function  createUser($conn, $licNo, $fName, $lName, $password, $qrCodeTmpName){
    $qrCode = addslashes(file_get_contents($qrCodeTmpName));
    // $sql = "INSERT INTO user (LIC, FName, LName, Pass) VALUES (?, ?, ?, ?);";

    $sql = "INSERT INTO user (LIC, FName, LName, QRCode) VALUES ( '$licNo', '$fName', '$lName', '$qrCode')";
    $conn->query($sql);


    // $stmt = mysqli_stmt_init($conn);

    // if (!mysqli_stmt_prepare($stmt, $sql)) {
    //     header("location: ../signup.php?error=stmtfailed");
    //     exit();
    // }

    // mysqli_stmt_bind_param($stmt, "ssss", $licNo, $fName, $lName, $password);
    // mysqli_stmt_execute($stmt);
    // mysqli_insert_id($conn);
    // mysqli_stmt_close($stmt);

    
}

function  createUserDriverLicense($conn, $licNo, $fname, $lname, $DOB, $issDate, $expDate, $class, $bldType, $sex,  $eyeCol,  $height,  $weight, $address, $region, $userImgTmpName, $userSigTmpName, $manSigTmpName){
    
    $user = addslashes(file_get_contents($userImgTmpName));
    $userSig = addslashes(file_get_contents($userSigTmpName));
    $manSig = addslashes(file_get_contents($manSigTmpName));
    $sql = "INSERT INTO driverlicense (LIC, FName, LName, DOB, IssueDate, ExpireDate, class, BloodType, Sex,  EyeColor,  Height,  Weight, Address, Region, Image, Signature, TrafficManager) VALUES ( '$licNo', '$fname', '$lname', '$DOB', '$issDate', '$expDate', '$class', '$bldType', '$sex',  '$eyeCol',  '$height',  '$weight', '$address', '$region', '$user', '$userSig', '$manSig')";
    
    $conn->query($sql);
    $conn->close();


    header("location: ../signup.php?acc=user");
    exit();
}

function  createPoliceAccount($conn, $pid, $fName, $lName, $password, $depart){
    
    $sql = "INSERT INTO police (PID, FName, LName, Pass, Department ) VALUES ( '$pid', '$fName', '$lName', '$password', '$depart')";
    $conn->query($sql);
    $conn->close();

    header("location: ../signup.php?acc=police");
    exit();
}

function  createAdminAccount($conn, $adminId, $fName, $lName, $password){
    
    $sql = "INSERT INTO admin (AdminId, FName, LName, Pass ) VALUES ( '$adminId', '$fName', '$lName', '$password')";
    $conn->query($sql);
    $conn->close();

    header("location: ../signup.php?acc=admin");
    exit();
}

function emptyInputLogin($username, $password){
    $result;

    if(empty($username) || empty($password)){
        $results = true;
    }
    else {
        $results = false;
    }

    return $results;
}

function userExists($conn, $username){
    $sql = "SELECT * FROM user WHERE LIC = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function policeExists($conn, $username){
    $sql = "SELECT * FROM police WHERE PID = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function adminExists($conn, $username){
    $sql = "SELECT * FROM admin WHERE AdminID = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function loginUser($conn, $username, $pwd) {
    $userExists = userExists($conn, $username);

    if($userExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    } 

   
    $default = password_hash("password", PASSWORD_DEFAULT);
    $pwdCheckDefault = password_verify($pwd, $default);

    $password = $userExists["Pass"];
    $pwdCheck = password_verify($pwd, $password);

    if ($pwdCheckDefault == true){
        header("location: ../updatePassword.php?acc=user");
        exit();
    } else if ($pwdCheck == false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($pwdCheck == true) {
        session_start();
        $_SESSION["userId"] = $userExists["LIC"];
        header("location: ../index.php");
        exit();
    }
}

function loginPolice($conn, $username, $pwd) {
    $policeExists = policeExists($conn, $username);

    if($policeExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $default = password_hash("password", PASSWORD_DEFAULT);
    $pwdCheckDefault = password_verify($pwd, $default);

    $password = $policeExists["Pass"];
    $pwdCheck = password_verify($pwd, $password);

    if ($pwdCheckDefault == true){
        header("location: ../updatePassword.php?acc=police");
        exit();
    } else if ($pwdCheck == false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($pwdCheck == true) {
        session_start();
        $_SESSION["police"] = $policeExists["PID"];
        header("location: ../index.php");
        exit();
    }
}

function loginAdmin($conn, $username, $pwd) {
    $adminExists = adminExists($conn, $username);

    if($adminExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $default = password_hash("password", PASSWORD_DEFAULT);
    $pwdCheckDefault = password_verify($pwd, $default);

    $password = $adminExists["Pass"];
    $pwdCheck = password_verify($pwd, $password);

    if ($pwdCheckDefault == true){
        header("location: ../updatePassword.php?acc=admin");
        exit();
    } else if ($pwdCheck == false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($pwdCheck == true) {
        session_start();
        $_SESSION["admin"] = $adminExists["AdminID"];
        header("location: ../index.php");
        exit();
    }
}

function addCarLicense($conn, $LicPlate, $licNo, $expirationDate, $VIN, $region, $brand, $model) {
    $sql = "INSERT INTO carlicense (LicPlate, LIC, ExpireDate, VIN, Region, Brand, Model) VALUES (  '$LicPlate', '$licNo', '$expirationDate', '$VIN', '$region', '$brand', '$model')";
    $conn->query($sql);
    $conn->close();
}
    