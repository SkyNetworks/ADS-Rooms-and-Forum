<!doctype html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/thread.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>forms</title>
</head>

<body>
    <?php include 'dbconn.php';
     include '_nav.php';?>
    <?php  
    $id= $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id=$id" ;
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)){
        $catname= $row['category_name'];
        $catdesc= $row['category_description'];

    }
    ?>
    <!-- first block/welcome-->
    <div class="container mt-3 ">
        <div class="jumbotron ">
            <h1 class="display-4">Welcome!</h1>
            <p class="lead"><?php echo $catname;?></p>
            <hr class="my-4">
            <p><?php  echo $catdesc;?></p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
    
    <?php
        $method = $_SERVER['REQUEST_METHOD'];
        if($method== 'POST'){
            //insert intodb
        $th_title = $_POST['title'];
        $th_desc =$_POST['desc'];

        $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title);

        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc);

        $sno = $_POST['sno'];
        $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`) VALUES ( '$th_title', '$th_desc', '$id', '$sno')" ;
        $result = mysqli_query($conn, $sql);
       
       if($result){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your Question has been added! please wait for someone respond.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>';
      }
      else{
         //  echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
      </button>
    </div>';   
             
        }
        }
    ?>
    
        <!-- ask question/ user block-->
 <?PHP
        if(isset($_SESSION['loggedin'])  && $_SESSION['loggedin']=="true"){
        //if user is loged in //
       echo'<div class="container"> 
       <div class="box1">
        <h3>Ask a Questions</h3>
        <form action=" " method="POST">
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
    </div>
    </div>
        </div>';
    }
        //  if user not logeed in /
            else{
             echo'<div class="container">
               <h3>Ask a Questions</h3>
           <p class="lead">You are not loged in</p>
              </div>';
             }  
              ?>     
        <!-- fatch user QUESTIONS -->
 <div class="container mt-4">
    <h3>Start the discussion</h3>
            <?php  
    $id= $_GET['catid'];
    $noReslt= true;
    $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id" ;
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)){
        $noReslt=false;
        $id= $row['thread_id'];
        $title= $row['thread_title'];
        $desc= $row['thread_desc'];
        $thread_time = $row['thread_time'];
        $thread_user_id = $row['thread_user_id'];
        $sql2 ="SELECT * FROM `users` WHERE sno = '$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2= mysqli_fetch_assoc($result2);
        
  
     echo '<div class="media box2">
     <img src="img/user.png" width="64px" class="mr-3" alt="...">
     <div class="media-body">'.' <h5 class="mt-0"><a  href="thread2.php?threadid='. $id .'"> ' . $title .'</a></h5>
    ' .substr($desc,1, 100)  .' </div>'.'<p class="font-weight-bold my-0 ">Ask BY: '. $row2['username'].' at '. $thread_time .'</p>'.'
    </div>';
}

     // if not ask/post questtion show alert   
    //echo var_dump($noReslt);
        if($noReslt){
       echo '<div class="alert alert-danger" role="alert">
        no Questions found — Be the first person to ask a Questions !
       </div>' ;}
 ?>



            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.min.js"></script>
</body>

</html>