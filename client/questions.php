<div class="container" id="questions">
    <div class="mt-5">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="header-title mb-3  fs-2 fs-md-1">Questions</h1>
                <?php

                include("./common/db.php");

                $query = "SELECT * FROM `question`";
                $results = $conn->query($query);
                foreach ($results as $key => $result) {
                    
                ?>
                    <a href="?question_id=<?= $result['id'] ?>">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="fs-3 text-dark fw-bold"> <?= $result['title'] ?></h3>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-4">
                <h1 class="header-title mb-3  fs-2 fs-md-1">Category</h1>
                <?php

                include("./common/db.php");

                $query = "SELECT * FROM `category`";
                $results = $conn->query("$query");
                foreach ($results as $key => $result) {
                    $title = $result['name'];
                ?>
                    <a href="#">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="fs-3 text-dark fw-bold"> <?= $title ?></h3>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>

    </div>
</div>