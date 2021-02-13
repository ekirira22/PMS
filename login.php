<?php
  include('functions.php')
 ?>
<!DOCTYPE html>
 <html>

 <head>
   <title> Login Page</title>
   <link rel="stylesheet" href="css\style.css">
   <!--    <link rel="stylesheet" a href="css\font-awesome.min.css">-->
 </head>

 <body>
   <div class="header" id="loginheader">
     <h1 style="color:#174367;">Nyeri County Project Management System</h1>
   </div>
   <div class="loginarea">
     <img src="img/profile0.png" />

     <form method="post" action="login.php">
       <?php echo display_error();?>
       <div class="form-input">
         <input type="text" name="username" placeholder="User Name" />
       </div>
       <div class="form-input">
         <input type="password" name="password" placeholder="Password" />
       </div>
       <input type="submit" name="login" value="LOGIN" class="btn-login" />

     </form>
     <p><a href="index.php">Login as Guest?</a></p>

   </div>
 </body>

 </html>
