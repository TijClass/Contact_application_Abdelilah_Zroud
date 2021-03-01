<?php
if(isset($_POST)){
    // get from data base
    $sql = "SELECT * FROM users";
    

    //
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($email != "" && $password != "" ){
        if ($email == "aby@anywhere.com"){
                if ($password == "1234"){
                    session_start(); 
                    $_SESSION['login']=true;
                    setcookie("login_email",$email, time() + (86400 * 30), "/");
                    setcookie("login_password",$password, time() + (86400 * 30), "/");
                    header('Location: ./index.php');
                }
            }
    }
}else{
    header('location: ./login.php');
}
