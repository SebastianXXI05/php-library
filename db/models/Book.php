<?php
require_once(str_replace('models', 'Db.php', __DIR__));
require_once(str_replace('Book.php', 'interfaces.php', __FILE__));

class Book extends Db implements Models {
  public function __construct() {
    $connection = $this->connect();

    mysqli_query($connection, "
      CREATE TABLE IF NOT EXISTS book (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        description VARCHAR(655),
        link_image VARCHAR(800)
      );
    ");
  }

  public function insert(...$data) {
    [$name, $description, $link_image] = $data;
    $connection = $this->connect();

    $name = mysqli_real_escape_string($connection, $name);
    $description = mysqli_real_escape_string($connection, $description);
    $link_image = mysqli_real_escape_string($connection, $link_image);

    mysqli_query($connection, "
      INSERT INTO book (name, description, link_image) VALUES 
      ('$name', '$description', '$link_image');
    ");
  }

  public function get_all() {
    $connection = $this->connect();
    $result = mysqli_query($connection, "SELECT * FROM book;");

    return $result;
  }

  public function update() {
    
  }

  public function remove() {
    
  }
}