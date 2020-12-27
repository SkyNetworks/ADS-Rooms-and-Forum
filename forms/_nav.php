<?php
 session_start();
echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="index.php">iDiscuss</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="index.php?Home">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Top categories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

        $sql="SELECT category_name, category_id FROM `categories` LIMIT 5";
        $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)){
       echo '<a class="dropdown-item" href="threads.php?catid=' .$row['category_id']. ' ">' .$row['category_name']. '</a>';
    }
        
    echo'  </div>
    </li>
  </ul>';
  if(isset($_SESSION['loggedin'])  && $_SESSION['loggedin']=="true"){
    echo'<form class="d-flex" method ="get" action="search.php">
     <input class="form-control my-2 mr-3" name="search" type="search" placeholder="Search" aria-label="Search">
     <button class="btn btn-outline-success my-2 mr-3" type="submit">Search</button>
     <p class="text-center mt-2"> '.$_SESSION['username'].'</p>
     <a href="logout.php"><button  type="button" class="btn btn-outline-danger my-2 ml-2"  data-toggle="modal" data-target="#exampleModal">
    Logout
  </button></a></form>';
 }
else{
  echo'
  <form class="form-inline my-2 my-lg-0"method ="get" action="search.php">
    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> </form>

    <a href="login.php"><button  type="button" class="btn btn-outline-success ml-2"  data-toggle="modal" data-target="#exampleModal">
    Login
  </button></a>
  <a href="singup.php"><button  type="button" class="btn btn-outline-success ml-2"  data-toggle="modal" data-target="#exampleModal">
  Singup
</button></a>';
}
echo'
</div>
</nav>';   
?>