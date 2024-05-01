<?php
    include('./includes/dbconnect.php');
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php include('./includes/navbar.php') ?>

    <div class="container my-2">
        <h1 class="text-center">Categories</h1>

        <div class="row">

            <?php

                $sql = "SELECT * FROM categories";
                $result = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($result)){
                    echo '
                    <div class="col-md-4 my-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">'. $row['category_name'] .'</h5>
                            <p class="card-text">'. substr($row['category_description'], 0, 95) .'...</p>
                            <a href="threadlist.php?cat='. $row['category_id'] .'" class="btn btn-primary">Explore</a>
                        </div>
                        </div>
                    </div>
                    ';
                }
            
            ?>

        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>




<!-- CREATE TABLE `forums`.`thread` (`thread_id` INT NOT NULL AUTO_INCREMENT , `thread_title` TEXT NOT NULL , `thread_desc` TEXT NOT NULL , `thread_cat_id` INT NOT NULL , `thread_user_id` INT NOT NULL , `timestamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`thread_id`)) ENGINE = InnoDB; -->
