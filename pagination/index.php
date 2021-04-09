<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagination</title>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">PAGINATION</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="display.php">data</a>
      </li>
    </ul>
  </div>
</nav>

<!-- form -->

<div class="container">
    <form method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    <a href="display.php" class="btn btn-success" name="display">Show data</a>
    </form>
</div>

<?php
$con = mysqli_connect("localhost","root","","pagination");
if(isset($_POST['submit'])){
    $useremail = $_POST['email'];
    $userpwd = $_POST['pwd'];
    
    $sql = "INSERT INTO `pagetable`( `name`, `password`) VALUES ('$useremail','$userpwd')";
    mysqli_query($con,$sql);

}
?>
</body>
</html>