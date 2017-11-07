<?php
class Query {
  protected $connection;
  public function __construct($connection)
  {
    $this->connection = $connection;
  }
  public function get_users_from_db ($offset = 5, $limit = 5) {
    $statement = $this->connection->prepare("select * from people limit $offset, $limit");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_OBJ);
  }
  public function get_total_row_number () {
     $statement = $this->connection->prepare('select count(*) as total from people');
     $statement->execute();
     $db_result =  $statement->fetch(PDO::FETCH_OBJ);
     return (int) $db_result->total;
  }
}