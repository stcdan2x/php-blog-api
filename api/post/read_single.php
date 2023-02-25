<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

// instantiate DB & connect
$database = new Database();
$db = $database->connect();

// instantiate blog post object
$post = new Post($db);

// get ID
$post->id = isset($_GET['id']) ? $_GET['id'] : die('No identifier provided for fetching specific data.');

// get post
$post->read_single();

// create array
$post_arr = array(
   'id' => $post->id,
   'title' => $post->title,
   'body' => $post->body,
   'author' => $post->author,
   'category_id' => $post->category_id,
   'category_name' => $post->category_name
);

// convert to JSON and output created array
echo (json_encode($post_arr));
