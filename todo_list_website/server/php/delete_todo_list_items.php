<?php

  if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    return;
  }

  if ($_POST['todo_type'] == 'short_term' || $_POST['todo_type'] == 'long_term') {
    foreach ($_POST['delete_ids'] as $delete_id) {
      try {
        $credentials_path = '../../database/mysql_credentials.json';
        $credentials_string = file_get_contents($credentials_path);
        $credentials_json = json_decode($credentials_string, true);

        $conn = new PDO($credentials_json['dsn'], $credentials_json['username'], $credentials_json['password']);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $expenses_stmt = $conn -> prepare("DELETE FROM " . $_POST['todo_type'] . " WHERE item_id=:item_id;");
        // TODO: Check for existence of variables
    		$expenses_stmt -> bindParam(':item_id', $delete_id['item_id'], PDO::PARAM_STR);
    		$expenses_stmt -> execute();

        $conn -> null;
      } catch (PDOException $e) {
        echo 'Connection Failed: ' . $e -> getMessage();
      }
    }
  }

?>
