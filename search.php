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
<!-- 
    <style>
    /* #maincontainer {
        min-height: 100vh;
        color: #2F4F4F;
        background-color: #F5DEB3;
    } */
    </style> -->

    <title>Welcome to iDiscuss-Coding Forums</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>








    <!-- search Result -->

    <div class="container my-4" id="maincontainer">
        <h1 class="text-center py-3">Search Result for <em>"<?php echo $_GET['search']?>"</em></h1>
        <?php

   $noResults= "true";
   $query = $_GET["search"];
   $sql = "SELECT * FROM `threads` WHERE match (thread_title , thread_desc) against ('$query')"; 
   $result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)){
       $title = $row['thread_title'];
       $desc = $row['thread_desc'];
       $thread_id = $row['thread_id'];
       $url = "thread.php?threadid=". $thread_id;
       $noResults = false;

// Display the search result

  echo '<div class="result">
     <h3><a href="' . $url . '" class="text-dark">' . $title. '</a></h3>
     <p> ' . $desc . '</p> ';
       
     }

     if($noResults){
         echo '<div class="jumbotron jumbotron-fluid">
         <div class="container my-4">
              <p class="display-4">No Result Found</p>
              <p class="lead">Suggestions:<ul>
              <li> Make sure all words are spelled correctly.</li>
              <li> Try different keywords.</li>
               <li>Try more different keywords.</li></ul>
               </p>
         </div>
      </div> ';
     }
?>

    </div>


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