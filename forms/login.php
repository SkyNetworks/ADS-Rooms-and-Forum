<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>forms</title>
</head>

<body class="bg">
    <?php include 'dbconn.php';?>
    <?php include '_nav.php';?>
    <?php
    //siggup alert show
   include 'hendlelsinup.php'; 

 if(isset($_GET['singupsuccess'])  && $_GET['singupsuccess']=="true"){
  echo' <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You can now login.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
 </div>';
 }
 if(isset($_GET['singupsuccess'])  && $_GET['singupsuccess']=="false"){
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error!</strong> Password do not match
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
 </div> ';
  }
  ?>
  
        <div class="box">
        <form action="_loginhandel.php" method="POST">
            <div class="form-group">
                <label for="username"> Username </label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">

            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
           </div>  
           <button type="submit" class="btn btn-success">Login</button>
           <a style="color:blue"; data-toggle="modal" data-target="#exampleModal">Change password</a>
        </form>
        </div>
 <div class="container text-center">
     <h5>Don’t have an account? <a href="singup.php">Sign up</a></h5>
 </div>
 <?php include 'chng_pswd.php';?>
<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>

