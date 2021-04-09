<?php
$con = mysqli_connect("localhost","root","","pagination");
$records=mysqli_num_rows(mysqli_query($con,"SELECT  * FROM `pagetable` "));
$per_page=5;
$total_page = ceil($records/$per_page);
$page= isset($_GET['page']) ? $_GET['page'] : 1;
$start= ($page-1)* $per_page;
$current_page=1;

$sql = "SELECT  * FROM `pagetable` LIMIT $start, $per_page";
$result = mysqli_query($con,$sql);
 $previous = $page-1;
 $next = $page+1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display data</title>
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
        <a class="nav-link" href="index.php">Home</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">data <span class="sr-only">(current)</span></a>
      </li> 
    </ul>
  </div>
</nav>

<div class="container">

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        
        while($row = mysqli_fetch_assoc($result) ){ 
             ?>
            <tr>
                <td><?php echo $start+1; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['password']; ?></td>
            </tr>
            <?php $start++;
            
        }?>
        </tbody>
    </table>

    <!-- pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination">
        <li class="page-item"><a class="page-link" class="first" href="display.php?page=<?php echo 1; ?>">First</a></li>
            <li class="page-item">
                <a class="page-link" href="display.php?page=<?php if($page<0){ exit(); } else {  echo $previous; } ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
           <li class="page-item active"><a class="page-link" href="display.php?page=<?php echo $page ;?>"><?= $page; ?></a></li>
            <li class="page-item">
                <a class="page-link" href="display.php?page=<?php if($page != $total_page){ echo $next ;}else{exit();}?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="display.php?page=<?php echo $total_page; ?>">Last</a></li>
        </ul>
    </nav>
</div>
</body>
</html>