<?php

  if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    return;
  }

  if ($_GET['todo_type'] == 'short_term' || $_GET['todo_type'] == 'long_term') {
    try {
      $credentials_path = '../../database/mysql_credentials.json';
      $credentials_string = file_get_contents($credentials_path);
      $credentials_json = json_decode($credentials_string, true);

      $conn = new PDO($credentials_json['dsn'], $credentials_json['username'], $credentials_json['password']);
      $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $todo_list_items_query = "SELECT item_id, item_name FROM " . $_GET['todo_type'] . " ORDER BY item_id;";

      $todo_list_items_stmt = $conn -> prepare($todo_list_items_query);

      $todo_list_items_stmt -> execute();

      $todo_list_items_data = $todo_list_items_stmt -> fetchAll(PDO::FETCH_ASSOC);

      echo json_encode(array('todo_list_items' => $todo_list_items_data));
      // echo json_encode(array('todo_list_items' => array(array('item_id'=>'3', 'item_name'=>'Fix this dumb project'))));

      $conn = null;
    } catch (PDOException $e) {
        echo json_encode('Connection Failed: ' . $e -> getMessage());
    }
  }

?>
