<?php

    echo 'hello its me';
    include_once('db-manager.php');

    if(isset($_POST['rating_data'])){
        
        $data = array(
    		':user_name'		=>	$_POST["user_name"],
    		':user_rating'		=>	$_POST["rating_data"],
    		':user_review'		=>	$_POST["user_review"],
    		':datetime'			=>	time()
    	);

    	$query = "
    	INSERT INTO rating_data 
    	(user_name, user_rating, user_review, datetime) 
    	VALUES (:user_name, :user_rating, :user_review, :datetime)
    	";
        
        $statement = $cxn->prepare($query);
    
    	$statement->execute($data);
        
        echo "Your Review & Rating Successfully Submitted";

    }