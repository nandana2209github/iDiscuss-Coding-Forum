<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <!-- <style>
    #ques {
        min-height: 433px;

    }
    .container{
        background-color:#F5DEB3;
    }
    </style> -->

    <title>Welcome to iDiscuss-Coding Forums</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
   
    <?php
      $id = $_GET['catid'];
      $sql = "SELECT * FROM `categories` WHERE category_id= $id"; 
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];

      }
    ?>

    <?php
    
     $showAlert = false;
     $method = $_SERVER['REQUEST_METHOD'];
     if($method=='POST'){
       //insert into thread into db
       $th_title = $_POST['title'];
       $th_desc = $_POST['desc'];
       $th_title = str_replace("<", "&lt;", $th_title);
       $th_title = str_replace("<", "&lt;", $th_title);

       $th_desc = str_replace("<", "&lt;", $th_desc);
       $th_desc = str_replace("<", "&lt;", $th_desc);

     
       $sno =$_SESSION['sno'];
       $sql ="INSERT INTO `threads`(`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', $id, $sno, CURRENT_TIME())";
      //echo $sql;

       $result = mysqli_query($conn, $sql);
       $showAlert = true;
       if($showAlert){
          echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Success!</strong>  Your Thread has been added, please wait for community to respond.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
           
       }

   }

    ?>
    <!-- categories container start -->
    <div class="container my-4">
        <div class="jumbotron">
            <h4 class="display-6 text-dark"><b>Welcome to <?php echo $catname;?> Forum</b></h4>
            <p class="lead"><b> <?php echo $catdesc;?></b></p>

            <!-- <hr class="my-4 mb-3"> -->
            <!-- <p class="text-danger"><b>This is a peer to peer forum to share knowledge with each other, Post with respect toward others.
                This site is aimed at a general audience, please be considerate of this. #
                Please do not link to warez, cracks, or any other material that does not respect copyright.
                No support will be provided to such sites.#
                Please don't post on this site recruiting for personal projects or offer services outside of our Wanted!
                forum.</b>
            </p> -->
            <!-- <a class="btn btn-success btn-lg" href="#" role="button">Learn More</a> -->
        </div>

    </div>

    <!-- start form for Discussion with loggin-->
    <?php
     if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo '<div class="container">
        <h2 class="py-2 text-dark">Start a Discussion </h2>
        <form action=" ' . $_SERVER["REQUEST_URI"] . ' " method="POST">
            <div class="form-group mb-3">
                <label for="exampleInputEmail1" class="form-label"><b>Problem Title</b></label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Keep your Title as Short & Crisp as possible.</div>
            </div>

            <!--<input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">-->
            <div class="form-group mb-3">
                <label for="exampleFormControl1Textarea1"><b>Elaborate Your Problems</b></label>
                <textarea class="form-control" id="desc" rows="3" name="desc"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>';
   }
   else{
       echo
       ' <div class="container mb-4">
       <h2 class="py-2 text-dark ">Start a Discussion </h2>
       <p class="lead"><b>You are not logged in. Please Login to be able to  start a Discussion.</b></p>
       </div> ';
   }
    ?>
    
    <!-- End form for discussion with login-->

    <div class="container mb-5 " id="ques">
        <h2 class="py-2 text-dark ">Browse Questions</h2>

        <?php
      $id = $_GET['catid'];
      $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id"; 
      $result = mysqli_query($conn, $sql);
      $noResult = true;
      while($row = mysqli_fetch_assoc($result)){
          $noResult = false;
        $id  = $row['thread_id'];
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_time = $row['timestamp'];
        $thread_user_id = $row['thread_user_id'];
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2); 
        
       

     
      echo'<div class="media my-3 mb-3">
            <img src="img/default-user.png" width="40px" class="mr-3" alt="">
            <div class="media-body">'.
            //  <p class="my-0 "><b>Asked by:'. $row2['user_email'] .' At ' . $thread_time . '</b></p>
                '<h5 class="mt-0"><a class="text-dark" href="thread.php?threadid='. $id .'">'. $title . '</a></h5>'. $desc .
            '</div><p class="my-0 "><b> Asked by:'. $row2['user_email'] .' At ' . $thread_time .'</b></p></div>';
    }
   // echo var_dump($noResult);
    if($noResult){
        echo '<div class = jumbotron jumbotron-fluid>
              <div class = "container">
              <h5 class= "display-7">No ThreadsFound</h5>
              <p class="lead">Be the first Person to ask a question.</p>
              </div>
        </div>';
    }
    ?>




        <!--  <div class="media my-3">
            <img src="img/default-user.png" width="40px" class="mr-3" alt="...">
            <div class="media-body">
                <h5 class="mt-0">Unable to install pyaudio video in windows.</h5>
                Python is an interpreted high-level general-purpose programming language.
                Python's design philosophy emphasizes code readability with its notable use of significant indentation
            </div>
        </div>-->
    </div>

    <?php include 'partials/_footer.php';?>





    <!-- Optional JavaScript -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
  -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
     integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->

</body>

</html>