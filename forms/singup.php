
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/singup.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>forms</title>
</head>

<body  class="bg">
    <?php include 'dbconn.php';?>
    <?php include '_nav.php';?>
    <div class="container-fluid ">
    <div class="row pt-3">
            <div class="left col-lg-5 col-md-6 col-12 ml-5">
               <h3>Join the Forum <br>community</h3>
              <p><img src="img/ask.png"> Get unstuck — ask a question</p> 
              <p id="unlock"><img src="img/unlocked.png"> Unlock new privileges like voting and commenting</p> 
              <p><img src="img/tag.png"> Save your favorite categories.</p> 
            </div>
            <div class="right col-lg-6 col-md-6 col-12">      
        <form action=" hendlelsinup.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">

            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
            </div>
            <button type="submit" class="btn btn-success">SignUp</button>
        </form>
        <p class="text-center"> Already have an account? <a href="login.php">Log in</a></p>
        </div>
      

    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>