<?php
    include_once('session-manager.php');
    include_once('db-manager.php');
    
    if(isset($_POST['create'])){
        $id = $_SESSION['user'];
        $title = $_POST['title'];
        $caption = $_POST['caption'];
        $goal = $_POST['goal'];
        $category = $_POST['category'];
        $body = $_POST['description'];
        
        date_default_timezone_set("Africa/Lagos");
        $date = date("d-m-y:h:i:s");
        
        $filename = $_FILES['image']['name'];
        
        if($filename !== ''){
            $tmp_file = $_FILES['image']['tmp_name'];
            $stored_file = "images/upload-root/" . $filename;
            
            move_uploaded_file($tmp_file, $stored_file);
            
            $imageUrl= "images/upload-root/" . $filename;
        }else{
            $imageUrl = $store_img;
        }
        
        $sql = "INSERT INTO `fundraising`(`fundraiser_id`, `goal`, `body`, `title`, `caption`, `category`, `image`, `date`) VALUES ('$id','$goal','$body','$title','$caption','$category','$imageUrl','$date')";
        
        mysqli_query($cxn, $sql) or die(mysqli_error($cxn));
        
        echo "<script>alert('Your Fundraising was created successfully')</script>";
    }
?>

<style>
    
</style>

<body>
    <?php include_once('navbar.php') ?>
    <main class="container-fluid">
       <!--NEW PRODUCT FORM-->
        <div class="card p-4 mt-3" id="add">
			<div class="text-center mt-2">
				<h5 class="text-primary">Create Fundraising</h5>
			</div>
			<div class="p-2 mt-4">
				<form method="post" enctype="multipart/form-data">
					<div class="mb-3">
						<label class="form-label" for="name">Title</label>
						<input type="text" name="title" class="form-control" id="name" placeholder="Enter title"> 
					</div>
					<div class="mb-3">
						<label class="form-label" for="price">Caption</label>
						<input type="text" name="caption" class="form-control" id="price" placeholder="Enter Caption"> 
					</div>
					<div class="mb-3">
						<label class="form-label" for="price">Goal(Amount to be raised)</label>
						<input type="number" name="goal" class="form-control" id="goal" placeholder="Enter Goal"> 
					</div>
					<div class="mb-3">
					<label for="inputCategory">Category</label>
                    <select name="category" id="inputCategory" class="form-control">
                        <option selected>Choose...</option>
                        <option value="Health">Health</option>
                        <option value="Education">Education</option>
                        <option value="Church">Church</option>
                        <option value="Financial Emergency">Financial Emergency</option>
                        <option value="Upcoming Project">Upcoming Project</option>
                        <option value="Animal">Animal</option>
                        <option value="Ekiti">Others</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="body">Body</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="20"
                            cols="50">
                        </textarea>
                        <script>
                        CKEDITOR.replace('description');
                        </script>
                </div>
                	<div class="mb-3">
						<label class="form-label" for="image">Image</label>
                        <input type="file" class="form-control-file mb-3" name="image" id="image">
                    </div>
                                    
					<div class="mt-3 text-end">
						<button class="btn btn-primary w-sm waves-effect waves-light" name="create" type="submit">Create</button>
					</div>
		
				</form>
			</div>
		</div> 
    </main>
</body>