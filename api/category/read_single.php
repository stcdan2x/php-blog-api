<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Category.php';

// instantiate DB & connect
$database = new Database();
$db = $database->connect();

// instantiate blog category object
$cat = new Category($db);

// get ID
$cat->id = isset($_GET['id']) ? $_GET['id'] : die('No identifier provided for fetching specific data.');

// get post
$cat->read_single();

// create array
$cat_arr = [
   'id' => $cat->id,
   'name' => $cat->name,
   'created_at' => $cat->created_at
];

// convert to JSON and output created array
echo (json_encode($post_arr));
