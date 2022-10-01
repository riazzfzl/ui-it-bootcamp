<?php 

require_once("db_config.php");

// checking if the update button was clicked
if (!isset($_POST['updateRecord'])) {
//   if not, redirect back to edit page
  header('Location: edit.php');
  die();
} else {
  if (!isset($_POST['id'])) {
    header('Location: edit.php');
    die();
  } else {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $author = filter_var($_POST['author'], FILTER_SANITIZE_STRING);
    $genre = filter_var($_POST['genre'], FILTER_SANITIZE_STRING);
    $height = filter_var($_POST['height'], FILTER_SANITIZE_NUMBER_INT);
    $publisher = filter_var($_POST['publisher'], FILTER_SANITIZE_STRING);
    $query = "UPDATE books 
              SET title = :title,
              author  = :author,
              genre = :genre,
              height = :height,
              publisher = :publisher
              WHERE id = :id";
    $result = $db_connection->prepare($query);
    $result->execute([
      'title' => $title,
      'author' => $author,
      'genre' => $genre,
      'height' => $genre,
      'publisher' => $publisher,
      'id' => $id
    ]);
    header('Location: edit.php');

  }
}