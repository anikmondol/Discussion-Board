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
                        <textarea name="description" type="text" class="form-control" id="desertion" placeholder="Enter Desertion"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <?php include("./client/category.php") ?>
                    </div>
                    <button name="ask" type="submit" class="btn btn-primary">Ask Question</button>
                </form>
            </div>
        </div>
    </div>
</div>