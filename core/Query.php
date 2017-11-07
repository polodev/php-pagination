<?php
class Query {
  protected $connection;
  public function __construct($connection)
  {
    $this->connection = $connection;
  }
  public function get_users_from_db ($offset = 5, $limit = 5, $search = '') {
    $sql = "select * from people limit $offset, $limit";
    if (! empty($search)) {
      $sql = "select * from people where name like '%{$search}%' or email like '%{$search}%'limit $offset, $limit";
    }
    $statement = $this->connection->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_OBJ);
  }
  public function get_total_row_number () {
    $sql = 'select count(*) as total from people';
     $statement = $this->connection->prepare($sql);
     $statement->execute();
     $db_result =  $statement->fetch(PDO::FETCH_OBJ);
     return (int) $db_result->total;
  }
}