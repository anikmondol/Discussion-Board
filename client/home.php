<div class="container" id="questions">
    <div class="mt-5">
        <div class="row">
            <div class="col-lg-9">
                <h1 class="header-title mb-3  fs-2 fs-md-1">Questions</h1>
                <?php
                include("./common/db.php");
                $delete_id = 0;
                if (isset($_REQUEST['category_id'])) {
                    $query = "SELECT * FROM `question` where category_id='$category_id'";
                } elseif (isset($_REQUEST['user_id'])) {
                    $delete_id = $_REQUEST['user_id'];
                    $query = "SELECT * FROM `question` where user_id='$user_id'";
                } elseif (isset($_REQUEST['latest'])) {
                    $query = "SELECT * FROM `question` order by id desc";
                } else {
                    $query = "SELECT * FROM `question`";
                }
                $results = $conn->query($query);
                foreach ($results as $key => $result) {
                    $id = $result['id'];
                ?>
                    <div class="card">
                        <div class="d-flex justify-content-between card-body">
                            <a href="?question_id=<?= $result['id'] ?>">
                                <h4 class="fw-bold d-flex justify-content-between"> <?= $result['title'];  ?> </h4>
                            </a>
                            <?php if ($delete_id) {
                                echo "<a href='./server/requests.php?delete=$id'><button class='btn btn-info'>Delete</button></a>";
                            } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-lg-3">
                <div>
                    <h1 class="header-title mb-3  fs-2 fs-md-1">Category</h1>
                    <?php
                    include("./common/db.php");
                    $query = "SELECT * FROM `category`";
                    $results = $conn->query("$query");
                    foreach ($results as $key => $result) {
                        $title = ucfirst($result['name']);
                    ?>
                        <a href="#">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="fw-bold"> <?= $title ?></h4>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>