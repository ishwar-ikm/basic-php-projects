<?php
$server = 'localhost';
$username = 'root';
$pwd = '';
$database = 'crud';

$insert = false;

$conn = mysqli_connect($server, $username, $pwd, $database);

if (!$conn) {
  die('failed to connect: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $desc = $_POST['desc'];

  $sql = "INSERT INTO `notes` (`title`, `description`) VALUES (\"$title\", \"$desc\")";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    $insert = true;
  } else {
    echo mysqli_error($conn);
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/2.0.4/css/dataTables.dataTables.min.css">
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">PHP CRUD</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?php
  if ($insert) {
    echo '<div class="alert alert-success" role="alert">
        Data inserted successfully
      </div>';
  }
  ?>

  <div class="container my-3">
    <h2>Add your notes</h2>
    <form action='index.php' method="post">
      <div class="mb-3">
        <label for="Title" class="form-label" id="title">Note Title</label>
        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Note Description</label>
        <textarea class="form-control" id="exampleInputPassword1" rows="5" id="desc" name="desc"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Add Note</button>
    </form>
  </div>


  <div class="container">

    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No.</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = 'select * from notes';
        $result = mysqli_query($conn, $sql);

        $sno = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $sno += 1;
          echo "
              <tr>
                  <th scope='row'>" . $sno . "</th>
                  <td>" . $row['title'] . "</td>
                  <td>" . $row['description'] . "</td>
                  <td><a href='./edit.php?sno=" . $row['sno'] . "'>Edit</a> <a href='./delete.php?sno=". $row['sno'] . "'>Delete</a></td>
              </tr>
          ";
        }
        ?>
      </tbody>
    </table>
    <hr>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/2.0.4/js/dataTables.min.js"></script>
  <script>
    let table = new DataTable('#myTable');
  </script>
</body>

</html>


<!-- CREATE TABLE `crud`.`notes` (`sno` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(50) NOT NULL , `description` TEXT NOT NULL , `tstamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`sno`)) ENGINE = InnoDB; -->