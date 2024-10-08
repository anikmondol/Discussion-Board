<div class="container" id="answers" >
   <h4 class="fw-bold">Answers :</h4>
   <?php
   $query = "SELECT * FROM `answers` where question_id='$question_id'";
   $results = $conn->query($query);

    foreach ($results as $key => $result) {
    
   ?>
    <h5 class="mb-2" id="answer-title"><?= $result['answer'] ?></h5>
   <?php }?>

</div>