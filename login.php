   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center" class="mt-5">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php ?></div>
					
            </div>
				
         </div>
			
      </div>

      <div class="text-center pt-2 w-100">
         <a href="add.php" name="add new User"> SingUp </a> If not Registered    
      </div>

<?php
   include("conn.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $username = $_POST['username'];
      $password = $_POST['password']; 
      $user_id = $_POST['user_id']; 
      
      $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
       $user_role = $row['user_role'];
      echo $user_role;

      $count = mysqli_num_rows($result);
      
      echo $count;
     
      if($count == 1) 
      {
        
         $_SESSION['login_user'] = $username;
         $_SESSION['user_id'] = $user_id;
         if($user_role){
             header("location: http://localhost/posts/admin");
         }
         else
         {
          header("location: http://localhost/posts/index");
         }
      }
      else
      {
         $error = "Your Login Name or Password is invalid";
      }

   }

?>