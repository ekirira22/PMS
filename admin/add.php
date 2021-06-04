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
  <title>ADD PROJECT</title>

  <link rel="stylesheet" href="../css/forms.css">
</head>

<body>
  <div class="sidebar">
    <!-- menu header -->
    <div class="sidebar-header">
      <h3 class="brand">
        <span>Nyeri County PMS</span>
      </h3>
    </div>

    <!-- menu body -->
    <div class="sidebar-menu">
      <ul>
        <!-- item 1 -->
        <li>
          <a href="admin.php">
            <span>Dashboard</span>
          </a>
        </li>
        <!-- item 2 -->
        <li>
            <span>Staff</span>
            <div>
              <a href="#">Add Employee</a> <br>
              <a href="#">Manage Employees</a>
            </div>
        </li>
        <!-- item 3 -->
        <li>
            <span>Work Flow</span>
            <div>
              <a href="#">Check Projects</a> <br>
              <a href="#">Approve/Decline Projects</a> <br>
            </div>
        </li>
      <!-- item 4 -->
        <li>
            <span>Projects & Tasks</span>
            <div>
              <a href="./add.php">Add Project</a> <br>
              <a href="#">Manage Project</a> <br>
              <a href="#">Add Tasks</a> <br>
              <a href="#">Manage Tasks</a>
            </div>
        </li>
        <!-- item 5 -->
        <li>
          <a href="#">
            <span>Reports</span>
          </a>
        </li>
        <!-- item 6 -->
        <li>
            <span>Settings</span>
            <div>
              <a href="#">Change Password</a> <br>
              <a href="#">Change Profile Picture</a>
            </div>
        </li>
        <!-- item 7 -->
        <li>
          <a href="../db/logout.php?logout">
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
      <div class="header-right">
        <span><?php echo "Welcome " . $logged_user['staff_name']; ?></span>
        <div> <img src="../img/profile0.png" alt=""> </div> <!--can upload user's picture and append it here if time allows -->
      </div>
    </header>

    <!-- main body -->

  <main>
    <?php echo display_error();?> <br>
    <?php echo display_success();?>
    <div class="main-block">
      <form action="./add.php" method="POST">

        <div class="title">
          <h2>Add Project Definition</h2>
        </div>
        <div class="info">
          Project Title
          <input type="text" name="pname">
          Department
          <select name="dept">
            <option value="" selected>-- choose one --</option>
            <option value="1000">Internet and Future Technology</option>
            <option value="1001">Finance and Economic Planning</option>
            <option value="1002">Agriculture, Livestock & Fisheries</option>
            <option value="1003">County Public Service & Solid Waste Management</option>
            <option value="1004">Health Services</option>
            <option value="1005">Transport, Public Works, Infrastructure & Energy</option>
            <option value="1006">Land, Housing ad Urban Development</option>
            <option value="1007">Water, Irrigation, Environment and Climate Change</option>
            <option value="1008">Gender, Youth and Social Services</option>
            <option value="1009">Trade, Tourism, Culture and Cooperative Development</option>
          </select>
          Sub-County/Constituency
          <select name="sub">
            <option value="" selected>--choose one--</option>
            <option value="nyeri">Nyeri Town Constituency</option>
            <option value="muk">Mukurweini Constituency</option>
            <option value="othaya">Othaya Constituency</option>
            <option value="mathira">Mathira Constituency</option>
            <option value="keini">Kieni Constituency</option>
            <option value="tetu">Tetu Constituency</option>
          </select>
          Start Date
          <input type="date" name="start">
          End Date
          <input type="date" name="end">
          Budget
          <input type="number" name="budget" placeholder="Amount in KES">
          Financial Year
          <select name="fyear">
            <option value="" selected>-- choose one --</option>
            <option value="1" disabled>2018/2019</option>
            <option value="2" disabled>2019/2020</option>
            <option value="3">2020/2021</option>
            <option value="4">2021/2022</option>
          </select>
        </div>

        <input type="submit" name="addproject" value="ADD PROJECT" class="btn-submit">
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
