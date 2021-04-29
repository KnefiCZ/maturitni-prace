<?php
  require_once "vendor/autoload.php";
  $idTasklist = filter_input(INPUT_GET, 'id_tasklist');
  $tasklist = TaskModel::deleteTasklist($idTasklist);
  header("location:select_tasklists.php");
?>
