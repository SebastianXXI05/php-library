<?php 
require_once('../db/models/Book.php');

$id = $_GET['id'];
$name = $_GET['name'];
$description = str_replace('-', ' ', $_GET['description']);
$link_image = $_GET['link_image'];

if ($_POST) {
  $book = new Book();
  $book->update($id, $_POST['name'], $_POST['description'], $_POST['link_image']);

  $book->redirect('../');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update book</title>
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
      <h1 class="text-center text-3xl mb-12">Update book</h1>
      <div class="flex justify-center">
        <form action="#" method="post">
          <label for="name">Name</label>
          <div class="my-2">
            <input class="bg-zinc-600 focus-visible:outline-none rounded" 
            type="text" name="name" value=<?= $name ?>>
          </div>

          <label 
          for="link_image">Image url</label>
          <div class="my-2">
            <input class="bg-zinc-600 focus-visible:outline-none rounded" 
            type="text" name="link_image" value=<?= $link_image ?>>
          </div>

          <label for="description">Description</label>
          <div class="my-2">
            <textarea 
            class="bg-zinc-600 focus-visible:outline-none rounded" 
            name="description"
            cols="30" rows="10"><?= $description ?></textarea>
          </div>

          <div class="flex justify-center">
            <button
              class="bg-green-500 rounded px-3 py-1 mr-3 hover:bg-green-600" 
              type="submit">Update book
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    const input = document.querySelector('input[name=name]')
    
    input.value = input.value.replaceAll('-', ' ');
  </script>
</body>
</html>