<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup for iDiscuss Forum</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--Start signup form-->
            <form action="/forum/partials/_handleSignup.php" method="post">
            <div class="modal-body">
            
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="signupEmail"  name="signupEmail" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm  Password</label>
                        <input type="password" class="form-control" id="signupcPassword" name="signupcPassword">
                        <div id="emailHelp" class="form-text">Make sure type the same password.</div>
                    </div>
                   <!-- <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>-->
                    <button type="submit" class="btn btn-info text-light">Signup</button>
            </div>
            
            </form>
             <!--End signup form-->
        </div>
    </div>
</div>