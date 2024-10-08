<select class="form-select" name="category_id" id="category">
    <option selected="">Select A Category</option>
    <?php
        include("./common/db.php");
        $query = "SELECT * FROM `category`";
        $results = $conn->query("$query");
       foreach ($results as $key => $category) {
        $id =  $category['id'];
        $name =  ucfirst($category['name']);
        echo "<option value=$id>$name</option>";
       }
    ?>
</select>