<?php
require_once(str_replace('models', 'Db.php', __DIR__));
require_once(str_replace('Book.php', 'interfaces.php', __FILE__));

class Book extends Db implements Models {
  public $connection;
  public static $created = false;

  public function __construct() {
    $this->connection = $this->connect();

  // queries not run 
  if ($_SESSION['joined']) {
    mysqli_query($this->connection, "
      CREATE TABLE IF NOT EXISTS book (
        id INT NOT NULL AUTO_INCREMENT ,
        uuid VARCHAR(255) NOT NULL,
        name VARCHAR(255) NOT NULL,
        description VARCHAR(800) NOT NULL,
        link_image VARCHAR(1200) NOT NULL,
        PRIMARY KEY (id)
      );
    ");
  }
}

  public function insert(...$data) {
    [$name, $description, $link_image] = $data;

    $name = mysqli_real_escape_string($this->connection, $name);
    $description = mysqli_real_escape_string($this->connection, $description);
    $link_image = mysqli_real_escape_string($this->connection, $link_image);

    mysqli_query($this->connection, "
      INSERT INTO book (uuid, name, description, link_image) VALUES 
      (UUID_SHORT(), '$name', '$description', '$link_image');
    ");
  }

  public function get_all() {
    $result = mysqli_query($this->connection, "SELECT * FROM book;");

    return $result;
  }

  public function get($uuid) {
    $result = mysqli_query($this->connection, "
      SELECT uuid, name, description, link_image FROM book
        WHERE uuid = '$uuid';
    ");
    // mysqli_fetch_row()

    return $result;
  }

  public function update(...$data) {
    [$uuid, $name, $description, $link_image] = $data;

    $name = mysqli_real_escape_string($this->connection, $name);
    $description = mysqli_real_escape_string($this->connection, $description);
    $link_image = mysqli_real_escape_string($this->connection, $link_image);

    mysqli_query($this->connection, "
      UPDATE book SET
        name = '$name',
        description = '$description',
        link_image = '$link_image'
      WHERE uuid = '$uuid';
    ");
  }

  public function delete($uuid) {
    mysqli_query($this->connection, "
      DELETE FROM book WHERE uuid = '$uuid';  
    ");
  }
}
