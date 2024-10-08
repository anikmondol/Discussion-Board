<div class="container" id="questions">
    <div class="mt-5">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="header-title mb-3  fs-2 fs-md-1">Questions</h1>
                <?php

                include("./common/db.php");
              
                if (isset($_REQUEST['category_id'])) {
                    $query = "SELECT * FROM `question` where category_id='$category_id'";
                }elseif (isset($_REQUEST['user_id'])) {

                    $query = "SELECT * FROM `question` where user_id='$user_id'";
                }elseif (isset($_REQUEST['latest'])) {
                    $query = "SELECT * FROM `question` order by id desc";
                }
                elseif (isset($_REQUEST['search'])) {
                    $query = "SELECT * FROM `question` where `title` like '%$search%' ";
                }
                else{
                    $query = "SELECT * FROM `question`";
                }

                $results = $conn->query($query);
                foreach ($results as $key => $result) {
                    
                ?>
                    <a href="?question_id=<?= $result['id'] ?>">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="fw-bold"> <?= $result['title']  ?> 
                              
                            </h4>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-4">
                <?php include("./client/category-list.php"); ?>
            </div>
        </div>

    </div>
</div>