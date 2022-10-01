<?php

require_once("db_config.php");

// error catching
if (!isset($_GET['id'])) {
  //   redirect user to the main page on error
  header('Location: index.php');
  //   echo "Record does not exist";
  die();
} else {
  $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
  //   checking if id is int
  if (!$id) {
    header('Location: index.php');
    die();
  } else {
    // maximum 1 record, :id is a placeholder
    $query = "DELETE FROM books WHERE id = :id LIMIT 1";
    $result = $db_connection->prepare($query);
    // create array
    $result->execute([
      'id' => $id,
    ]);

    $rowsDeleted = $result->rowCount();
  }
}

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Delete record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

    <body>
      <div class="container">
        <?php
        // percabangan
        if ($rowsDeleted == 1) {
        ?>
          <div class="alert alert-info mt-3" role="alert">
            The record has been deleted!
          </div>
        <?php
        }
        else {
        ?>
          <div class="alert alert-danger mt-3" role="alert">
            The record has not been deleted!
          </div>
        <?php
        }
        ?>
        <a href= "delete.php?id=" class="btn btn-primary">Back</a>

      </div>
      </body>

      </html>