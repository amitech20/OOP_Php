<?php

session_start();
if (!($_SESSION['email'])) {
  
  header('location:./forms/login.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="./assets/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
  <div class="all">
     <!-- Image and text -->
    <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#"><h2>ZURI-PHP</h2></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item f-right">
      <form action="./action.php" method="POST" style=" background-color: inherit">
        <button type="submit" name="logout" style="background-color: transparent; border: none">Logout</button>
     </form>
      </li>
  </div>
</nav>
<div class="justify-content-center"  style="color: white; margin-top:5%">

<?php if(isset($_GET['message'])){
  echo "<script> alert('You Just Logged Out')</script>";
}
?>
     <h1 class="">
       Welcome to Zuri Authentication 
       <?php
        if(isset($_SESSION['username'])){ echo $_SESSION['username'];} ?>
    </h1>
    <br>
      <h2 style="align-content: center">
        Here is a list of Students, their emails and Countries, Happey to Contact them?!
      </h2>
    </div>

     <form action="./action.php" method="POST" class="form" style="text-align: center; margin-top: 5%">
        <button class="btn btn-primary" name="all">
        Show All Users
       </button>
     </form>
    
</div>
  </div>

   
   
</body>
</html>