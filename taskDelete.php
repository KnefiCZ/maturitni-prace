<?php
  require_once "vendor/autoload.php";
  $idTask = filter_input(INPUT_GET, 'id_task'); // z URL načtené ID
  $idTasklist = filter_input(INPUT_GET, 'id_tasklist');
  $task = TaskModel::deleteTask($idTask);
  header("location:tasklistDetail.php?id_tasklist=" . $idTasklist);
?>
