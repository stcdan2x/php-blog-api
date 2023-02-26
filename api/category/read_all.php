<?php

//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Category.php';

// instantiate database and connect
$database = new Database();
$db = $database->connect();

//instantiate blog category object
$categories = new Category($db);

//query for blog categories
$catResult = $categories->read_all();

// get row count
$count = $catResult->rowCount();

// check if there's data returned by the query in read_all function
if ($count > 0) {
   // set empty categories array
   $cat_arr = [];

   $row = $catResult->fetch(PDO::FETCH_ASSOC);

   while ($row) {

      extract($row);

      $cat_item = [
         'id' => $id,
         'name' => $name,
         'created_at' => $created_at,
      ];

      array_push($cat_arr, $cat_item);
   };

   echo json_encode($cat_arr);
} else {
   echo json_encode(['message' => 'No Categories found']);
}
