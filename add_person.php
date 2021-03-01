<?php
include "./connection.php";
if(isset($_POST)){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];
    $phone = $_POST['phone'];
    $group = $_POST['inlineRadioOptions'];
    $notes = $_POST['notes'];


    if($firstname != "" && $lastname != "" && $email != "" && $adresse != "" && $phone != "" && $group != "" && $notes != ""  ){
        $sql = "INSERT INTO contacts (`first_name`, `last_name`, `email`, `phone`, `address1`, `group`, `notes`)
        VALUES ('$firstname', '$lastname', '$email' , '$adresse' , '$phone' , '$group' , '$notes')";

        if (mysqli_query($conn, $sql)) {
            $_POST["id"]= mysqli_insert_id($conn);
            echo json_encode($_POST);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    else{
        echo(0);
    }
}