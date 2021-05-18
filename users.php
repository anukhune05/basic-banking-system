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
			background-image: url('_bankimages/back22.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;  
 			background-size: cover;
		}    

    
</style>


</head>
<body class="body">

    <?php
    include "navbar.php";
    ?>
   
    <div class="container">
      
   <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Balance</th>
      <th scope="col">Transactions</th>
    </tr>
  </thead>
  <tbody>

    <?php
    include "connection.php";

    $sql = "SELECT * FROM .`bank1`";
    $result = mysqli_query($conn, $sql);
    $sno = 0;
    while($row = mysqli_fetch_assoc($result)){
      $sno = $sno + 1;
      echo "<tr>
      <td>". $row['id'] . "</td>
      <td>". $row['name'] . "</td>
      <td>". $row['email'] . "</td>
      <td>". $row['balance'] . "</td>
      <td><a href='transfer.php'><button type='button' class='btn btn-success'>SEND</button></a> <a href='history.php'><button type='button' class='btn btn-info'>HISTORY</button></a></td>

    </tr>";
  } 

    ?>

  </tbody>
</table>
    </div>


   
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