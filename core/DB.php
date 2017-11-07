<?php
class DB {
  public static function connection($config)
  {
    try {
      return new PDO($config['dsn'], $config['username'], $config['password'], $config['options']);
    } catch (PDOException $e) {
      die ('connection failed. Error: ' . $e->getMessage());
    }
  }
}