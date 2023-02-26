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

// blog post query
$postResult = $post->read_all();
// get row count
$count = $postResult->rowCount();

// check if any posts
if ($count > 0) {
   // post array
   $posts_arr = array();

   $row = $catResult->fetch(PDO::FETCH_ASSOC);

   while ($row) {
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

      // push to $posts_arr
      array_push($posts_arr, $post_item);
   }

   // convert php array to JSON and output
   echo json_encode($posts_arr);
} else {
   // no existing Posts
   echo json_encode(
      array('message' => 'No Posts Found')
   );
}
