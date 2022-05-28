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
    #c2{
        background-color:rgb(214, 233, 233)
    }
</style>

</head>

<body>
    <?php include'partial/_dbconnect.php' ?>
    <?php include'partial/_header.php' ?>
    <?php  

$id=$_GET['threadid'];
$sql="SELECT * FROM `thread` WHERE thread_id=$id;";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
 $title=$row['thread_title'];    
 $desc=$row['thread_description'];
 $thread_user_id= $row['thread_user_id']; 
 $sql2="SELECT user_email FROM `users` WHERE sno='$thread_user_id'";  
 $result2=mysqli_query($conn,$sql2);
 $row2=mysqli_fetch_assoc($result2);
 $posted_by=$row2['user_email'];
    
    
}
    ?>

    <?php
         $showAlert=false;
        $method=$_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
            $comment=$_POST['comment'];
            $comment = str_replace("<", "&lt;", $comment);
            $comment = str_replace(">", "&gt;", $comment); 
            $sno = $_POST['sno']; 
            $sql="INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment', '$id', '$sno', current_timestamp())";
            $result=mysqli_query($conn,$sql);
            $showAlert=true;
            if($showAlert){
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your Comment has been Added! 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

            }

        }
    ?>

    <div class="container mt-0" id="c2">
        <div class="jumbotron p-3">
            <h1 class="display-4 fw-bold "> <?php echo $title ?></h1>
            <p class="lead "><?php echo $desc ?></p>
            <hr class="my-4">
            <p>This Forum is Used to solve Problem's and connect eachother.No Spam / Advertising / Self-promote in the
                forums. ...
                Do not post copyright-infringing material. ...
                Do not post “offensive” posts, links or images. ...
                Do not cross post questions. ...
                Do not PM users asking for help. ...
                Remain respectful of other members at all times</p>
            <p>Posted By:<em><?php echo $posted_by ?></em></p>
        </div>
    </div>
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo'<div class="container">
        <h1 class="py-3">Post a Comment</h1>
        <form action="'. $_SERVER["REQUEST_URI"] .'" method="post">

            <div class=" form-group">
                <label for="exampleFormControlTextarea1">Post Comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                </div>
                <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
                <button type="submit" class="btn btn-success my-2">Post Comment</button>
        </form>
    </div>';
}
else{
    echo '<div class="container">
    <div class="alert alert-success my-2" role="alert">
    <h4 class="alert-heading">You are Not logged in</h4>
    <p>Please Login to post the comment</p>
    <hr>
    <p class="mb-0">You can login from Login Button</p>
  </div>
  </div>';
}
?>
    <div class="container">
        <h1 class="py-3">Discussions</h1>
        <?php  

$id=$_GET['threadid'];
$sql="SELECT * FROM `comments` WHERE thread_id=$id";
$result=mysqli_query($conn,$sql);
$noResult=true;
while($row=mysqli_fetch_assoc($result)){
    $noResult=false;
 $id=$row['comment_id'];    
 $content=$row['comment_content'];    
 $ctime=$row['comment_time']; 
 $thread_user_id= $row['comment_by'];
 $sql2="SELECT user_email FROM `users` WHERE sno='$thread_user_id'";  
 $result2=mysqli_query($conn,$sql2);
 $row2=mysqli_fetch_assoc($result2);
 $user_email=$row2['user_email'];   
 
     

    echo ' <div class="media my-3 mb-5">
                  <div class="media-body">
                      <img class="mr-3" src="userdf.jpg" width=54px alt="Generic placeholder image">
                       <p class="d-inline my-0 fw-bold">'.$user_email.' at '. $ctime .'</p>    
                      <div class="container">
                         <p class="mt-0 mx-5 my-0">'. $content .'</p>
                       </div>
                    </div>
            </div>';
}

//echo var_dump($noResult);

if($noResult){
    echo '<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">No comments Found!</h4>
    <p>Be the first person to post the comment</p>
    
  </div>';
    
}
        ?>




        <!-- <div class="media my-3">
            <img class="mr-3" src="userdf.jpg" width=54px alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0">Unable to Install Vscode</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus
                odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
                fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
    </div> -->

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