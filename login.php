<?php
print_r($_POST);
die();
if(isset($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($email != "" && $password != "" ){
        if ($email == "aby@anywhere.com"){
                if ($password == "1234"){
                    session_start(); 
                    $_SESSION['login']=true;
                    header('Location: ./index.html');
                }
            }
    }
}
header('location: ./login.php');