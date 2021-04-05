<?php include_once "header.php";?>
<?php
  $idTask = filter_input(INPUT_GET, 'id_task'); // z URL načtené ID
  $task = TaskModel::getTask($idTask);
  $roleName = UserModel::getRole();
  if(in_array($roleName, ['admin', 'submitter', 'implementer'])) {
?>
<h1>Popis úkolu: <?= $task->title; ?></h1>
    <p>Popisek úkolu: <?= $task->description; ?></p>
    <p>Úkol zadán v: <?= $task->datetime_from; ?></p>
    <p>Úkol vypracovat do: <?= $task->datetime_to; ?></p>
    <p>Název a ID tasklistu: <?= $task->title; ?>, <?= $task->id_tasklist; ?></p>

      <a href="taskEdit.php?id_task=<?= $task->id_task ?>">Edit tásku</a>
      <?php } else {
         header("location:index.php");
      } ?>
<?php require_once "footer.php";?>
