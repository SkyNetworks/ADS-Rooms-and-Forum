<?php 
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconn.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
      $sql = "Select * from `users` where username='$username' AND password='$password'";
      $result = mysqli_query($conn, $sql);
       $num = mysqli_num_rows($result);
       $row= mysqli_fetch_assoc($result);
       if ($num == 1){
          $login = true;
           session_start();
           $_SESSION['loggedin'] = true;
           $_SESSION['sno'] = $row['sno'];
           $_SESSION['username'] = $username;
          //echo "sucess";
          header("location: index.php?loginsuccess= $username ");
          exit();
   
      } 
       else{
          $showError = "Invalid Credentials /password not match ";
      }  
}
?>

   