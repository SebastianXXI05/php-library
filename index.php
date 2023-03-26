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
      <h1 class="text-center text-3xl mb-12">Library</h1>
      <?php
      require_once('./db/models/Book.php');
      $book = new Book();
      $books = $book->get_all();
      ?>

      <section class="flex justify-center">
        <?php if (mysqli_num_rows($books) !== 0) : ?>
          <?php foreach ($books as $book) : ?>
            <article
            class="bg-zinc-700 p-2 mb-4 rounded mx-2"
            >
              <h3>
                <a 
                class="font-bold hover:text-sky-600"  
                href=<?= "./views/show_book.php?id=$book[uuid]" ?>
                >
                <?= $book['name'] ?>
              </a>
              </h3>
            </article>
          <?php endforeach; ?>

        <?php else : ?>
          <h2>Not Found Books</h2>
        <?php endif; ?>
      </section>
    </div>

  </div>
</body>

</html>