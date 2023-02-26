<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
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

// set ID to delete
$cat->id = $data->id;

// delete category
if ($post->delete()) {
   echo json_encode([
      'message' => 'Category Deleted'
   ]);
} else {
   echo json_encode([
      'message' => 'Failed to delete Category'
   ]);
}
