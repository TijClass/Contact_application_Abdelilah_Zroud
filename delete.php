<?php
require('./connection.php');
// sql to delete a record
if(isset($_POST['id'])){
    $id=$_POST['id'];
    $sql = "DELETE FROM contacts WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo 1;
        } else {
        echo "Error deleting record: " . $conn->error;
    }
}
