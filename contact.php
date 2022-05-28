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
    #c4{
       position: relative; 
        left: 400px;
    }
</style>
</head>

<body>
    <?php include'partial/_dbconnect.php' ?>
    <?php include'partial/_header.php' ?>
    <?php
         $showAlert=false;
        $method=$_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $subject=$_POST['subject'];
            $message=$_POST['message'];
            
            $sql="INSERT INTO `contact` (`name`, `email`, `subject`, `message`, `timestamp`) VALUES ('$name', '$email', '$subject', '$message', current_timestamp())";
            $result=mysqli_query($conn,$sql);
            $showAlert=true;
           

            if($showAlert){
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your Form has been Submitted! Please wait for Response.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';

            }

        }

        
    ?>
 
        <div class="container">

            <!--Section: Contact v.2-->
            <section class="mb-0">

                <!--Section heading-->

                <h1 class="h1-responsive font-weight-bold py-5" id="c4">Contact us</h1>

                <!--Section description-->
                <p class="text-center w-responsive mx-auto mb-5 fs-3">Do you have any questions? Please do not hesitate
                    to contact us directly. Our team will come back to you within
                    a matter of hours to help you.</p>

                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-9 mb-md-0 mb-5">
                        <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>" id="contact-form"
                            name="contact-form">

                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="text" id="name" name="name" class="form-control">
                                        <label for="exampleInputEmail1" class="">Your name</label>
                                    </div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="text" id="email" name="email" class="form-control">
                                        <label for="exampleInputEmail1" class="">Your email</label>
                                    </div>
                                </div>
                                <!--Grid column-->

                            </div>
                            <!--Grid row-->

                            <!--Grid row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form mb-0">
                                        <input type="text" id="subject" name="subject" class="form-control">
                                        <label for="exampleFormControlTextarea1" class="">Subject</label>
                                    </div>
                                </div>
                            </div>
                            <!--Grid row-->

                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-12">

                                    <div class="md-form">
                                        <textarea type="text" id="message" name="message" rows="2"
                                            class="form-control md-textarea"></textarea>
                                        <label for="exampleFormControlTextarea1">Your message</label>
                                    </div>

                                </div>
                            </div>
                            <!--Grid row-->


                            <div class="text-center text-md-left">
                                <button type="submit" class="btn btn-success my-2">Submit</button>
                            </div>

                        </form>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-3 text-center">
                        <ul class="list-unstyled mb-0">
                            <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                <p>New Delhi, DA 110068, IND</p>
                            </li>

                            <li><i class="fas fa-phone mt-4 fa-2x"></i>
                                <p>+ 91 234 567 89</p>
                            </li>

                            <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                                <p>contact@mdbootstrap.com</p>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                </div>
          
        </section>
            <!--Section: Contact v.2-->
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