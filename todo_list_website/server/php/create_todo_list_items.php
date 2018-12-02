<?php

  if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    return;
  }

  if ($_POST['todo_type'] == 'short_term' || $_POST['todo_type'] == 'long_term') {
    foreach ($_POST['new_item_names'] as $new_item_name) {
      try {
        $credentials_path = '../../database/mysql_credentials.json';
        $credentials_string = file_get_contents($credentials_path);
        $credentials_json = json_decode($credentials_string, true);

        $conn = new PDO($credentials_json['dsn'], $credentials_json['username'], $credentials_json['password']);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $expenses_stmt = $conn -> prepare("INSERT INTO " . $_POST['todo_type'] . " (item_name) VALUES (:item_name);");
        // TODO: Check for existence of variables
        $expenses_stmt -> bindParam(':item_name', $new_item_name['item_name'], PDO::PARAM_STR);
        $expenses_stmt -> execute();

        $conn -> null;
      } catch (PDOException $e) {
        echo 'Connection Failed: ' . $e -> getMessage();
      }
    }
  }

?>
