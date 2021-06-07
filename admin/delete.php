<?php
  include '../db/functions.php';

  $pid = $_GET['id'];

  if($pid){

    mysqli_query($db,"DELETE FROM `t_projects` WHERE `project_id` = $pid");
  }
 ?>

 <script type="text/javascript">
   window.location = "update.php"
 </script>
