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
    <?php include 'dbconn.php';?>
    <?php include '_nav.php';?>
    <?php
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cat = $_POST['category_name'];
        $dsc = $_POST['category_description'];

        $sql = "INSERT INTO `categories` (`category_name`, `category_description`, `date`) VALUES ( '$cat', '$dsc', current_timestamp())";
        $result1 = mysqli_query($conn, $sql);

        if($result1){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your category has been added!
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
    <div class="container box1 mt-3">
    <div>
    <h3>Add new category</h3>
    <form action="" method="post">
            <div class="form-group">
                <label for="Input">Category name</label>
                <input type="text" class="form-control" name="category_name" aria-describedby="title">
            </div>
            <div class="form-group">
            <label>Category description</label>
            <textarea class="form-control" id="dsc" name="category_description" rows="3"></textarea>
        </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        </div>
    </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>