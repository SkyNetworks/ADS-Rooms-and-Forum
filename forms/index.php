<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>forum</title>
</head>

<body>
    <?php include 'dbconn.php';?>
    <?php include '_nav.php';?>
    <div class="container my-3">
        <div class="row align-items-start">

            <?php 

                $sql = "SELECT * FROM `categories`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)){
                 $id= $row['category_id'];
                $cat= $row['category_name'];
                $dsc= $row['category_description'];                 

   echo '<div class="col-md-4 my-2">
                   <div class="card" style="width: 18rem;">
                   
                    <div class="card-body">
                        <h5 class="card-title"> <a href="threads.php?catid=' . $id . '">'. $cat . '</a></h5>
                        <p class="card-text">'. substr($dsc,0, 100) .'.....</p>
                        <a href="threads.php?catid=' . $id . '" class="btn btn-primary">View</a>
                    </div>
    
                </div>
    </div>';
                } 
           ?>

            <div class="container-fluid mt-3 text-center bg-dark">
                <p class="text-muted">Copyright &copy;2020, <a>Crush</a></p>
            </div>
            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.min.js"></script>

</body>

</html>