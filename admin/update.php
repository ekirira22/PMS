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

//to populate data on project title

$query = "CALL `getProjectDetails`()";
$results = mysqli_query($db, $query);

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
  <link href="../css/styles.css" rel="stylesheet" />
  <title>MANAGE PROJECT</title>

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
              <a href="add.php">Add Project</a> <br>
              <a href="update.php">Manage Project</a> <br>
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
        &nbsp;Update or Delete Project
      </div>
      <div class="header-right">
        <span><?php echo "Welcome " . $logged_user['staff_name']; ?></span>
        <div> <img src="../img/profile0.png" alt=""> </div> <!--can upload user's picture and append it here if time allows -->
      </div>
    </header>

    <!-- main body -->

    <main>

      <section class="recent">
          <!-- activity section -->
          <div class="activity-card">
            <h3>Pending Projects</h3>
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
                    <th>F. Year</th>
                    <th>Status</th>
                    <th>Edit</th>

                    <th>Delete</th>

                  </tr>
                </thead>

                <tbody>
                  <?php
                    while($rows=mysqli_fetch_array($results)){
                  ?>
                    <tr>
                      <td> <?php echo $rows['project_name'] ?> </td>
                      <td> <?php echo $rows['dep_name'] ?> </td>
                      <td> <?php echo $rows['start_date'] ?> </td>
                      <td> <?php echo $rows['end_date'] ?> </td>
                      <td> <?php echo "KES ".$rows['budget'] ?> </td>
                      <td> <?php echo $rows['year_name'] ?> </td>
                      <td> <?php if($rows['status'] == "pending"){
                        echo "<span class='badge warning'>" . $rows['status'] . "</span>";
                      }else if($rows['status'] == "complete"){
                        echo "<span class='badge success'>" . $rows['status'] . "</span>";
                      } ?> </td>

                      <?php echo "<td>"; ?>
                         <?php if($rows['status'] == "pending"){ ?>
                        <a href="edit.php?id=<?php echo $rows['project_id'] ?>"> <button type='button' class='btn-edit'> Edit </button></a>
                      <?php } ?>
                        <?php echo "</td>"; ?>


                        <?php echo "<td>"; ?>
                           <?php if($rows['status'] == "pending"){ ?>
                          <a href="delete.php?id=<?php echo $rows['project_id'] ?>"> <button type='button' class='btn-delete'> Delete </button></a>
                        <?php } ?>
                          <?php echo "</td>"; ?>

                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- End of Table -->
            </div>
          </div>

      </section>

    </main>

  <!-- end of main content -->
  <script type="text/javascript" src="../js/scripts.js">

  </script>
</body>

</html>
