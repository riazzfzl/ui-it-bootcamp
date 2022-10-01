<?php
// The require_once statement is identical to require except PHP will check if the file has already been included, and if so, not include (require) it again.
require_once("db_config.php");


$query = "SELECT * FROM books";

$results = $db_connection->query($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Bookstore</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/23032ab857.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <div class="mt-3">
      <a href="create.php">Create new record</a>
    </div>
    <table class="table mt-3">
      <thead>
        <tr>
          <th>TITLE</th>
          <th>AUTHOR</th>
          <th>GENRE</th>
          <th>PUBLISHER</th>
          <th>EDIT</th>
          <th>DELETE</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // gunakan pengulangan
        foreach ($results as $table) {
        ?>
          <tr>
            <td><?php echo $table['Title'] ?></td>
            <td><?php echo $table['Author'] ?></td>
            <td><?php echo $table['Genre'] ?></td>
            <td><?php echo $table['Publisher'] ?></td>
            <td><a href="edit.php?id=<?php echo $result['id'] ?>"><i class="fas fa-edit"></i></a></td>
            <td><a href="delete.php?id=<?php echo $result['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>