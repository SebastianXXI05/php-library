<?php
/* require_once('./db/models/Book.php');

if ($_POST) {
  $book = new Book();

  $book->insert($_POST['name'], $_POST['description'], $_POST['link_image']);
  $book->redirect('./');
} */
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create book</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="bg-zinc-800 h-screen text-white">
    <?php
    $index_url = '../';
    $create_url = '#';

    require_once('./layout/header.php');
    ?>

    <div class="w-11/12 mx-auto">
      <h1 class="text-center text-3xl mb-6">Create new book</h1>
      <div class="flex justify-center">
        <form action="#" method="post">
          <label for="name">Name</label>
          <div>
            <input class="bg-zinc-600 focus-visible:outline-none rounded" 
            type="text" name="name">
          </div>

          <label for="link_image">Image url</label>
          <div>
            <input class="bg-zinc-600 focus-visible:outline-none rounded" 
            type="text" name="link_image">
          </div>

          <label for="description">Description</label>
          <div>
            <textarea 
            class="bg-zinc-600 focus-visible:outline-none rounded" 
            name="description" 
            cols="23" rows="10">
          </textarea>
          </div>

          <button type="submit">Add book</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>