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
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="../css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

  <title>Dashboard - Admin</title>
</head>

<body>
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
            <span>Home</span>
          </a>
        </li>
        <!-- item 2 -->
        <li>
          <a href="#">
            <span class="ti-face-smile"></span>
            <span>Team</span>
          </a>
        </li>
        <!-- item 3 -->
        <li>
          <a href="#">
            <span class="ti-agenda"></span>
            <span>Tasks</span>
          </a>
        </li>
        <!-- item 4 -->
        <li>
          <a href="#">
            <span class="ti-clipboard"></span>
            <span>Leaves</span>
          </a>
        </li>
        <!-- item 5 -->
        <li>
          <a href="#">
            <span class="ti-folder"></span>
            <span>Projects</span>
          </a>
        </li>
        <!-- item 6 -->
        <li>
          <a href="#">
            <span class="ti-time"></span>
            <span>Timesheet</span>
          </a>
        </li>
        <!-- item 7 -->
        <li>
          <a href="#">
            <span class="ti-book"></span>
            <span>Contacts</span>
          </a>
        </li>
        <!-- item 6 -->
        <li>
          <a href="#">
            <span class="ti-settings"></span>
            <span>Account</span>
          </a>
        </li>
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
        <!-- <span><a href="../db/logout.php?logout">LOGOUT</a></span> -->
        <div> <img src="../img/profile0.png" alt=""> </div> <!--can upload user's picture and append it here if time allows -->
      </div>
    </header>

    <!-- main body -->

    <main>
      <h2 class="dash-title">Overview</h2>

      <div class="dash-cards">
        <!-- dashboard card 1 -->
        <div class="card-single">
          <div class="card-body">
            <span class="ti-briefcase"></span>
            <div>
              <h5>Account Balance</h5>
              <h4>$30,014.68</h4>
            </div>
          </div>
          <div class="card-footer">
            <a href="#">View All</a>
          </div>
        </div>

        <!-- dashboard card 2 -->
        <div class="card-single">
          <div class="card-body">
            <span class="ti-reload"></span>
            <div>
              <h5>Pending</h5>
              <h4>$19,014.68</h4>
            </div>
          </div>
          <div class="card-footer">
            <a href="#">View All</a>
          </div>
        </div>

        <!-- dashboard card 3 -->
        <div class="card-single">
          <div class="card-body">
            <span class="ti-check-box"></span>
            <div>
              <h5>Processed</h5>
              <h4>$20,000.00</h4>
            </div>
          </div>
          <div class="card-footer">
            <a href="#">View All</a>
          </div>
        </div>
      </div>

      <!-- end of dash cards -->

      <section class="recent">
        <div class="activity-grid">
          <!-- activity section -->
          <div class="activity-card">
            <h3>Recent Activity</h3>
            <!-- tables where we will display recent projects -->
            <table>
              <thead>
                <tr>
                  <th>Project</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Team</th>
                  <th>Status</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>App Development</td>
                  <td>15 Aug, 2020</td>
                  <td>22 Aug, 2020</td>
                  <td class="td-team">
                    <div class="img-1"></div>
                    <div class="img-2"></div>
                    <div class="img-3"></div>
                  </td>
                  <td>
                    <span class="badge success">Success</span>
                  </td>
                </tr>
                <tr>
                  <td>Logo Design</td>
                  <td>15 Aug, 2020</td>
                  <td>22 Aug, 2020</td>
                  <td class="td-team">
                    <div class="img-1"></div>
                    <div class="img-2"></div>
                    <div class="img-3"></div>
                  </td>
                  <td>
                    <span class="badge warning">Processing</span>
                  </td>
                </tr>
                <tr>
                  <td>Server setup</td>
                  <td>15 Aug, 2020</td>
                  <td>22 Aug, 2020</td>
                  <td class="td-team">
                    <div class="img-1"></div>
                    <div class="img-2"></div>
                    <div class="img-3"></div>
                  </td>
                  <td>
                    <span class="badge success">Success</span>
                  </td>
                </tr>
                <tr>
                  <td>Front-end Design</td>
                  <td>15 Aug, 2020</td>
                  <td>22 Aug, 2020</td>
                  <td class="td-team">
                    <div class="img-1"></div>
                    <div class="img-2"></div>
                    <div class="img-3"></div>
                  </td>
                  <td>
                    <span class="badge warning">Processing</span>
                  </td>
                </tr>
                <tr>
                  <td>Web Development</td>
                  <td>15 Aug, 2020</td>
                  <td>22 Aug, 2020</td>
                  <td class="td-team">
                    <div class="img-1"></div>
                    <div class="img-2"></div>
                    <div class="img-3"></div>
                  </td>
                  <td>
                    <span class="badge success">Success</span>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>

          <!-- summary section-->

          <div class="summary">
            <!-- part 1 of summary card -->
            <div class="summary-card">
              <!-- card 1 -->
              <div class="summary-single">
                <span class="ti-id-badge"></span>
                <div>
                  <h5>196</h5>
                  <small>Number of staff</small>
                </div>
              </div>
              <!-- card 2 -->
              <div class="summary-single">
                <span class="ti-calendar"></span>
                <div>
                  <h5>16</h5>
                  <small>Number of leave</small>
                </div>
              </div>
              <!-- card 3 -->
              <div class="summary-single">
                <span class="ti-face-smile"></span>
                <div>
                  <h5>12</h5>
                  <small>Profile update request</small>
                </div>
              </div>
            </div>
            <!-- part 2 of summary card -->

            <div class="bday-card">
              <div class="bday-flex">
                <div class="bday-img"></div>
                <div class="bday-info">
                  <h5>Margaret C. Nyawira</h5>
                  <small>Birthday Today</small>
                </div>
              </div>
              <div class="text-center">
                <button>
                  <span class="ti-gift"></span>
                  Wish Her
                </button>

              </div>
            </div>
          </div>
        </div>

      </section>

    </main>


    <!-- page footwr -->
    <footer>
      <div>

      </div>
    </footer>
  </div>
  <!-- end of main content -->

</body>

</html>
