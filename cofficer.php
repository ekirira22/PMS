<?php
  include 'functions.php';

  //check if the user in session is in group ID 200 (chief officer)
  $query_user = "SELECT * FROM t_county_staff WHERE user_name = '".$_SESSION['user']."'";
  $result = mysqli_query($db, $query_user);
  $logged_user = mysqli_fetch_assoc($result);
  //if they're not in this access group they are redirected to login.php
  if($logged_user['group_id'] == 200){
    if(isset($_SESSION['user'])){
      echo "Welcome " . $_SESSION['user'];
    }
  }else {
    header("location: login.php?warning=InvalidURL");
}
 ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <link href="" rel="stylesheet" />
   <link href="css/styles.css" rel="stylesheet" />

   <title>Dashboard - Chief Officer</title>
 </head>

 <body>
   <div>
     <a href="logout.php?logout">LOGOUT</a>
   </div>

 </body>

 </html>
