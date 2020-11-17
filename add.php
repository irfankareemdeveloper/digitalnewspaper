<?php
 // require_once 'conn.php';
include_once 'header.php';
?>


<form method="post" action="add.php" class="w-50 p-5">
  <div class="form-group">
    <label for="exampleInputname1">userName</label>
    <input type="text" name="username" class="form-control" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputusername">Email</label>
    <input type="text" name="email" class="form-control" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputusername">password</label>
    <input type="password" name="password" class="form-control"  placeholder="password">
  </div>

  <button type="submit" name="submit" class="btn btn-primary float-right">Add new User</button>
</form>



<?php

if(isset($_POST['submit'])){

	

	 $username = $_POST['username'];
	 $user_email = $_POST['email'];
	 $password = $_POST['password'];
 

	

	$sql = "INSERT INTO users (username,email, password)
	VALUES ('$username','$user_email' ,'$password')";
	$results = $conn->query($sql);
		if ($results) {
		  echo "<script> alert('Your account is created Successfully'); </script>";
		  header("Location: index.php");
			exit();
		} 
		else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}

}
else
{
	echo 'button click not working';
}

include 'footer.php';
?>