<div>
<h1 class="header-title mb-3  fs-2 fs-md-1">Category</h1>
<?php

include("./common/db.php");

$query = "SELECT * FROM `category`";
$results = $conn->query("$query");
foreach ($results as $key => $result) {
    $title = ucfirst($result['name']);
?>
    <a href="?category_id=<?= $result['id'] ?>">
        <div class="card">
            <div class="card-body">
                <h4 class="fw-bold"> <?= $title ?></h4>
            </div>
        </div>
    </a>
<?php } ?>
</div>