<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>forms</title>
</head>

<body class="bg">
    <?php include 'dbconn.php';?>
   
    <?php
    $showError =false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];

        // insert into db new password
        $query = "UPDATE `users` SET `password` = '$password' WHERE `username`= '$username'";

        $result = mysqli_query($conn, $query);
       if ($result){
           header("location: login.php?Success=password change");
           exit();
           
        }
            else{
                $showError = " not change";
            }
    }
  ?>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-users-cog"> Change pa</i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container">
        <form action="" method="POST">
            <div class="form-group">
                <label for="username"> Username </label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">

            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" class="form-control" id="password" name="password">
           </div>  
           <button type="submit" name="submit" class="btn btn-success">Change password</button>
        </form>
        </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <!-- <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
           
<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>

