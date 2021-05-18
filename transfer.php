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
             width: 500px; height: 40px;
            color:white;
            border:solid grren 0.8px;
            background-color:black;
    }

    .container2{
      width: 500px; height: 205px;
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
       <center> <h2 class="container1"><span>Transfer Money</span></h2></center>
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

    $sql = "SELECT * FROM `bank1`";
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
            <form action="transfer.php" method="post">
                <b>Enter The user ID of Sender</b>
                &nbsp;&emsp;<input type="number" name="sid" id="sid">
                <br><br>
                <b>Enter The user ID of Receiver </b>
                &nbsp; &nbsp;<input type="number" name="rid" id="rid">
                <br><br>
                <b>Enter The Amount</b>
                &ensp;&emsp;&emsp; &emsp;&emsp;&emsp;<input type="number" name="credit" id="credit">
                <br><br>
                &emsp;&emsp;&emsp;<input type="submit" value="SEND">
                &emsp;&emsp;&emsp;<a href="transfer.php"><button type="button" class="btn btn-outline-info">Refresh</button></a>
                <!-- &emsp;&emsp;&emsp;<a href="transfer.php"><input type="submit" value="Refresh"></a> -->
              </form>
          </div>
       </center>
    
   
  <?php
  include "connection.php";

  $sid = $_POST['sid'];
  $rid = $_POST['rid'];
  $credit = $_POST['credit'];


    


if($sid < 6 && $rid < 6)
{
   if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $sqls = "SELECT * FROM `bank1` WHERE `id` = '$sid' ";
        $runs = mysqli_query($conn,$sqls);
        $nums = mysqli_num_rows($runs);
        $rows = mysqli_fetch_assoc($runs);
        
        $sqlr = "SELECT * FROM `bank1` WHERE `id` = '$rid' "; 
        $runr = mysqli_query($conn,$sqlr);
        $numr = mysqli_num_rows($runr);
        $rowr = mysqli_fetch_assoc($runr);

        if($nums > 0 && $nums > 0)
        {
        
            if($credit < $rows['balance'])
            {
                $okok = true;
                    if($okok)
                    {
                        $qrys = "UPDATE `bank`.`bank1` SET `balance` = `balance` - '$credit' WHERE `id` ='$sid' ";
                        $qryr = "UPDATE `bank`.`bank1` SET `balance` = `balance` + '$credit' WHERE `id` ='$rid' ";

                        $result1 = mysqli_query($conn,$qrys);
                        $result2 = mysqli_query($conn,$qryr);
                    
                            if($result1)
                            {

                              echo "<br>";


                                echo  '<div class="alert alert-success" role="alert">
                               Your Transaction Is Successful!!!!
                              </div><br>';
                            }
                            else
                            {
                                echo " ".mysqli_error($conn);
                            }

                    }
                    else
                    {
                        echo " ".mysqli_error($conn);
                    }		
            }
            elseif($credit == $rows['balance'])
            {
              echo "<br>";


                echo '<div class="alert alert-info" role="alert">
                Your Balance Cannot Be Null!!!
              </div>';
            }
            else
            {
              echo "<br>";

                echo '<div class="alert alert-info" role="alert">
               Insufficient Cash!!
              </div>';
            }
        }       
        else
        {
            echo " ".mysqli_error($conn);
        }
   }
   else
   {
      echo " ".mysqli_error($conn);
   }
}
else
{
    echo "<br>";
    echo '<div class="alert alert-danger" role="alert">Invalid Sender Id Or Receiver Id <br>Please Recheck Again
  </div>';
   
}


  ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>