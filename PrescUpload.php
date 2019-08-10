<?php

include('Login.php');
include('connection.php');
if(isset($_POST['submit']))
{
    
 
global $r;
if(!(empty($_SESSION['email']))){
 $email=$_SESSION['email'] ;
 $query = "SELECT * FROM customer_details WHERE EmailID='$email'";

$results = mysqli_query($connection, $query);
if (mysqli_num_rows($results) == 1) {
        $r = mysqli_fetch_row($results);
        $CID=$r[0];
}

 $image = $_FILES['image']['name'];   
//image file directory
$target = "IMAGE/".basename($image);

$name=$_POST['name'] ;
$details=$_POST['details'] ;
//echo($name) ;
//echo($details) ;
//echo($email) ;
//echo($CID);
    
    
    
 $query = "INSERT INTO prescription (CID,image,name,details) VALUES ($CID,'$image','$name','$details')";
 $result = mysqli_query($connection,$query); 
    
 if(!$result){
    //    array_push($errors,"Failed to upload Image") ;
    }
    
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) 
        {
  		
          array_push($suc,"Your Order has been succesfully BOOKED . we will reach you with 3 days") ;   
        
         // header('location: Homepage.php');
        
  	    }else{
  		array_push($errors,"Failed to upload Image") ;
  	    }
    

}
    
    
}





?> 

<!DOCTYPE html>
<html lang="">
<head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="font/stylesheet.css" rel="stylesheet">
            <title>Prescription Page</title>
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<style>
    

                                     
    body{
        
        background-image: url("IMAGE/bg_upload.jpg") ;
        background-size: cover ;
        background-attachment: fixed ;
    }
    
       .alert {
    padding: 10px;
        width: 99% ;
    background-color: #f44336;
    color: white;
        margin: 0 ;
        margin-top: 0 ;
    margin: 0px 0px 0px 0px ;
}
    
    .alert2 {
    padding: 50px;
        width: 99% ;
    background-color: #4CAF50;    
    color: white;
        margin: 0 ;
        margin-top: 0 ;
    margin: 0px 0px 0px 0px ;
}
     .dropdown-menu{
   
        background-color: black ;
        color: #1abc9c ;
     
    }

    .error {
    margin: 0 ;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.7s;
    margin: 0px 0px 0px 0px ;
}

.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}

    
</style>
    
<body>
    
 <?php include('errors.php') ; ?>      
    
</body>