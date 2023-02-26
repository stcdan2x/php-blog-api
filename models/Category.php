<?php
class Category {
  // table selection
  private $conn;
  private $table = 'categories';

  // categories properties
  public $id;
  public $name;
  public $created_at;

  // constructor with DB
  public function __construct($db) {
    $this->conn = $db;
  }

  // get categories
  public function read_all() {
    // create query
    $query = 'SELECT
        id,
        name,
        created_at
      FROM
        ' . $this->table . '
      ORDER BY
        created_at DESC';

    // prepare statement
    $stmt = $this->conn->prepare($query);

    // execute query
    $stmt->execute();

    return $stmt;
  }

  // get single category
  public function read_single() {
    // create query
    $query = 'SELECT
          id,
          name
        FROM
          ' . $this->table . '
        WHERE id = ?
        LIMIT 0,1';

    // prepare statement
    $stmt = $this->conn->prepare($query);

    // bind ID
    $stmt->bindParam(1, $this->id);

    // execute query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // set properties
    $this->id = $row['id'];
    $this->name = $row['name'];
  }

  // create Category
  public function create() {
    // create Query
    $query = 'INSERT INTO ' .
      $this->table . '
    SET
      name = :name';

    // prepare Statement
    $stmt = $this->conn->prepare($query);

    // clean data
    $this->name = htmlspecialchars(strip_tags($this->name));

    // bind data
    $stmt->bindParam(':name', $this->name);

    // execute query
    if ($stmt->execute()) {
      return true;
    }

    // print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  // update Category
  public function update() {
    // create Query
    $query = 'UPDATE ' .
      $this->table . '
    SET
      name = :name
      WHERE
      id = :id';

    // prepare Statement
    $stmt = $this->conn->prepare($query);

    // clean data
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->id = htmlspecialchars(strip_tags($this->id));

    // bind data
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':id', $this->id);

    // execute query
    if ($stmt->execute()) {
      return true;
    }

    // print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  // delete Category
  public function delete() {
    // create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

    // prepare Statement
    $stmt = $this->conn->prepare($query);

    // clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // bind Data
    $stmt->bindParam(':id', $this->id);

    // execute query
    if ($stmt->execute()) {
      return true;
    }

    // print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }
}
