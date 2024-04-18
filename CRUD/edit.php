<?php
$server = 'localhost';
$username = 'root';
$pwd = '';
$database = 'crud';

$conn = mysqli_connect($server, $username, $pwd, $database);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['desc'];
    $new_sno = $_POST['sno'];

    $sql = "UPDATE `notes` SET `title`='$title', `description`='$description' WHERE `sno`='$new_sno'";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    } else {
        header("Location: index.php");
        exit();
    }
}

$sno = $_GET['sno'];

$sql = "SELECT * FROM `notes` WHERE `sno`='$sno'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo var_dump($row);
} else {
    echo "No records found.";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.4/css/dataTables.dataTables.min.css">
</head>

<body>
    <div class="container">
        <?php
        echo "<form action='edit.php' method='post'>
            <div class='mb-3'>
                <label for='Title' class='form-label' id='title'>Note Title</label>
                <input type='text' name='title' class='form-control' value='" . $row['title'] . "' id='exampleInputEmail1' aria-describedby='emailHelp'>
            </div>
            <div class='mb-3'>
                <label for='exampleInputPassword1' class='form-label'>Note Description</label>
                <textarea class='form-control' id='exampleInputPassword1' rows='5' id='desc' name='desc'>" . $row['description'] . "</textarea>
            </div>

            <input type='hidden' name='sno' class='form-control' value=" . $sno . " id='exampleInputEmail1' aria-describedby='emailHelp'>

            <button type='submit' class='btn btn-primary'>Update</button>
        </form>";
        ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.4/js/dataTables.min.js"></script>
</body>

</html>