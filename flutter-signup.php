<?php 
	include_once("db-manager.php");
	// REGISTER USER
	

	  
	    $name = mysqli_real_escape_string($cxn, $_POST['name']);
	    $email = mysqli_real_escape_string($cxn, $_POST['email']);
	    $mobile = mysqli_real_escape_string($cxn, $_POST['mobile']);
	  
	 
	        $query = "INSERT INTO `users` (`name`, `email`, `phone`)
	  			  VALUES('$name', '$email','$mobile')";
	    $results = mysqli_query($cxn, $query);
	    if($results>0)
	    {
	        echo "user added successfully";
	    }
	    
	    
?>