<?php
if(isset($_POST)){
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$adresse = $_POST['adresse'];
$phone = $_POST['phone'];
$group = $_POST['inlineRadioOptions'];
$notes = $_POST['notes'];
if($firstname != "" && $lastname != "" && $email != "" && $adresse != "" && $phone != "" && $group != "" && $notes != ""  ){
    echo("add person +");
}
else{
    echo("replire tout les case");
}
}