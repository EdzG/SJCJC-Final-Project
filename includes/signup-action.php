<?php

if (isset($_POST["userAcc"])) {
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $address = $_POST["address"];
    $DOB = date('Y-m-d', strtotime($_POST["dob"]));
    $issDate = date('Y-m-d', strtotime($_POST["issDate"]));
    $expDate = date('Y-m-d', strtotime($_POST["expDate"]));
    $class = $_POST["class"];
    $bldType = $_POST["bldType"];
    $sex = $_POST["sex"];
    $eyeCol = $_POST["eyeCol"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $region = $_POST["region"];
    $password = $_POST["password"];
    $pwdRepeat = $_POST["pwdRepeat"];
    $licNo = $_POST["licNo"];

    $userImg = $_FILES['userImg'];
    $userSig = $_FILES['userSig'];
    $manSig = $_FILES['manSig'];
    $qrCode = $_FILES['qrCode'];

    #Getting info from the file uploaded
    $userImgName = $_FILES['userImg']['name'];
    $userImgTmpName = $_FILES['userImg']['tmp_name'];
    $userImgError = $_FILES['userImg']['error'];
    $userImgType = $_FILES['userImg']['type'];
    
    $userImgExt = explode('.', $userImgName);
    $userImgActualExt = strtolower(end($userImgExt));

    $userSigName = $_FILES['userSig']['name'];
    $userSigTmpName = $_FILES['userSig']['tmp_name'];
    $userSigError = $_FILES['userSig']['error'];
    $userSigType = $_FILES['userSig']['type'];
    
    $userSigExt = explode('.', $userSigName);
    $userSigActualExt = strtolower(end($userSigExt));

    $manSigName = $_FILES['manSig']['name'];
    $manSigTmpName = $_FILES['manSig']['tmp_name'];
    $manSigError = $_FILES['manSig']['error'];
    $manSigType = $_FILES['manSig']['type'];
    
    $manSigExt = explode('.', $manSigName);
    $manSigActualExt = strtolower(end($manSigExt));

    $qrCodeName = $_FILES['qrCode']['name'];
    $qrCodeTmpName = $_FILES['qrCode']['tmp_name'];
    $qrCodeError = $_FILES['manSig']['error'];
    $qrCodeType = $_FILES['qrCode']['type'];
    
    $qrCodeExt = explode('.', $qrCodeName);
    $qrCodeActualExt = strtolower(end($qrCodeExt));
    
    $allowed = array('jpeg', 'jpg', 'png');

    #Gets the files containing the different functions
    require_once 'dbh-action.php';
    require_once 'functions.php';


    // if (emptyInputSignup($fName, $lName, $address, $DOB, $issDate, $expDate, $class, $bldType, $sex,  $eyeCol,  $height,  $weight,  $region, $password, $pwdRepeat, $userImg, $userSig, $manSig, $licNo) !== false) {
    //     header("location: ../signup.php?error=emptyinput");
    //     exit();
    // }
    
    if(pwdMatch($password, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=mismatchpasswords");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

if (imageVerification($userImgActualExt, $allowed, $userImgTmpName, $userImgError) && imageVerification($userSigActualExt, $allowed, $userSigTmpName, $userSigError) && imageVerification($userSigActualExt, $allowed, $userImgTmpName, $userImgError) && imageVerification($manSigActualExt, $allowed, $manSigTmpName, $manSigError) !== false) {
    createUser($conn, $licNo, $fName, $lName, $password, $qrCodeTmpName);
    createUserDriverLicense($conn, $licNo, $fName, $lName, $DOB, $issDate, $expDate, $class, $bldType, $sex,  $eyeCol,  $height,  $weight, $address, $region, $userImgTmpName, $userSigTmpName, $manSigTmpName);
}

} else if (isset($_POST["policeAcc"])) {
    $pid = $_POST["pid"];
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $password = $_POST["password"];
    $pwdRepeat = $_POST["pwdRepeat"];
    $depart = $_POST["department"];
    

    require_once 'dbh-action.php';
    require_once 'functions.php';

    if(pwdMatch($password, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=mismatchpasswords");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);


    createPoliceAccount($conn, $pid, $fName, $lName, $password, $depart);
    

} 
else if (isset($_POST["adminAcc"])) {
    $adminId = $_POST["adminId"];
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $password = $_POST["password"];
    $pwdRepeat = $_POST["pwdRepeat"];
    

    require_once 'dbh-action.php';
    require_once 'functions.php';

    if(pwdMatch($password, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=mismatchpasswords");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);


    createAdminAccount($conn, $adminId, $fName, $lName, $hashedPwd);
    
    


}  else if (isset($_POST["carLicense"])) {
    $LicPlate = $_POST["LicPlate"];
    $licNo = $_POST["licNo"];
    $expirationDate = $_POST["expirationDate"];
    $VIN = $_POST["vin"];
    $region = $_POST["region"];
    $brand = $_POST["brand"];
    $model = $_POST["model"];
    

    require_once 'dbh-action.php';
    require_once 'functions.php';

    addCarLicense($conn, $LicPlate, $licNo, $expirationDate, $VIN, $region, $brand, $model);
    
    


}  
else {
    header("location: ../signup.php");
    exit();
}
