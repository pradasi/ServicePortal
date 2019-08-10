<?php 
$errors =array() ;
$suc =array() ;
include('connection.php');
  session_start();  
 if (isset($_POST['login'])) {
  $email =  $_POST['email'];
  $password =  $_POST['password'];

  if(!$email){
      
      echo "user name cannot be empty";
      
  }
  if(!$password){
      echo "user name cannot be empty";
      
  }
     
else{
    
  
  	$password = md5($password);
  	$query = "SELECT * FROM login WHERE EmailID='$email' AND Password='$password'";
    $q2="SELECT * FROM vendor_details WHERE EmailID='$email'" ;
  	$results = mysqli_query($connection, $query);
    $results2=mysqli_query($connection, $q2);
  	if (mysqli_num_rows($results) == 1) {
    
      $r = mysqli_fetch_row($results);
      $r2=mysqli_fetch_row($results2);
        
        if($r[2] == 'vendor'){
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in"; 
            array_push($suc,"You are now logged in") ; 
  	     header('location: Vendor-view.php');
            $cid=0 ;
            
        }if($r[2] == 'customer') {
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in";
           array_push($suc,"You are now logged in") ; 
  	     header('location: Homepage.php');
            $vid=0 ;
        }
        if($r2[4] == 'pharmacist') {
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in";
           array_push($suc,"You are now logged in") ; 
  	     header('location: pharmacy.php');
            $vid=0 ;
            
        }
        
  	  
  	}else {
  		 array_push($errors,"Password didn't match!! Enter the same password") ;
  	}
  }
}

?>