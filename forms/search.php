</html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>forms</title>
</head>
<body>
    <?php include 'dbconn.php';?>
    <?php include '_nav.php';?>
    
   <!-- search result-->
<div class="container">
<h1>search result for <em>"<?php echo $_GET['search']?>"</em> </h1>

<?php 
    $noresult= true;
     $query=$_GET["search"];
     $sql = "SELECT * FROM `threads` WHERE MATCH ( thread_title, thread_desc) against (' $query') " ;
     $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)){
        $title= $row['thread_title'];
        $desc= $row['thread_desc'];
        $thread_id= $row['thread_id'];
        $thread_id= $row['thread_id'];
        $url = "thread2.php?threadid=".$thread_id;
        $noresult= false;

        echo '<div class="result">
        <h3> <a href=" '  . $url .' " class="text-dark">' . $title . '</a></h3>
        <p class="">' . $desc .  '</p>
      </div>';

    }
    if($noresult){
        echo ' <div class="container mt-4">
        <h3>No result found!</h3>
            <div class="alert alert-danger" role="alert">
            Suggestions:<ul>
            <li>Make sure that all words are spelled correctly.</li>
            <li> Try different keywords.</li>
            <li>Try more general keywords.</li> 
            </ul>           
      </div>';
    
    
    }
    ?>



</div>
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>