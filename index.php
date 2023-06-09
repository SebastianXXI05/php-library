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
            <?php 
            // format text and update URL.
            $url = "./views/update_book.php?id=$book[uuid]&name=$book[name]&description=$book[description]&link_image=$book[link_image]";
             
            $update_url = str_replace(' ', '-', $url);
            ?>
            <article
            class="bg-zinc-700 p-2 mb-4 rounded mx-2"
            >
              <h3>
                <a 
                class="font-bold hover:text-sky-600 mr-4"  
                href=<?= "./views/show_book.php?id=$book[uuid]" ?>
                >
                <?= $book['name'] ?>
              </a>
              <!--update-->
              <a 
                class="bg-green-500 rounded px-3 py-1 mr-3 hover:bg-green-600"
                href=<?= $update_url ?>
              >
                update
              </a>
              <!--delete-->
              <a 
                class="bg-red-500 rounded px-3 py-1 mr-3 hover:bg-red-600"
                href=<?= "./views/delete_book.php?uuid=$book[uuid]" ?>
              >
                Delete
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