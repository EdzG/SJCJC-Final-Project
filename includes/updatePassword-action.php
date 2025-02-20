<?php 


if (isset($_POST["user"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $pwdRepeat = $_POST["pwdRepeat"];
    $ques = $_POST["secQues"];
    $ans = $_POST["answer"];
    

    require_once 'dbh-action.php';
    require_once 'functions.php';

    if(pwdMatch($password, $pwdRepeat) !== false) {
        header("location: ../updatePassword.php?error=mismatchpasswords");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    $sql="UPDATE user SET Pass = '$hashedPwd', Question = '$ques', Answer = '$ans' WHERE LIC='$username'";
    $conn->query($sql);
    $conn->close();

    header("location: ../login.php");
        exit();

} 
else if (isset($_POST["admin"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $pwdRepeat = $_POST["pwdRepeat"];
    
    require_once 'dbh-action.php';
    require_once 'functions.php';

    if(pwdMatch($password, $pwdRepeat) !== false) {
        header("location: ../updatePassword.php?error=mismatchpasswords");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    $sql="UPDATE admin SET Pass = '$hashedPwd' WHERE AdminId='$username'";
    $conn->query($sql);
    $conn->close();

    header("location: ../login.php");
        exit();


}  else if (isset($_POST["police"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $pwdRepeat = $_POST["pwdRepeat"];
    
    require_once 'dbh-action.php';
    require_once 'functions.php';

    if(pwdMatch($password, $pwdRepeat) !== false) {
        header("location: ../updatePassword.php?error=mismatchpasswords");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    $sql="UPDATE police SET Pass = '$hashedPwd' WHERE PID ='$username'";
    $conn->query($sql);
    $conn->close();

    header("location: ../login.php");
        exit();

}

