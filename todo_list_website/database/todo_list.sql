CREATE DATABASE todo_list;

USE todo_list;

CREATE TABLE short_term (
  item_id INT(7) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  item_name VARCHAR(64)
);
INSERT INTO short_term VALUES (1, 'Something easy');

CREATE TABLE long_term (
  item_id INT(7) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  item_name VARCHAR(64)
);
INSERT INTO long_term VALUES (2, 'Something important');
