<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

      <!-- Required meta tags -->
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">



   <title>Basic Banking System</title>

   <style>
		.body
		{	
			background-image: url('bank_images/back22.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;  
 			background-size: cover;
		}

      
    .container1{
             width: 350px; height: 40px;
            color:white;
            border:solid grren 0.8px;
            background-color:black;
    }

    .container2{
      width: 500px; height: 60px;
      color: white;
      background-color:black;
    }

    input[type="submit"] 
		{
        color:rgb(84, 156, 191);
        border:solid 1.5px;
        border-color: rgb(84, 156, 191);
        background-color: black;
		}


</style>
</head>
<body class="body">
   <?php
    include "navbar.php";

   ?> 
       <center> <h2 class="container1">Transaction History</h2></center>
    <hr>
    
    <div class="container">
      
   <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">User Id</th>
      <th scope="col">Name</th>  
      <th scope="col">Balance</th>
    </tr>
  </thead>
  <tbody>

    <?php
    include "connection.php";

    $sql = "SELECT * FROM .`bank1`";
    $result = mysqli_query($conn, $sql);
  
    while($row = mysqli_fetch_assoc($result)){
     
      echo "<tr>
      <td>". $row['id'] . "</td>
      <td>". $row['name'] . "</td>
      <td>". $row['balance'] . "</td>
    </tr>";
  } 

    ?>

  </tbody>
</table>
    </div>

    <center>
    
      <div class="container2">
          <form action="history.php" method="post">
          <hr>
          <b>Enter The user ID</b>
          &emsp; <input type="number" name="uid" id="uid">
          &emsp;&emsp;&emsp;<a href="history.php"><input type="submit" value="send"></a>
          </form>
      </div>
    </center>
   
  <?php
  include "connection.php";

  $uid = $_POST['uid'];

  
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $sql = "SELECT * from `bank1` where `id` = '$uid' ";
    $run = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($run);
    $insert = false;

    if($run)
    {
      $insert = true;
    }

    if($insert)
    {
      ?>
      <br>
     <center>
     
      <!-- Button trigger modal -->
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
   View Transaction History
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Transaction History</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php
          echo "<h4>";
          echo $row['name']."  <br>Time:    ".$row['history'];
          echo "</h4>";
          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>
     
     </center>
     <br>
     <br>
     <br>
     <br>
      <?php
    }
    else{
      echo " ".mysqli_error($conn);
    }
    

  } 
  ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</body>
</html>