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
      <h1 class="text-center text-3xl mb-6">Library</h1>
      <?php
      require_once('./db/models/Book.php');
      $book = new Book();
      $books = $book->get_all();
      ?>

      <?php if (mysqli_num_rows($books) !== 0) : ?>
        <?php foreach ($books as $book) : ?>
          <h3><?= $book['name'] ?></h3>
        <?php endforeach; ?>

      <?php else: ?>
        <h2>Not Found Books</h2>
      <?php endif; ?>
    </div>

  </div>
</body>

</html>