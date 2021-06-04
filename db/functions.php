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
$successes = array();

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

function display_success(){
  global $successes;
  if(count($successes)>0){
    echo '<div class="success">';
      foreach ($successes as $success) {
        echo $success . '<br>';
      }
      echo '</div>';
  }
}

//we call the login () function if login button is clicked

if(isset($_POST['login'])){
  login();
}
//we'll call the add project () function if add project button is clicked
if(isset($_POST['addproject'])){
  addProject();
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

//Add Project function
function addProject(){
  global $db, $errors, $successes;
  //grab form values
  $pname = e($_POST['pname']);
  $dept = intval(e($_POST['dept'])) ;
  $sub = e($_POST['sub']);
  $start = e($_POST['start']);
  $end = e($_POST['end']);
  $budget = e($_POST['budget']);
  $fyear = intval(e($_POST['fyear'])) ;
  $status = "pending";

  //form validation
  if(empty($pname)){
    array_push($errors, "Please enter the Project Name");
  }
  if(empty($dept)){
    array_push($errors, "Please enter the Department");
  }
  if(empty($sub)){
    array_push($errors, "Please enter the Sub-county");
  }
  if(empty($start)){
    array_push($errors, "Please enter the start date");
  }
  if(empty($end)){
    array_push($errors, "Please enter the end date");
  }
  if(empty($budget)){
    array_push($errors, "Please enter the budget amount");
  }
  else if(empty($fyear)){
    array_push($errors, "Please enter the Financial Year");
  }
else {
  $query = "INSERT INTO t_projects (project_id ,project_name, dep_fk, subcounty, start_date, end_date, f_year, budget, status) VALUES ('','$pname','$dept','$sub','$start','$end','$fyear', '$budget', '$status')";
  $run = mysqli_query($db,$query);
  if($run){
    array_push($successes, "The project has been added Successfully!");
    echo "<script>if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
          }</script>"; // A javascript approach to prevent a resubmit on refresh and back button.
  }else{
    echo '<script type="text/javascript"> alert("Something Went Wrong!")  </script>';
  }
}


}
 ?>
