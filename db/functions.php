<?php
session_start();
//connect to database
$db = mysqli_connect('localhost','root','','pms');


if(mysqli_connect_errno()){
  // If there is an error with the connection, stop the script and display the error.
  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

//variable declaration
$username = "";
$errors = array();

//escape string sequence
function e($val){
  global $db;
  return mysqli_real_escape_string($db, trim($val));
}
//we will use this to display error messages
function display_error(){
  global $errors;
  if(count($errors)>0){
    echo '<div class="error">';
      foreach ($errors as $error) {
        echo $error . '<br>';
      }
      echo '</div>';
  }
}

//we'll call the login () function if login button is clicked

if(isset($_POST['login'])){
  login();
}

//LOGIN VARIOUS USERS DEPENDING IF ADMIN, CHIEF OFFICER OR PROJECT MANAGER

function login(){

  global $db, $username, $errors;
  //grab form values
  $username = e($_POST['username']);
  $password = e($_POST['password']);

  //form validation
  if(empty($username)){
    array_push($errors, "Please enter your username");

  }
  if(empty($password)){
    array_push($errors, "Please enter your password");
  }

  //log in if no errors so far
  if(count($errors)==0){
    $password = md5($password);

    $query = "SELECT * FROM t_county_staff WHERE user_name = '$username' AND password = '$password'";
    $results = mysqli_query($db, $query);

    if(mysqli_num_rows($results) == 1) { // i.e. user has been found
      //check if user is admin, co or pm and log them in to their respective pages

      $logged_in_user = mysqli_fetch_assoc($results);

      if($logged_in_user['group_id'] == 100){ //if they belong to admin group id
        $_SESSION['user'] = $logged_in_user['user_name'];
        header('location: ./admin/admin.php');
      }
      else if($logged_in_user['group_id'] == 200){ //if they belong to chief officer group id
        $_SESSION['user'] = $logged_in_user['user_name'];
        header('location: ./cofficer/cofficer.php');
      }
      else if($logged_in_user['group_id'] == 300){ //if they belong to project manager group id
        $_SESSION['user'] = $logged_in_user['user_name'];
        header('location: ./pmanager/pmanager.php');
      }
    }else{
        array_push($errors, "Wrong username or password");
    }
  }

}//end of login function

 ?>
