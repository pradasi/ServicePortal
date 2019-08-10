<?php
include('Login.php');
include('connection.php');

if(empty($_SESSION['email'])){
    header('location: Loginpage.php');
}

$errors =array() ;
$suc=array() ;
if(isset($_POST['submit']))
{
	$age=$_POST['age'] ;
	$sex=$_POST['sex'] ;
	$cp = $_POST['cp'];
	$bp = $_POST['bp'] ;
	$chol = $_POST['chol'];
	$fbs = $_POST['fbs'];
	$restecg = $_POST['restecg'];
	$thalach = $_POST['thalach'];
	$exang = $_POST['exang'];
	$oldpeak = $_POST['oldpeak'];
	$slope = $_POST['slope'];
	$ca = $_POST['ca'];
	$thal = $_POST['thal'];
	
		if($fbs > 120)
		{
			$fbs = 1;
		} else {
			$fbs = 0;
		}
	
	$list = array
		(
		"age,sex,cp,trestbps,chol,fbs,restecg,thalach,exang,oldpeak,slope,ca,thal",
		"$age,$sex,$cp,$bp,$chol,$fbs,$restecg,$thalach,$exang,$oldpeak,$slope,$ca,$thal",
		);

		$file = fopen("text.csv","w");

		foreach ($list as $line)
			{
			fputcsv($file,explode(',',$line));
			}

fclose($file);
		$value = array(37,1,2,130,250,0,1,187,0,3.5,0,0,2);

    $python = `python predict.py`;
	
			if($python == 1){
					$mes = "You have 85%-87% chances of heart disease, please opt for a checkup";
					array_push($errors,$mes);
					
			}
			else if($python == 0){
					$mes=  "You have no heart disease";
					array_push($suc,$mes);
			} else {
						$mes = "some error occured. please forgive";
						array_push($errors,$mes);
				}
	
		
}

?>




<!DOCTYPE html>
<html lang="">
<head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Charmonman" rel="stylesheet">
            <title>Health Checkup </title>
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
                                            background-image: url(IMAGE/heartbg2.jpg) ;
                                             background-size: 100% ;
                                       background-attachment: fixed ;
                                     }
    
    
                                    
    
    
                                table, td, th {    
                                    border: 1px solid white;
                                    text-align: left;
                                }

                                table {
                                    border-collapse: collapse;
                                    width: 100%;
                                }

                                th, td {
                                    padding: 15px;
                                    color: white ;
                                }
    
    
                                h3 {
                                     padding-bottom: 10px ;
                                    color: white ;
                                    text-align: center;
                                }
                                
                                
.block
{

    background: rgba(249,200,154,0.7);
    padding-bottom: 60px ;
     margin:100px 200px ;
    padding: 10px 40px ;
    height: 1500px ;
    border: 3px solid rgba(249,200,154,1) ;
    border-radius: 20px ;
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
        background-color: darkgray ;
        color: white;
    }
    
    
    #options
    {
        padding-bottom: 50px ;
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
    #heading2{
                        font-family: 'Pacifico', cursive;
                         font-size: 35px ;
                        text-decoration: underline ;
                        padding-bottom: 32px ;
        color: black ;
             }
                             
    .dropdown-menu{
   
        background-color: black ;
        color: #1abc9c ;
     
    }
    
    .block
    {
        
        text-align: center ;
    }
    
    
    
    nput[type="text"],
 input[type="number"]
{
    border:none ;
    border-bottom:2px solid black ;
    background:transparent ;
    height:40px ;
    color:black ;
    font-size:16px;
    padding: 20px 22px ;
    
    
}  
    
    input[type="submit"]{
        
        background-color: white ;
        border: none ;
    }
    input[type="submit"]:hover{
        
        background-color:rgb(245, 183, 125) ; 
        border: none ;
    }
    
    
    
    
    #select_catalog{
        
        width: 250px ;
        height: 40px ;
        border: white ;
        background:transparent;
        border: 2px solid black ;
    }
        ::placeholder{
    color:black ;
            
            
}
    
    p{
        color: black ;
        font-size: 20px ;
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
    
   <br><br> <br> <?php  include('errors.php') ; ?>
    
    
    <div class="block"> 
           
            <h3 id="heading2">Do you have a heart disease ?</h3>
           <div id="options">
            <form action="healthcheckup.php" method="post">
                <p>Enter your Age: </p>
                <input type="number" name="age"  placeholder="Age" >
                <p>Enter the Sex</p>
                <select name="sex" id="select_catalog">
                       <option value="1" >Male</option>  
                      <option value="0" >Female</option>  
                </select>
                
                <p>Enter the Chest pain type </p>
                <select name="cp" id="select_catalog">
                      <option value="0" >Type 1 </option>  
                      <option value="1" >Type 2</option>
                      <option value="2" >Type 3 </option>  
                      <option value="3" >Type 4</option>
                </select>
                
                 <p>Enter the Blood pressure </p>
                 <input type="number" name="bp"  placeholder="" >
                
                 <p>Enter the cholestrol </p>
                 <input type="number" name="chol"  placeholder="" >
                
                <p>Enter the fasting blood sugar level </p>
                 <input type="number" name="fbs"  placeholder="" >
                
                <p>Enter the rest electrocardio graphic  </p>
                 <input type="number" name="restecg"  placeholder="" >
                
                 <p>Enter the maximum heart rate achieved </p>
                 <input type="number" name="thalach"  placeholder="" >
                
                
                
                 <p>Enter the exercise induced angima </p>
                <select name="exang" id="select_catalog">
                      <option value="1" >True </option>  
                      <option value="0" >false</option>
                </select>
                
                <p>Enter the old peak  </p>
                <input type="number" name="oldpeak"  placeholder="" >
                
                <p>Enter the slope of the peak exercise   </p>
                <input type="number" name="slope"  placeholder="" >
                
                 <p>Enter the number of major vessels (0-3) colored by flourosopy   </p>
                <input type="number" name="ca"  placeholder="" >
                
                
                <p>Enter your THALASSEMIA value (3= normal, 6 = fixed defect , 7 = reversable defect)</p>
                <select name="thal" id="select_catalog">
                      <option value="1" >normal </option>  
                    <option value="2" >fixed defect</option>
                      <option value="3" >reversable defect</option>
                </select>
                
                 
                
                
    
                <br><br><br>
                   
                       <input type="submit" name="submit" value="submit">
                
                
                
                
             </form>
                  </div>      
                       
   
    
    </div>
    
    </body>
</html>

  