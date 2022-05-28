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
        #c5 {
            width: 1000px;
            position: relative;
            left: 400px;


        }

        #c6 {
            font-size: 50px;
        }

        #c7 {
            background-color: rgb(215, 217, 235);
            height: 100vh;
           
            
           
        }
        #c8{
            position: relative;
            left: 1200px;
        }
    </style>

</head>

<body>
    <div id="c7">
        
        <?php include'partial/_dbconnect.php' ?>
        <?php include'partial/_header.php' ?>
       
        <div id="c5">
            
            <div class="container mt-5">
                <section class="u-align-left u-clearfix u-section-2" id="carousel_d140">
                    <div class="u-clearfix u-sheet u-valign-bottom-md u-valign-bottom-sm u-valign-bottom-xs u-sheet-1">
                        
                        <blockquote
                            class="u-border-20 u-border-palette-4-base u-custom-font u-font-montserrat u-text u-text-default u-text-1 fw-bold"
                            id="c6">About Work</blockquote>
                            
                        <p class="u-custom-font u-font-montserrat u-text u-text-2 fs-3">An Internet forum, or message board, is an online discussion site where people can hold conversations in the form of posted messages. They differ from chat rooms in that messages are often longer than one line of text, and are at least temporarily archived.<br>
                            <br>
                            <span style="font-weight: 700;">A website that provides an online exchange of information between people about a particular topic.</span>
                        </p>
                        <img class="u-image u-image-contain u-image-default u-image-1" id="c8" src="f2.jpg" alt=""
                            data-image-width="10000" data-image-height="990">
                    </div>
                </section>
            </div>
        </div>
        <?php include'partial/_footer.php'?>
    </div>
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