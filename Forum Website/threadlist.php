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

    <?php
    $id = $_GET['cat'];
    $sql = "SELECT * FROM `categories` WHERE category_id=$id";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    ?>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $uid = $_SESSION['user_id'];

        $sql = "INSERT INTO `thread` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`) VALUES ('$title', '$desc', $id, $uid)";

        mysqli_query($conn, $sql);

        echo '
        <div class="alert alert-success" role="alert">
        <b>Success</b> Your thread has been added successfully!
      </div>
        ';
    }
    ?>

    <div class="container my-4" style="background-color: rgb(201, 200, 200); padding: 15px; border-radius:1%">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $row['category_name'] ?> forums</h1>
            <p class="lead"><?php echo $row['category_description'] ?></p>
            <hr class="my-4">
            <p>
            <ul>
                <li>Be respectful: Be courteous and civil, and avoid demeaning, discriminatory, or harassing behavior.</li>
                <li>Stay on topic: Provide a clear topic title and keep your post in the appropriate category.</li>
                <li>Share knowledge: Provide your sources when giving information.</li>
                <li>Participate constructively: Postings should continue a conversation and provide avenues for additional continuous dialogue.</li>
                <li>Be factual: Stay friendly and factual, and be cautious with humor and irony.</li>
                <li>Respect privacy: Don't share content from private messages on the public forum, and refrain from mentioning the names of staff, sellers, or buyers in your posts or comments.</li>
            </ul>
            </p>
            <p class="lead">
                <a class="btn btn-primary btn" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>

    <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            echo '
            <div class="container">
                <h2>Start a discussion</h2>
                <form action="'.$_SERVER['REQUEST_URI'] .'" method="POST">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Elaborate your concern</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="desc"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success">
                </form>
            </div>
            ';
        }
        else{
            echo '
            <div class="container">
                <h2>Start a discussion</h2>
                <h3 class="lead">Log in to start a discussion</h3>
            </div>
            ';
        }
    ?>


    <div class="container my-3">
        <h1>Browse Questions</h1>
        <?php
        $sql = "SELECT * FROM `thread` WHERE `thread_cat_id`=$id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $thread_id = $row['thread_id'];
            $user_id = $row['thread_user_id'];
            $sql = "SELECT * FROM `users` WHERE `user_id`=$user_id";
            $user = mysqli_fetch_assoc(mysqli_query($conn, $sql));

            echo '
                <div class="d-flex my-5">
                <img src="./images/default.jpeg" width="50px" style="border-radius: 50%;" alt="" srcset="">
                    <div class="flex-grow-1 ms-3">
                        <b style="float:right"> Posted by: '.
                            $user['user_email']
                        .' on '.$user['timestamp'].'</b>
                        <h5><a class="text-dark" href="thread.php?thread_id=' . $thread_id . '">' . $row['thread_title'] . '</a></h5>
                        ' . substr($row['thread_desc'], 0, 90) . '....
                    </div>
                </div>
                ';
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>