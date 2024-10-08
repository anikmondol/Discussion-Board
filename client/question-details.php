<div class="container" id="question-details">

    <?php
    include("./common/db.php");
    $query = "SELECT * FROM `question` where id='$question_id'";
    $result = $conn->query($query);
    $rows = $result->fetch_all();
    $title = '';
    $desertion = '';
    $category_id = 0;
    foreach ($rows as $key => $row) {
        $title = $row[1];
        $desertion = $row[2];
        $category_id = $row[3];
    }

    ?>

    <div class="container" id="signup">
        <div class="row">
            <div class="col-lg-9">
                <div class="card-body">
                    <h2 class="header-title mb-3  fs-1 fw-bold m-5">Questions</h2>
                    <h3 class="text-blue">Question: <?= $title; ?> </h3>
                    <h5 class="mt-3"> <?= $desertion; ?> </h5>
                    <?php include("./client/answers.php"); ?>
                    <form role="form" action="./server/requests.php" method="post">
                        <input type="hidden" name="question_hidden" value="<?= $question_id; ?>">
                        <div class="my-3">
                            <textarea rows="6" name="answer_text" type="text" class="form-control" id="desertion" placeholder="Your answer . . ."></textarea>
                        </div>
                        <button name="answer_btn" type="submit" class="btn btn-primary">Write your answer</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card-body">
                    <?php
                    $category_query = "SELECT name FROM `category` where id='$category_id'";
                    $category_result = $conn->query($category_query);
                    $category_row = $category_result->fetch_assoc();


                    $query = "SELECT * FROM `question` where category_id='$category_id' and id!=$question_id";
                    $result = $conn->query($query);
                    $rows = $result->fetch_all(); ?>

                    <h2 class="header-title mb-3  fs-1 fw-bold m-5"> <?= ucfirst($category_row['name']); ?> </h2>

                    <?php
                    foreach ($rows as $key => $row) {
                    ?>

                        <div class="card">
                            <div class="card-body">
                                <a href="?question_id=<?= $row[0] ?>">
                                    <h4 class="fw-bold"> <?= $row[1]; ?></h4>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>


</div>