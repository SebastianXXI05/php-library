<?php 
require_once('./db/models/Book.php');

$book = new Book();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="bg-zinc-800 h-screen text-white">
    <?php
    $index_url = '#'; 
    $create_url = './views/create_book.php';

    require_once('./views/layout/header.php'); 
    ?>

    <div class="w-11/12 mx-auto">
      <h1>Library</h1>
    </div>
  </div>  
</body>
</html>