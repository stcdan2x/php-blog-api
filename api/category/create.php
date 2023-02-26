<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('
   Access-Control-Allow-Headers: 
   Access-Control-Allow-Headers,
   Content-Type,
   Access-Control-Allow-Methods,
   Authorization,
   X-Requested-With
');

include_once '../../config/Database.php';
include_once '../../models/Category.php';

// instantiate DB & connect
$database = new Database();
$db = $database->connect();

// instantiate blog category object
$cat = new Category($db);

// get raw input data
$data = json_decode(file_get_contents("php://input"));

$cat->name = $data->name;
$cat->created_at = $data->created_at;

// create post
if ($cat->create()) {
   echo json_encode(
      array('message' => 'Category Created')
   );
} else {
   echo json_encode(
      array('message' => 'Category Not Created')
   );
}
