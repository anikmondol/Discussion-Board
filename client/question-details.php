<div class="container" id="question-details">

    <?php
    include("./common/db.php");
    $query = "SELECT * FROM `question` where id='$question_id'";
    $result = $conn->query($query);
    $rows = $result->fetch_all();
    $title = '';
    $desertion = '';
    foreach ($rows as $key => $row) {
       $title = $row[1];
       $desertion = $row[2];
    }
   
    ?>

    <div class="container" id="signup">
        <div class="row">
           <div class="col-lg-9 p-0 m-0">
                <div class="card-body">
                    <h1 class="header-title mb-3  fs-1 fw-bold m-5">Questions</h1>
                    <form role="form" action="./server/requests.php" method="post">
                        <h3 class="text-blue">Question: <?= $title; ?> </h3>
                        <h5 class="my-3 text-dark"> <?= $desertion; ?> </h5>
                        <div class="mb-3">
                            <textarea rows="6" name="description" type="text" class="form-control" id="desertion" placeholder="Your answer"></textarea>
                        </div>
                        <button name="ask" type="submit" class="btn btn-primary">Write your answer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>