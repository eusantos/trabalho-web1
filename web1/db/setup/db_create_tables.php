<?php

  require('../db_utils.php');

  $sql = "CREATE TABLE users (
    id BIGINT(8) NOT NULL AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL UNIQUE,
    md5_password VARCHAR(200) NOT NULL,
    role VARCHAR(50),
    PRIMARY KEY (id)
  )";

  run_sql($sql);

  $sql = "CREATE TABLE categories (
    id BIGINT(8) NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
  )";

  run_sql($sql);

  $sql = "CREATE TABLE posts (
    id BIGINT(8) NOT NULL AUTO_INCREMENT ,
    user_id BIGINT(8) NOT NULL,
    title VARCHAR(100) NOT NULL,
    resume text NOT NULL,
    thumbnail_link VARCHAR(500) NOT NULL,
    content text NOT NULL,
    category_id BIGINT(8) NOT NULL,
    dthr TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (category_id) REFERENCES categories (id)
  )";

  run_sql($sql);

  $sql = "CREATE TABLE comments (
    id BIGINT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT(8) NOT NULL,
    content text NOT NULL,
    post_id BIGINT(8) NOT NULL,
    dthr TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (post_id) REFERENCES posts(id)
  )";

  run_sql($sql);
?>