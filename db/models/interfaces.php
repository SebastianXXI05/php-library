<?php
interface Models {
  public function insert(...$data);
  public function get_all();
  public function update();
  public function remove();
}