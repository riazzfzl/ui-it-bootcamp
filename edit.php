<?php
require_once('db_config.php');

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
    $query = "SELECT * from books WHERE id = :id";
    $result = $db_connection->prepare($query);
    // create array
    $result->execute([
      'id' => $id,
    ]);

    $result = $result->fetch();
  }
}

?>

<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Edit database record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>

  <body>

    <br>
    <div class="container">
      <form method="post" action="update.php">
        <div class="form-group row">
          <label for="id" class="col-sm-2 col-form-label">ID</label>
          <div class="col-sm-10">
            <input type="number" readonly class="form-control" id="id" name="id" value="<?php echo $result['id'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="title" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $result['title'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="author" class="col-sm-2 col-form-label">Author</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="author" name="author" value="<?php echo $result['author'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="genre" class="col-sm-2 col-form-label">Genre</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="genre" name="genre" value="<?php echo $result['genre'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="height" class="col-sm-2 col-form-label">Height</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="height" name="height" value="<?php echo $result['height'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="publisher" name="publisher" value="<?php echo $result['publisher'] ?>">
          </div>
        </div>

        <button type="submit" name="updateRecord" class="btn btn-success">Update record</button>

      </form>
    </div>


  </body>


  </html>