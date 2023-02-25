## Vanilla PHP REST API for blog sites

Basic pattern for a PHP REST API without using any framework, to be used for blog-type sites.

This is accessible through any front end app or REST client.

### Database structure

categories:

| Field      | Type     | Null | Key | Default           | Extra             |
|------------|----------|------|-----|-------------------|-------------------|
| id         | int      | NO   | PRI | NULL              | auto_increment    |
| name       | int      | NO   |     | NULL              |                   |
| created_at | datetime | NO   |     | CURRENT_TIMESTAMP | DEFAULT_GENERATED |

posts:

| Field       | Type         | Null | Key | Default           | Extra             |
|-------------|--------------|------|-----|-------------------|-------------------|
| id          | int          | NO   | PRI | NULL              | auto_increment    |
| category_id | int          | NO   |     | NULL              |                   |
| title       | varchar(255) | NO   |     | NULL              |                   |
| body        | text         | NO   |     | NULL              |                   |
| author      | varchar(255) | NO   |     | NULL              |                   |
| created_at  | datetime     | NO   |     | CURRENT_TIMESTAMP | DEFAULT_GENERATED |


