<?php
  define("HOSTNAME", "localhost");
  define("USERNAME", "root");
  define("PASSWORD", "");
  define("DBNAME", "hostel");
  $con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME) or die("can not connect with database");
 ?>
