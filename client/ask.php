<div class="container" id="signup">
    <div class="row">
        <div class="card signup-main mt-5">
            <div class="card-body">
                <h4 class="header-title mb-3 text-center fs-3">Ask A Question</h4>

                <form role="form" action="./server/requests.php" method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="Enter Question">
                    </div>
                    <div class="mb-3">
                        <label for="desertion" class="form-label">Desertion</label>
                        <textarea name="desertion" type="text" class="form-control" id="desertion" placeholder="Enter Desertion"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select">
                            <option selected="">Select Category</option>
                            <option value="mobiles">Mobiles</option>
                            <option value="general">General</option>
                            <option value="coding">Coding</option>
                        </select>
                    </div>
                    <button name="login" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>