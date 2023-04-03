<?php
require_once('../db/models/Book.php');

if ($_GET) {
  $book = new Book;
  $uuid = $_GET['uuid'];
  
  $book->delete($uuid);
  $book->redirect('../');
  die();
}
else {
  $error = 'Error not data';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ERROR PAGE</title>
</head>
<body>
  <h1><?= $error ?></h1>
</body>
</html>