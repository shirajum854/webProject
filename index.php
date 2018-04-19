<?php include 'config/config.php'; ?>

      <!-- Data insert  -->
<?php
  if ((isset($_POST['submit']))) {
    $fname=$_POST['fullname'];
    $uname=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['password'];

    $query = "INSERT INTO users(fullname, username, email, password) values('$fname','$uname', '$email', '$pass')";
    $fire = mysqli_query($con, $query) or die('Can not insert into database. '.mysqli_error($con));
    // if ($fire) echo "date(format)a submited success to database. ";
  }
 ?>

     <!-- Data delete  -->
 <?php
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $query =  "DELETE FROM users WHERE id = $id";
        $fire = mysqli_query($con, $query) or die("Data can not delete from the database.".mysqli_error($con));
        if($fire) echo "data delete successfuly from database";
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
            <!-- For show data here -->
            <div class="col-lg-8">
              <h3>User Data</h3>
              <hr>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                      </tr>
                    </thead>
                    <!-- table for show data -->
                    <tbody>
                      <?php
                        $query = "SELECT * FROM users";
                        $fire = mysqli_query($con, $query) or die('can not fetch data from database.'.mysqli_error($con));
                        if (mysqli_num_rows($fire)>0) {
                          while ($user=mysqli_fetch_assoc($fire)) { ?>

                            <tr>
                              <td><?php echo $user['id']; ?></td>
                              <td><?php echo $user['fullname']; ?></td>
                              <td><?php echo $user['username']; ?></td>
                              <td><?php echo $user['email']; ?></td>
                              <td><?php echo $user['password']; ?></td>
                              <td>
                                <a href="<?php $_SERVER['PHP_SELF'] ?>?del=<?php echo $user['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                              </td>
                              <td>
                                <a class="btn btn-sm btn-warning" href="update.php?upd=<?php echo $user['id']?>" >Update</a>
                              </td>
                            </tr>

                        <?php
                          }
                        }
                       ?>
                    </tbody>
                  </table>
            </div>
            <!-- end database div -->

            <!-- Signup Form -->
            <div class="col-lg-4">
              <h3>Signup</h3>
              <hr>
              <form name="signup" id="signup" action=" <?php $_SERVER['PHP_SELF'] ?> " method="post">
                <div class="form-group">
                  <label for="fname">Fullname</label>
                  <input id="fname" name="fullname" type="text" class="form-control" placeholder="fullname" required>
                </div>
                <div class="form-group">
                  <label for="uname">Username</label>
                  <input id="uname" type="text" name="username" class="form-control" placeholder="username" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" name="email" type="email" class="form-control" placeholder="email" required>
                </div>
                <div class="form-group">
                  <label for="pass">Phone</label>
                  <input id="pass" type="text" name="password" class="form-control" placeholder="phone" required>
                </div>
                <div class="form-group">
                  <button name="submit" id="submit" class="btn btn-primary btn-block ">Sign Up</button>
                </div>
              </form>
            </div>
            <!-- End form -->
          </div>
        </div>
      </div>

  </body>
</html>
