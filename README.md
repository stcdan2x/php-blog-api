## Vanilla PHP REST API for blog sites

Basic pattern for a PHP REST API without using any framework, to be used for blog-type sites

### Database structure

post:
+-------------+--------------+------+-----+-------------------+-------------------+
| Field       | Type         | Null | Key | Default           | Extra             |
+-------------+--------------+------+-----+-------------------+-------------------+
| id          | int          | NO   | PRI | NULL              | auto_increment    |
| category_id | int          | NO   |     | NULL              |                   |
| title       | varchar(255) | NO   |     | NULL              |                   |
| body        | text         | NO   |     | NULL              |                   |
| author      | varchar(255) | NO   |     | NULL              |                   |
| created_at  | datetime     | NO   |     | CURRENT_TIMESTAMP | DEFAULT_GENERATED |
+-------------+--------------+------+-----+-------------------+-------------------+

categories:
+------------+--------------+------+-----+-------------------+-------------------+
| Field      | Type         | Null | Key | Default           | Extra             |
+------------+--------------+------+-----+-------------------+-------------------+
| id         | int          | NO   | PRI | NULL              | auto_increment    |
| name       | varchar(255) | NO   |     | NULL              |                   |
| created_at | datetime     | NO   |     | CURRENT_TIMESTAMP | DEFAULT_GENERATED |
+------------+--------------+------+-----+-------------------+-------------------+
