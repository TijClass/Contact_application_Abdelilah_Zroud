<?php
include "./connection.php";
session_start();
if(!isset($_SESSION['login'])){
  header('location: login.html');
}

$sql = "SELECT * FROM contacts";
$result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//   // output data of each row
//   while($row = mysqli_fetch_assoc($result)) {
//     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/vendor/boostrap/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <title>Document</title>
</head>
<body class="body">
    <header>
        <div class="container">
          <div class="row p-2">
            <div class="col-auto d-flex align-items-center">
                <img src="./assets/img/logo.png" alt="" width="100" class="logo img-fluid">
            </div>
            <div class="d-flex justify-content-between align-items-center col bg-dark rounded-pill text-light">
                <div><h1 class="h4 m-3">Welcome text</h1></div>
                <div><a href="./logout.php" class="m-2 btn btn-light  bg-warning text-dark border-0">Log out</a></div>
            </div>
        </div>
        </div>
    </header>
    <section>
      <div class="container">
        <h4 class="m-3 ms-3">Contact List</h4>
      </div>
      <div class="container">
        <div class="row d-flex justify-content-end mb-3">
          <div class="col-auto">
            <div class="input-group">
              <div class="input-group-text bg-dark text-warning border-0" id="btnGroupAddon"><i class="fas fa-search"></i></div>
              <input type="text" class="form-control bg-dark text-warning border-0" id="search" placeholder="Search" aria-label="Input group example" aria-describedby="btnGroupAddon">
            </div>
          </div>
          
          <div class="col-auto">
          <a href="#" class="btn btn-light pl-3 pr-3 bg-dark text-warning border-0 " data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add a person</a>
        </div>
          </div>
        </div>
        
      

        <div class="container ">
    <table class="bg-light table table-striped ">
        <thead class="bg-secondary text-light">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Firstname</th>
            <th scope="col">Last name</th>
            <th scope="col">Email</th>
            <th scope="col">Adresse</th>
            <th scope="col">Phone</th>
            <th scope="col">Groupe</th>
            <th scope="col">Action</th>
            <th scope="col"></th>
            
          </tr>
        </thead>
        <tbody>
          <?php
              if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                  echo '<tr data-id="'. $row["id"].'">
                  <th scope="row">'. $row["id"].'</th>
                  <td>'. $row["first_name"].'</td>
                  <td>'.$row["last_name"].'</td>
                  <td>'.$row["email"].'</td>
                  <td>'.$row["address1"].'</td>
                  <td>'.$row["phone"].'</td>
                  <td>'.$row["group"].'</td>
                  <td><a href="#">Edit</a></td>
                  <td scope="col"><i onclick="deleteRow('. $row["id"].')" class="fas fa-times-circle"></i></td>
                </tr>';
                }
              }
          ?>
        </tbody>
      </table>
    </div>
    </section>
    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content add-person">
      <div class="modal-header">
        <h5 class="modal-title h5-add-person" id="staticBackdropLabel">Add person</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="./add_person.php" id="add_person" method="post">
          <div class="form-group mb-2">
            <label for="firstname" class="d-block">Firstname:</label>
            <input type="text" name="firstname" id="firstname" placeholder="firstname" class="w-100">
        </div>
        <div class="form-group mb-2">
          <label for="lastname" class="d-block">Lastname:</label>
          <input type="text" name="lastname" id="lastname" placeholder="lastname" class="w-100">
      </div>
          <div class="form-group mb-2">
            <label for="email" class="d-block">Email:</label>
            <input type="email" name="email" id="email" placeholder="email" class="w-100">
        </div>
        <div class="form-group mb-2">
          <label for="adresse" class="d-block">Adress:</label>
          <input type="text" name="adresse" id="adresse" placeholder="adresse" class="w-100">
      </div>
      <div class="form-group mb-2">
        <label for="phone" class="d-block">Phone:</label>
        <input type="phone" name="phone" id="phone" placeholder="+212 6 XX-XX-XX-XX" class="w-100">
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="family">
      <label class="form-check-label" for="inlineRadio1">Family</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="friends">
      <label class="form-check-label" for="inlineRadio2">Friends</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="business">
      <label class="form-check-label" for="inlineRadio2">Business</label>
    </div>
    <div class="form-group mb-2">
      <label for="notes" class="d-block">Notes:</label>
      <textarea name="notes" id="notes" cols="62" rows="10"></textarea>
  </div>
  <div class="d-flex justify-content-end">
    <button type="submit" id= "submit" class="m-2 btn btn-light  bg-warning text-dark border-0">Submit</button>
  </div>
        </form>
      </div>
    </div>
    
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="./assets/vendor/boostrap/bootstrap.min.js"></script>
<script src="./assets/js/script.js"></script>

</body>
</html>