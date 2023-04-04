<?php
require_once str_replace('/db', '', __DIR__ ).'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(str_replace('/db', '', __DIR__ ));
$dotenv->load();

class Db {
  protected function connect() {
    return mysqli_connect($_ENV['HOST'], $_ENV['USERR'], $_ENV['PASSWORD'],
    $_ENV['DB_NAME'], strlen($_ENV['PORT']) === 0 ? null : $_ENV['PORT']);
  }

  public function redirect($url) {
    header('location:'.$url);
  }

  protected function migrate($table, $fn) {
    $fn($table);
  }
}
