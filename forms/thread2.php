<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/thread.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>forms</title>
</head>

<body>
    <?php include 'dbconn.php'; 
    include '_nav.php';?>

    <?php  
    $id= $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id" ;
    $result = mysqli_query($conn, $sql);
    $noReslt= true;

    while ($row = mysqli_fetch_assoc($result)){
        $noReslt= false;
        $title= $row['thread_title'];
        $desc= $row['thread_desc'];
        $thread_user_id= $row['thread_user_id'];
        $sql2 ="SELECT * FROM `users` WHERE sno = '$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2= mysqli_fetch_assoc($result2);
        $posted_by= $row2['username']; 

    }
    ?>

    <!-- uesr AsQ  block/ display Quesions -->
    <div class="container mt-3">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title;?></h1>
            <p class="lead"><?php echo $desc;?></p>
            <hr class="my-4">
            <a> <b> Post by: <em><?php  echo $posted_by; ?></em></b></a>
        </div>

        <div class="container">
            <h1> Post a comment. </h1>
            <?php
            
        $method = $_SERVER['REQUEST_METHOD'];
        if($method== 'POST'){
            //insert comment intodb
        $comment = $_POST['comment'];
        $comment = str_replace("<", "&lt;", $comment);
        $comment = str_replace(">", "&gt;", $comment);
        $sno = $_POST['sno'];
        $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment', '$id', ' $sno', current_timestamp())" ;
        $result = mysqli_query($conn, $sql);
       
       if($result){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your Question has been added!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>';
      }
      else{
          // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
       </button>
     </div>';   
             
        }
        }
        ?>
            <!-- post / comment someone ans-->
           
            <?php
if(isset($_SESSION['loggedin'])  && $_SESSION['loggedin']=="true"){
           echo'<div class="container box1"> 
           <form action="" method="post">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Type your comment</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                    <input type="hidden" name="sno" value="' .$_SESSION["sno"]. '">
                </div>
                <button type="submit" class="btn btn-primary">POST</button>
            </form>
        </div>
        </div>';
}
else{
    echo'<div class="container">
    <p class="lead">You are not loged in</p>
    </div>';
}
?>

 <!-- display  / comment someone ans-->
            <div class="container">
                <h3>discussion</h3>
                <?php  
    $id= $_GET['threadid'];
    $noReslt= true;
    $sql = "SELECT * FROM `comments` WHERE thread_id=$id" ;
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)){
        $noReslt=false;
        $id= $row['comment_id'];
        $content= $row['comment_content'];
        $comment_time =$row['comment_time'];
        $comment_by = $row['comment_by'];
        $sql2 ="SELECT * FROM `users` WHERE sno = '$comment_by '";
        $result2 = mysqli_query($conn, $sql2);
        $row2= mysqli_fetch_assoc($result2);
  
 echo '<div class="container box2">
 <div class="media  mt-3">
  <img src="img/user.png" width="64px" class="mr-3" alt="...">
  <div class="media-body">
  <p class="font-weight-bold my-0 mt-0">Post BY: '. $row2['username'].' '. $comment_time .'</p>
   ' . $content . '  </div>
</div></div>';
}
// if not post comment show alert 
// echo var_dump($noReslt);
if($noReslt){
    echo '<div class="alert alert-danger" role="alert">
    no Questions found — Be the first person to ask a Questions !
  </div>' ;
}
?>


                <script src="js/jquery.js"></script>
                <script src="js/bootstrap.min.js"></script>
</body>

</html>