<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModal">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/forum/partials/_handleLogin.php">
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="loginEmail" id="loginEmail">
                    </div>
                    <div class="mb-3">
                        <label for="loginPass" class="form-label">Password</label>
                        <input type="password" class="form-control" name="loginPass" id="loginPass">
                    </div>
                    <button type="submit" name="submit_login" class="btn btn-success">Log In</button>
                </form>

            </div>

        </div>
    </div>
</div>