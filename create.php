<?php

require_once("db_config.php");

// checking if the update button was clicked
// FILTER_SANITIZE_STRING removes tags and special encoding characters from the string
if (isset($_POST['createRecord'])) {
  $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
  $author = filter_var($_POST['author'], FILTER_SANITIZE_STRING);
  $genre = filter_var($_POST['genre'], FILTER_SANITIZE_STRING);
  $height = filter_var($_POST['height'], FILTER_SANITIZE_NUMBER_INT);
  $publisher = filter_var($_POST['publisher'], FILTER_SANITIZE_STRING);
  $query = "INSERT INTO books (title, author, genre, height, publisher)
            VALUES (:title, :author, :genre, :height, :publisher)";
  $result = $db_connection->prepare($query);
  $result->execute([
    'title' => $title,
    'author' => $author,
    'genre' => $genre,
    'height' => $height,
    'publisher' => $publisher,
  ]);

  $rowsCreated = $result->rowCount();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Create database record</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <!-- gunakan form -->
    <form method="post" action="create.php">
      <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="title" name="title" value="">
        </div>
      </div>
      <div class="form-group row">
        <label for="author" class="col-sm-2 col-form-label">Author</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="author" name="author" value="">
        </div>
      </div>
      <div class="form-group row">
        <label for="genre" class="col-sm-2 col-form-label">Genre</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="genre" name="genre" value="">
        </div>
      </div>
      <div class="form-group row">
        <label for="height" class="col-sm-2 col-form-label">Height</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="height" name="height" value="">
        </div>
      </div>
      <div class="form-group row">
        <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="publisher" name="publisher" value="">
        </div>
      </div>

      <button type="submit" name="createRecord" class="btn btn-success" formaction="create-confirmation.php">Create record</button>

      </form>
  </div>


</body>


</html>