<div class="container" id="signup">
    <div class="row">
        <div class="card signup-main mt-5">
            <div class="card-body">
                <h4 class="header-title mb-3 text-center fs-3">Signup</h4>

                <form role="form" action="./server/requests.php" method="post">
                    <div class="mb-3">
                        <label for="userName" class="form-label">User Name</label>
                        <input name="name" type="text" class="form-control" id="userName" placeholder="Enter User Email">
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">User Email</label>
                        <input name="email" type="email" class="form-control" id="userEmail" placeholder="Enter User Email">
                    </div>
                    <div class="mb-3">
                        <label for="userPassword" class="form-label">User Password</label>
                        <input name="password" type="password" class="form-control" id="userPassword" placeholder="Enter User Password">
                    </div>
                    <div class="mb-3">
                        <label for="userAddress" class="form-label">User Address</label>
                        <input name="address" type="text" class="form-control" id="userAddress" placeholder="Enter User Address">
                    </div>
                    <button name="signup" type="submit" class="btn btn-primary">Signup</button>
                </form>
            </div>
        </div>
    </div>
</div>