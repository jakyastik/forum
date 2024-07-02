<!-- Modal -->

<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Sign Up</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <?php 
                include "_handleSignup.php";

                if ($successAlert == true) {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> Account created. Log in to continue. 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
                } else if ($emailExists == true) {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> Email already exists. 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
                }

                ?>

                <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST">
                    <div class="mb-3">
                        <label for="signupEmail" class="form-label">Your Email</label>
                        <input type="email" class="form-control" name="signupEmail" id="signupEmail"
                            aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPass" class="form-label">Confirm Password</label>
                        <input type="password" id="confirmPass" name="confirmPass" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success">Sign Up</button>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Sign Up</button>
                    </div>
                </form>

            </div>


        </div>
    </div>
</div>