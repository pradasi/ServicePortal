

<?php 
include('Login.php') ;
global $r ;
if((empty($_SESSION['email']))){
  header('location: LoginPage.php');
 
}
else {
    
    $email=$_SESSION['email'] ;
 //$BID = $_GET['bid'];
//$VID = $_GET['vid'];    
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

                                

                                        .btn-default {
                                            background-color: #1abc9c;
                                            color: #fff ;
                                            padding: 15px 32px;
                                            font-size: 16px ;

                                        }
                                        .btn-default:hover
                                        {
                                             background-color: #10f7c9;
                                             color: #fff ;
                                        }
    body{
        
        background-image: url("IMAGE/bg_upload.jpg") ;
        background-size: cover ;
        background-attachment: fixed ;
    }
     .tab{
        
        text-align: center;
        color:white;
       margin-left: auto ;
          margin-right: auto ;
           background: rgba( 125 ,182, 211,0.92);
          width: 80% ;
          font-size: 16px ;
          border-radius: 7px ;
         margin-top: 150px ;
         margin-bottom: 100px ;
         border: 2px solid white ;
    }


    .tab1{
        padding-top: 20px ;
        font-family: 'Charmonman', cursive;
        font-weight: 800;
        font-size: 30px ;
        text-align: center;
    
        
    }
    
    .star{
          color: goldenrod;
          font-size: 3.5rem;
          padding: 1 1rem; /* space out the stars */
        }
        .star::before{
          content: '\2606';    /* star outline */
          cursor: pointer;
        }
        .star.rated::before{
          /* the style for a selected star */
          content: '\2605';  /* filled star */
        }
        
        .stars{
            counter-reset: rateme 0;   
            font-size: 2.0rem;
            font-weight: 900;
        }
        .star.rated{
            counter-increment: rateme 1;
        }
        .stars::after{
            content: counter(rateme) '/5';
        }
   
    .review{
       text-align: center ;
        font-size: 20px ;
    }
    
input[type="submit"]
{
    border:none ;
   
    color:white;
    font-size: 16px ;
    background-color:#1abc9c ;
   
    padding: 20px 30px ;
    border-radius: 5px ;
    text-align: center ;
}
    
    input[type="number"]{
        color: black ;
        
    }   
input[type="submit"]:hover
{
   background-color:dodgerblue; 
    
}
    
    .h_textarea
    {
        border-radius: 5px ;
        color: black ;
         padding: 5px 5px ;
    }
    
    .r_textarea{
        
        padding: 20px 20px ;
        border-radius: 5px ;
        color: black ;
    }
    
 .fileUpload {
    position: relative;
     padding: 20px 100px ;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;

   padding: 20px 30px ;
    font-size: 30px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
  
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
    
 <div class="tab">
             
  <p class="tab1">Upload your Prescription and get home delivery </p>  
        <br><br><br>
    
   
  
        <form action="PrescUpload.php" method="post" enctype="multipart/form-data" >
            
            <input id="stars" type="number" name="stars" value="" hidden>
             <input type="number" name="BID" value="<?php echo($BID) ?>" hidden>
             <input type="number" name="VID" value="<?php echo($VID) ?>" hidden>
            
            
             <textarea row="10" cols="72" placeholder="Name of the patient " class="h_textarea" name="name" value=" "></textarea><br><br>
             <textarea rows="10" cols="69" placeholder="any further details " class="r_textarea" name="details" value=" "></textarea><br><br>

            <p class="review"> Upload your Prescription</p>
           <div class="fileUpload btn btn-primary">
            <span>Upload</span>
            <input type="file" class="upload" name ="image"/>
           </div>

              <br><br>      
            <input type="submit" name="submit"><br>
    </form>
                                                    
        <br><br>                            
</div>                 

 
    
   
                    


    
    
</body>
</html>
