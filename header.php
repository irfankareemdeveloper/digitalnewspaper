<?php
// require_once 'conn.php';
require_once 'session.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>Artical Posts</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Artical Editors</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav m-auto">
 
	     <li class="nav-item ">
    	    <a class="nav-link" href="index.php"> Home <span class="sr-only">(current)</span></a>
      	</li>
		<li class="nav-item ">
        	<a class="nav-link" href="create_post.php"> Create Post </a>
	    </li>
        <li class="nav-item ">
          <a class="nav-link" href="my_post.php"> My Posts </a>
      </li>
   </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown text-right">
        <a class="nav-link e" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <h5>Welcome <?php echo $login_session; ?></h5> 
        </a>
         <a class="item" href="logout.php">Sign Out</a>
      </li>
      <li class="nav-item">
      <form action="search.php" method="GET">
		<input type="text" name="query" />
		<input type="submit" value="Search" />
	</form> 
      </li>
  </ul>
  </div>
</nav>

