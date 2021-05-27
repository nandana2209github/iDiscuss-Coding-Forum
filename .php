

// <!-- start form for question
// <div class="container">
//         <h3 class="py-2 text-info">Post your Comment </h3>

//         <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST">

//             <div class="form-group mb-3">
//                 <label for="exampleFormControl1Textarea1">Type your Comment</label>
//                 <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>

//             </div>
//             <button type="submit" class="btn btn-success">Post Comment</button>
//         </form>
//     </div> -->
//     <!-- End form -->

else{
       echo
       ' <div class="container">
       <h2 class="py-2 text-info">Post comment </h2>
       <p class="lead"><b>You are not logged in. Please Login to be able to  post comments.</b></p>
       </div> ';
   }