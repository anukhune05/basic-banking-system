<?php

$conn = mysqli_connect("localhost","root","","bank");


    $sql = "CREATE TABLE `bank`.`bank1` (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
        `name` VARCHAR( 100 ) NOT NULL ,
        `email` VARCHAR( 50 ) NOT NULL ,
        `balance` INT NOT NULL ,
        `history` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) ENGINE = INNODB;
        ";
  
    $run = mysqli_query($conn,$sql);

    $sql = " INSERT INTO `bank`.`bank1` (
        `id` ,
        `name` ,
        `email` ,
        `balance`
        )
        VALUES ( 1, 'Naina Dube', 'naina@gmail.com', 1000 ) , ( 2, 'Harsha Maske', 'harsha@gmail.com', 2000 ) , ( 3, 'Sili Soni', 'sili@gmail.com', 3000 ) , 
        ( 4, 'Nihar Moge', 'nihar@gmail.com', 4000 ) , ( 5, 'Krishna Dobrev', 'krishna@gmail.com', 5000 ); ";



    $run = mysqli_query($conn,$sql);

    if($run)
    {
        echo "ok";
    }
    else{
        echo "not ok".mysqli_error($conn);
    }

?>