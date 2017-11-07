<?php
require 'config.php';
require 'core/DB.php';
require 'core/Query.php';
$connection  = DB::connection($config);
$query = new Query($connection);
$page = 1;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
}
$perpage = 5;
$offset = $page * $perpage - $perpage;
$people =  $query->get_users_from_db($offset) ;
$nubmer_of_record  = $query->get_total_row_number() ;
$total_page  = ceil ($nubmer_of_record / $perpage);
require 'views/index.view.php';
