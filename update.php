<?php include 'config/config.php'; ?>

<?php

if (isset($_GET['upd'])) {
    $id=$_GET['upd'];

    $query = "SELECT * FROM users WHERE id = $id";
    $fire = mysqli_query($con, $query) or die ("data can not ready for update.".mysqli_error($con));
    $user = mysqli_fetch_assoc($fire);
}
 ?>

 <!-- Update Data -->
 <?php
    if (isset($_POST['btnupdate'])) {
          $fullname = $_POST['fullname'];
          $username = $_POST['username'];
          $email = $_POST['email'];
          $password = $_POST['password'];

          $query = "UPDATE users SET fullname ='$fullname', username='$username', email='$email', password='$password' WHERE id=$id";
          $fire = mysqli_query($con, $query) or die('data can not updated.'.mysqli_error($con));
          if ($fire) header("Location:index.php");
    }

  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	   <script type="text/javascript" src="js/bootstrap.js"></script>
    <title>Document</title>
  </head>
  <body>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- Signup Form -->
            <div class="col-lg-4 con-lg-offset-4">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th> <h3>Update Data</h3></th>
                    <th> <a href="index.php" class="btn btn-sm btn-success">Back To Home</a> </th>
                  </tr>
                </thead>
              </table>
              <hr>
              <form name="signup" id="signup" action=" <?php $_SERVER['PHP_SELF'] ?> " method="post">
                <div class="form-group">
                  <label for="fname">Fullname</label>
                  <input value="<?php echo $user['fullname']; ?>" id="fname" name="fullname" type="text" class="form-control" placeholder="fullname">
                </div>
                <div class="form-group">
                  <label for="uname">Username</label>
                  <input value="<?php echo $user['username']; ?>" id="uname" type="text" name="username" class="form-control" placeholder="username">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input value="<?php echo $user['email']; ?>" id="email" name="email" type="text" class="form-control" placeholder="email">
                </div>
                <div class="form-group">
                  <label for="pass">Phone</label>
                  <input id="pass" value="<?php echo $user['password']; ?>" type="text" name="password" class="form-control" placeholder="enter new phone">
                </div>
                <div class="form-group">
                  <button name="btnupdate" id="btnupdate" class="btn btn-primary btn-block ">Update</button>
                </div>
              </form>
            </div>
            <!-- End form -->
          </div>
        </div>
      </div>

  </body>
</html>
