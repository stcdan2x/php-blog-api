<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$post = new Post($db);

// Blog post query
$postResult = $post->read_all();
// Get row count
$num = $postResult->rowCount();

// Check if any posts
if ($num > 0) {
   // Post array
   $posts_arr = array();
   $posts_arr['data'] = array();

   while ($row = $postResult->fetch(PDO::FETCH_ASSOC)) {
      // using extract() to use $title directly instead of $row['title'], $row['id'], etc. (sort of like desctructuring)
      extract($row);

      $post_item = array(
         'id' => $id,
         'title' => $title,
         'body' => html_entity_decode($body), // add html_entity_decode() in case the post in the blog contains html snippets
         'author' => $author,
         'category_id' => $category_id,
         'category_name' => $category_name
      );

      // Push to 'data' array inside $posts_arr
      array_push($posts_arr['data'], $post_item);
   }

   // convert php array to JSON & output
   echo json_encode($posts_arr);
} else {
   // No existing Posts
   echo json_encode(
      array('message' => 'No Posts Found')
   );
}
