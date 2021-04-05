<?php include_once "header.php";?>
<?php
  $idTasklist = filter_input(INPUT_GET, 'id_tasklist'); // z URL načtené ID
  $tasks = TaskModel::getTasksByTasklist($idTasklist);
  $tasklist = TaskModel::getTasklist($idTasklist);
  $roleName = UserModel::getRole();
  if(in_array($roleName, ['admin', 'submitter', 'implementer'])) {
?>
  <?php foreach ($tasks as $task) { ?>
    <h1 class="h3 mb-2 text-gray-800">Seznam úkolů: <?php echo $tasklist->name; ?> </h1>
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table border">
              <thead>
              <tr>
                  <th>ID Tásku</th>
                  <th>Název</th>
                  <th>Popisek</th>
                  <th>Vytvořeno v:</th>
                  <th>Dokončit do:</th>
                  <th>ID Tásk listu</th>
                </tr>
              </thead>
              <tbody>  
              <tr>
                  <td><?php echo $task->id_task;?></td>
                  <td><a href="taskDetail.php?id_task=<?= $task->id_task ?>">
                  <?php echo $task->title;?></a></td>
                  <td><?php echo $task->description;?></td>
                  <td><?php echo $task->datetime_from;?></td>
                  <td><?php echo $task->datetime_to;?></td>
                  <td><?php echo $task->id_tasklist;?></td>    
              </tr>            
              </tbody>
            </table>
            <form action="add_task.php">
              <input class="btn btn-primary" type="submit" value="Přidat další.">
            </form>
          </div>
        </div>
      </div>
  <?php      
    } ?>
      <?php } else {
         header("location:index.php");
      } ?>
<?php require_once "footer.php";?>
