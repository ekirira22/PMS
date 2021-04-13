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

  <title>Dashboard - Admin</title>
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
      <div class="search-wrapper">
        <span class="ti-search"></span>
        <input type="search" placeholder="search">
      </div>
      <div>
        <span>Administrator Page</span>
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
      <h2 class="dash-title">Dashboard</h2>
      <!-- First Row -->
      <div class="dash-cards">
        <!-- dashboard card 1 -->
        <div class="card-single">
          <div class="card-body">
            <span class="ti-briefcase"></span>
            <div>
              <h5>All Projects</h5>
              <h4>100</h4>
            </div>
          </div>
          <div class="card-footer">
            <a href="#">View All</a>
          </div>
        </div>

        <!-- dashboard card 2 -->
        <div class="card-single">
          <div class="card-body">
            <span class="ti-light-bulb"></span>
            <div>
              <h5>Completed Projects</h5>
              <h4>60</h4>
            </div>
          </div>
          <div class="card-footer">
            <a href="#">View All</a>
          </div>
        </div>

        <!-- dashboard card 3 -->
        <div class="card-single">
          <div class="card-body">
            <span class="ti-car"></span>
            <div>
              <h5>Ongoing Projects</h5>
              <h4>20</h4>
            </div>
          </div>
          <div class="card-footer">
            <a href="#">View All</a>
          </div>
        </div>
      </div>
      <br>
      <!-- Second Row -->
      <div class="dash-cards">
        <!-- dashboard card 4 -->
        <div class="card-single">
          <div class="card-body">
            <span class="ti-check-box"></span>
            <div>
              <h5>Approved Projects</h5>
              <h4>10</h4>
            </div>
          </div>
          <div class="card-footer">
            <a href="#">View All</a>
          </div>
        </div>

        <!-- dashboard card 5 -->
        <div class="card-single">
          <div class="card-body">
            <span class="ti-reload"></span>
            <div>
              <h5>Pending Projects</h5>
              <h4>5</h4>
            </div>
          </div>
          <div class="card-footer">
            <a href="#">View All</a>
          </div>
        </div>

        <!-- dashboard card 6 -->
        <div class="card-single">
          <div class="card-body">
            <span class="ti-trash"></span>
            <div>
              <h5>Delayed Projects</h5>
              <h4>5</h4>
            </div>
          </div>
          <div class="card-footer">
            <a href="#">View All</a>
          </div>
        </div>
      </div>


      <!-- end of dash cards -->

      <section class="recent">
          <!-- activity section -->
          <div class="activity-card">
            <h3>Recent Activity</h3>
            <!-- tables where we will display recent projects -->
            <div class="table-responsive">
              <table>
                <thead>
                  <tr>
                    <th>Project</th>
                    <th>Department</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Budget</th>
                    <th>Status</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>App Development</td>
                    <td>Programming Dept</td>
                    <td>15 Aug, 2020</td>
                    <td>22 Aug, 2020</td>
                    <td>KES 1,000,0000</td>
                    <td>
                      <span class="badge success">Success</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Logo Design</td>
                    <td>Graphic Design Dept</td>
                    <td>15 Aug, 2020</td>
                    <td>22 Aug, 2020</td>
                    <td>KES 500,000</td>
                    <td>
                      <span class="badge warning">Processing</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Server setup</td>
                    <td>Database Dept</td>
                    <td>15 Aug, 2020</td>
                    <td>22 Aug, 2020</td>
                    <td>KES 200,000</td>
                    <td>
                      <span class="badge success">Success</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Front-end Design</td>
                    <td>Graphic Design Dept</td>
                    <td>15 Aug, 2020</td>
                    <td>22 Aug, 2020</td>
                    <td>KES 100,000</td>
                    <td>
                      <span class="badge warning">Processing</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Web Development</td>
                    <td>Programming Dept</td>
                    <td>15 Aug, 2020</td>
                    <td>22 Aug, 2020</td>
                    <td>KES 750,000</td>
                    <td>
                      <span class="badge success">Success</span>
                    </td>
                  </tr>

                </tbody>
              </table>
              <!-- End of Table -->
            </div>
          </div>

      </section>

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
