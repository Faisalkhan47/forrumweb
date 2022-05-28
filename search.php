<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>iDiscuss Forum</title>

    <style>
    #c3 {
        background-color: rgb(237, 230, 234);
    }
    </style>
</head>

<body>
    <?php include'partial/_dbconnect.php' ?>
    <?php include'partial/_header.php' ?>
   

    <div class="container my-3" id="maincontainer">
        <h1>Search Results for <em>"<?php echo $_GET['search'] ?>"</em></h1>
        <?php
         $noresults = true;
        $query =$_GET["search"];
$sql="SELECT * FROM `thread` WHERE match(thread_title,thread_description) against ('$query')";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
 $title=$row['thread_title'];    
 $desc=$row['thread_description'];
 $thread_id=$row['thread_id'];
 $url="thread.php?threadid=".$thread_id;
 $noresults = false;
 echo '<div class="result">
 <h3><a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
 <p>'.$desc.'</p>
</div>';

}
if($noresults){
  echo '<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">No Results Found!</h4>
  <p><ul>
       <li>Make sure that all words are spelled correctly.</li>
       <li>Try different keywords.</li>
       <li>Try more general keywords.</li>

  </ul></p>
  
</div>';
}

 ?>
        
    </div>
    <?php include'partial/_footer.php'?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>