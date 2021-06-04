<?php
  include '../db/functions.php';

  //check if the user in session is in group ID 100 (admin)
  $query_user = "SELECT * FROM t_county_staff WHERE user_name = '".$_SESSION['user']."'";
  $result = mysqli_query($db, $query_user);
  $logged_user = mysqli_fetch_assoc($result);
  //if they're not in this access group they are redirected to login.php
  if($logged_user['group_id'] == 100){
    if(isset($_SESSION['user'])){
      // echo "Welcome " . $logged_user['staff_name'];
      // echo "<br>";
    }
  }else {
    header("location: ../login.php?warning=InvalidURL");
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
  <link href="../css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

  <title>ADD PROJECT</title>

  <link rel="stylesheet" href="../css/forms.css">
</head>

<body>
  <input type="checkbox" id="sidebar-toggle">
  <div class="sidebar">
    <!-- menu header -->
    <div class="sidebar-header">
      <h3 class="brand">
        <span>Nyeri County PMS</span>
      </h3>
      <label for="sidebar-toggle" class="ti-menu-alt"></label for="sidebar-toggle"> <!-- for side bar collapse and expand -->
    </div>

    <!-- menu body -->
    <div class="sidebar-menu">
      <ul>
        <!-- item 1 -->
        <li>
          <a href="#">
            <span class="ti-home"></span>
            <span>Dashboard</span>
          </a>
        </li>
        <!-- item 2 -->
        <li>
            <span class="ti-face-smile"></span>
            <span class="dropdown-btn">Staff</span>
            <div class="dropdown-container">
              <a href="#">Add Employee</a> <br>
              <a href="#">Manage Employees</a>
            </div>
        </li>
        <!-- item 3 -->
        <li>
            <span class="ti-agenda"></span>
            <span class="dropdown-btn">Work Flow</span>
            <div class="dropdown-container">
              <a href="#">Check Projects</a> <br>
              <a href="#">Approve/Decline Projects</a> <br>
            </div>
        </li>
      <!-- item 4 -->
        <li>
            <span class="ti-clipboard"></span>
            <span class="dropdown-btn">Projects & Tasks</span>
            <div class="dropdown-container">
              <a href="#">Add Project</a> <br>
              <a href="#">Manage Project</a> <br>
              <a href="#">Add Tasks</a> <br>
              <a href="#">Manage Tasks</a>
            </div>
        </li>
        <!-- item 5 -->
        <li>
          <a href="#">
            <span class="ti-folder"></span>
            <span>Reports</span>
          </a>
        </li>
        <!-- item 6 -->
        <li>
            <span class="ti-settings"></span>
            <span class="dropdown-btn">Settings</span>
            <div class="dropdown-container">
              <a href="#">Change Password</a> <br>
              <a href="#">Change Profile Picture</a>
            </div>
        </li>
        <!-- item 7 -->
        <li>
          <a href="../db/logout.php?logout">
            <span class="ti-hand-stop"></span>
            <span>LOG OUT</span>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <!-- End of sidebar -->

  <div class="main-content">
    <!-- top header -->
    <header>
      <div class="text-center">
        &nbsp;Add Project
      </div>
      <div class="social-icons">
        <span class="ti-bell"></span>
        <span class="ti-comment"></span>
        <span><?php echo "Welcome " . $logged_user['staff_name']; ?></span>
        <div> <img src="../img/profile0.png" alt=""> </div> <!--can upload user's picture and append it here if time allows -->
      </div>
    </header>

    <!-- main body -->

  <main>
    <div class="main-block">
      <form action="/">
        <div class="title">
          <h2>Add Project Definition</h2>
        </div>
        <div class="info">
          Project Title
          <input class="pname" type="text" name="name">
          Department
          <select>
            <option value="dept" selected>--choose one--</option>
            <option value="">Finance and Economic Planning</option>
            <option value="">Agriculture, Livestock & Fisheries</option>
            <option value="">County Public Service & Solid Waste Management</option>
            <option value="">Health Services</option>
            <option value="">Transport, Public Works, Infrastructure & Energy</option>
            <option value="">Land, Housing ad Urban Development</option>
            <option value="">Water, Irrigation, Environment and Climate Change</option>
            <option value="">Gender, Youth and Social Services</option>
            <option value="">Trade, Tourism, Culture and Cooperative Development</option>
          </select>
          Sub-County/Constituency
          <select>
            <option value="sub" selected>--choose one--</option>
            <option value="">Nyeri Town Constituency</option>
            <option value="">Mukurweini Constituency</option>
            <option value="">Othaya Constituency</option>
            <option value="">Mathira Constituency</option>
            <option value="">Kieni Constituency</option>
            <option value="">Tetu Constituency</option>
          </select>
          Start Date
          <input type="date" name="name">
          End Date
          <input type="date" name="name">
          Budget
          <input type="number" name="name" placeholder="Amount in KES">
          Financial Year
          <select>
            <option value="fyear" selected>-- choose one --</option>
            <option value="" disabled>2018/2019</option>
            <option value="" disabled>2019/2020</option>
            <option value="">2020/2021</option>
            <option value="">2021/2022</option>

          </select>
        </div>

        <input type="button" name="addproject" value="ADD PROJECT" class="btn-submit">
      </form>
    </div>
  </main>


    <!-- page footer -->
    <footer>
      <div>

      </div>
    </footer>
  </div>
  <!-- end of main content -->
  <script type="text/javascript" src="../js/scripts.js">

  </script>
</body>

</html>
