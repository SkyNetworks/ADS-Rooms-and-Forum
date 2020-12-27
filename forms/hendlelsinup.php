<?php 

//include 'singup.php';
$showerror = "false";
$showAlert = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'dbconn.php';
    $username = $_POST['username'];
    $pss = $_POST['password'];
    $cpss = $_POST['cpassword'];
    //if user already exists
    $existsql= "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $existsql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
      $showError = "username already in use";
    }
    //$exists=true;
    if(($pss == $cpss) && $numRows==false){
        $sql = "INSERT INTO `users` ( `username`, `password`, `user_time`) VALUES ('$username', '$pss', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
            header("location: login.php?singupsuccess=true");
            exit();
        }
    }
    
    else{
        $showerror = "Passwords do not match";
    }
    header("location: index.php?singupsuccess=false&error=' . $showerror . '");
}

?>