<?php
require_once('../db/models/Book.php');

if ($_GET) {
  $uuid = $_GET['id'];
  $book = new Book();

  $result = mysqli_fetch_assoc($book->get($uuid));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $result['name'] ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <?php
  $index_url = '../';
  $create_url = './create_book.php';
  ?>

  <div class="bg-zinc-800 h-screen text-white">
    <?php require_once('./layout/header.php'); ?>

    <div class="w-11/12 mx-auto">
      <div>
        <h1 
          class="text-2xl font-bold bg-zinc-700 text-center py-2 rounded-t"
          >
          <?= $result['name'] ?>
        </h1>
        <div class="flex border-r-4 border-zinc-700">
          <img 
            width="200" 
            src=<?= $result['link_image'] ?> 
            alt=<?= $result['name'] ?> 
          />
          <p class="text-lg my-1 ml-1 px-3 text-xl border-l-2 border-zinc-700">
            <?= $result['description'] ?>
          </p>
        </div>
        <div class="bg-zinc-700 h-14 rounded-b"></div>
      </div>
    </div>
  </div>
</body>

</html>