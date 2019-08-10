<?php
include('Login.php');
include('connection.php');
 $suc =array() ;
$errors=array() ; 
 $email=$_SESSION['email'] ;
if (isset($_POST["submit"]))
{
    
    $cid = $_GET['cid'];
    $vid = $_GET['vid'];
  // Get the data
  $imageData=$_POST['im'];
 
  // Remove the headers (data:,) part.
  // A real application should use them according to needs such as to check image type
  $filteredData=substr($imageData, strpos($imageData, ",")+1);
 
  // Need to decode before saving since the data we received is already base64 encoded
  $unencodedData=base64_decode($filteredData);
 
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
    for ($i = 0; $i < 10; $i++) {
        $randstring = $characters[rand(0, strlen($characters))];
    }
    
    
    $img = $randstring.".jpeg" ;
   
 
  // Save file. This example uses a hard coded filename for testing,
  // but a real application can specify filename in POST variable
    
  $fp = fopen( "IMAGE/".$img, 'wb' );
  fwrite( $fp, $unencodedData);
  fclose( $fp );
        
        if($vid == 0){
            
            $query = "UPDATE customer_details set CImage = '$img' WHERE EmailID = '$email'";
            $result = mysqli_query($connection,$query);
            header('location:updating_PP_customer.php');
        } else if ($cid == 0){
            $query = "UPDATE vendor_details set image = '$img'  WHERE EmailID = '$email'";
            $result = mysqli_query($connection,$query);
            header('location:updating_profile_page.php');
        }
            
    
    
    
    
}
?>







<!DOCTYPE html>
<html lang="">
<head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <link href="font/stylesheet.css" rel="stylesheet">
            <title>Booking</title>
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
<style>    
                              .navbar {
                                        margin-bottom: 0;
                                        background-color:black ;
                                        z-index: 9999;
                                        border: 0;
                                        font-size: 15px !important;
                                        line-height: 1.42857143 !important;
                                        letter-spacing: 4px;
                                        border-radius: 0;
                                    }

                                    .navbar li a, .navbar .navbar-brand {
                                        color: #fff !important;

                                    }

                                    .navbar-nav li a:hover, .navbar-nav li.active a {
                                        color: #1abc9c !important;
                                        background-color: #fff !important;
                                    }

                                    .navbar-default .navbar-toggle {

                                        border-color: transparent;
                                        color: #fff !important;
                                    }
    
    
                                     #heading {
                                            font-family: 'Pacifico', cursive;
                                            font-size: 35px ;
                                        }
                                   body {
                                            background-image: url(IMAGE/bac12.jpg) ;
                                             background-size: cover;
                                     }
    
    
    
                                    .block {
                                              background: rgba(0,0,0,0.5);
                                              margin-top: 200px ;
                                              margin-left: 200px ;
                                
                                              padding-top: 20px ;
                                              padding-right: 40px ;
                                              padding-left: 40px ;
                                              padding-bottom: 20px;
                                             margin-bottom: 100px;
                                             height: 750px ;
                                             width: 1000px ;
                                        border-radius: 15px ;
                                           
                                           
                                    }
                                 #review 
                                    {
                                        
                                            background: rgba(0,0,0,0.5);
                                              margin:0 200px ;
                                              padding: 0 40px ;
                                              margin-top: 0;
                                              
                                             background-color: purple;
                                             height: 200px ;
                                             width: 1000px ;
        
                                     }
    
                                 
    
    
    #image {
        padding-left: 250px ;
        padding-top: 30px ;
        margin-right: 10px ;
        display: inline-block;
        position: absolute;
        left: 0;
        
        }       
    .desc {
            display: inline-block;
             position: absolute;
             border: none ;
            right: 0;
            width: 55%;
           height: 100% ;
        padding-left: 50px ;
        padding-top: 35px ;
    }    

    p {
        color: white ;
        display: inline ;
    }  
    
    
    .buttonize
    { text-decoration: none;
    color: black;
    background-color: gainsboro;
    padding: 10px 15px;
    border-radius: 11px;

  } 
.buttonize:hover
    {
        text-decoration: none;
        background-color: darkgray ;
        color: white;
    }
   .space
    {
        display: inline ;
    }
    
    .desc1
    {
        display: inline-block;
             position: absolute;
             border: none ;
           
            width: 70%;
           height: 100% ;
        
    }
 
 .block input[type="text"],
    #select_catalog,
    .block input[type="submit"]
{
    
    border:1px solid black ;

    height:40px ;
    color:black;
    font-size:16px;
    border-radius: 5px ;
}   
    
.buttonize {
    text-decoration: none;
    color: black;
    background-color: gainsboro;
    padding: 10px 15px;
    border-radius: 11px;

  } 
.buttonize:hover
    {
        text-decoration: none;
        background-color: brown;
        color: white;
    }
.commentBox{
            width: 900px;
            border: 1px solid white ;
            border-radius: 5px ;
            margin-top: 800px ;
            background: rgba(0,0,0,0.8);
            }
       
        .leftPanelImg img{
            border-radius: 100% ;
           
            
        }
    .leftPanelImg{
        float: left;
        background-color: orange ;
        
    }
        
        .rightPanel, .rightPanel p,.rightPanel hr{
            color: white;
            width: 75% ;
            float: left;
        
            margin-left: 10% ;
          
            
        
        }
        .clear
        {
            clear: both;
        }
    
    
    
    h3
    {
        text-align: center ;
        font-family: 'Pacifico', cursive;
        color: white;
       
        
        
    }
    .text2{
        color: white;
       
    }
    
      .alert {
    padding: 50px;
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
                             
    .dropdown-menu{
   
        background-color: black ;
        color: #1abc9c ;
     
    }
                             
</style>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
                    <nav class="navbar navbar-inverse navbar-fixed-top">
                      <div class="container">
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span> 
                                            </button>
                                             <a id="heading" class="navbar-brand">Online Service portal </a>
                                        </div>
                                        <div class="collapse navbar-collapse" id="myNavbar">
                                             <ul class="nav navbar-nav navbar-right">
                                             <li><a href="Homepage.php">Home</a></li> 
                                             <li><a href="Homepage.php">About us </a></li> 
                                             <li><a href="Homepage.php">Contact us</a></li>                                           
                                            
                                                            <li >  <?php
                                                          if(isset($_SESSION['email'])){

                                                         echo '<a  href="updating_PP_customer.php" >Profile page</a>'; } ?>

                                            </li>
                                            
                                 
                                <?php if(isset($_SESSION['email'])){ ?>
                                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Activity <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                          
                                          <li><a href="Customer-status-view.php">Status </a></li>
                                          <li><a href="all_review.php">All Review </a></li>
                                         
                                        </ul>
                                </li> <?php } ?>
                                                 
                                                 
                                            <li>
                                             <?php    
                                                     if(isset($_SESSION['email'])){
                                                       echo '<a  href="Logout.php" >Logout</a>';
                                                       }
                                                     else{
                                                        echo '<a href="LoginPage.php" >Login</a>';
                                                         
                                                         } 
                                             ?>
                                            </li>
                                               
                                             </ul>
                                        </div>
                                      </div>
                                </nav>
    
    
    
    <br><br><br>
     <?php include('errors.php') ; ?>
    

            
                
               
                              
                              
           
    


</body>
</html>
