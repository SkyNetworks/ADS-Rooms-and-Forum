if(isset($_SESSION['loggedin'])  && $_SESSION['loggedin']=="true"){
       echo'<form class="d-flex">
        <input class="form-control mr-3" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success mr-3" type="submit">Search</button>
        <p class="text-center mt-2"> '.$_SESSION['username'].'</p></form>';
    }
else







$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconn.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
    $sql = "Select * from `users` where username='$username'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows == 1){
          $row= mysqli_fetch_assoc($result){
              if(password_verify( $password,$_row['password'] )){
                session_start();
                    $_SESSION['loggedin']= true;
                    $_SESSION['loggedin']= $username ;
                    echo="loged in";
                    header("location: index.php?succes=$username");

              }
              else{
                  echo "unable to login";
              }
          }
    }
     
    
}

<a href="login.php"><button  type="button" class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#loginmodel">
    Login
   </button></a>  


   if(isset($_GET['singupsuccess'])  && $_GET['singupsuccess']=="true"){
  echo' <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You can now login.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
 </div>';
 }
 if(isset($_GET['singupsuccess'])  && $_GET['singupsuccess']=="false"){
  echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> Password do not match
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
  </div> ';
  }

  if($pss == $cpss){
              $hash  = password_hash($pss, PASSWORD_DEFAULT);
               $sql = "INSERT INTO `users` ( `username`, `password`, `user_time`) VALUES ( '$username', ' $hash', current_timestamp())";
               $result = mysqli_query($conn, $sql);
               if($result){
                   $showAlert = true; 
                   header("location: index.php?singupsuccess=true");
                   exit();
               }

               else{
        if(($pass == $cpss){
            $sql = "INSERT INTO `users` ( `username`, `password`, `user_time`) VALUES ( '$username', ' $pass', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $showAlert = true;
                header("location: index.php?singupsuccess=true");
            exit();
            }
           else{
            $showError = "password do not match";
           }
          
           header("location: index.php?singupsuccess=false&error=$showerror");
       } 
} 
if(($pss == $cpss) {
       $sql= "INSERT INTO `users` (`username`, `password`, `user_time`) VALUES ('$username', '$pss', current_timestamp());"
       $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
            header("location: index.php?singupsuccess=true");
        }
    }




    //login alert show
  include '_loginhandel.php'; 
  if(isset($_GET['loginsuccess'])  && $_GET['loginsuccess']=="true"){
    echo' <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Welcome!</strong> You are login.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
   </div>';
   }
   if(isset($_GET['loginsuccess'])  && $_GET['loginsuccess']=="false"){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Password do not match
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    

    Access forbidden!
You don't have permission to access the requested object. It is either read-protected or not readable by the server.

If you think this is a server error, please contact the webmaster

Error 403

if(isset($_SESSION['loggedin'])  && $_SESSION['loggedin']=="true"){
        //if user is loged in //
       echo' <div class="container">
        <h3>Ask a Questions</h3>
        <form action="<?php echo $_SERVER["REQUEST_URI"]?> " method="post">
            <div class="form-group">
                <label for="Input">Problem title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
                <small class="form-text text-muted">write a short title</small>
            </div>
            <input type="hidden" name="sno" value="' .$_SESSION["sno"]. '">
            <div class="form-group">
            <label>Post Question</label>
            <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
        </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        </div>';}
        
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