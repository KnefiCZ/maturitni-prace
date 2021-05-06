<?php include_once "header.php";?>
<?php
  $idTasklist = filter_input(INPUT_GET, 'id_tasklist'); // z URL načtené ID
  $tasks = TaskModel::getTasksByTasklist($idTasklist);
  $tasklist = TaskModel::getTasklist($idTasklist);
  $roleName = UserModel::getRole();
  if(in_array($roleName, ['admin', 'submitter', 'implementer'])) {
?>
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
  <?php foreach ($tasks as $task) { ?>
              <tr>
                  <td><?php echo $task->id_task;?></td>
                  <td><a href="taskDetail.php?id_task=<?= $task->id_task ?>">
                  <?php echo $task->title;?></a></td>
                  <td><?php echo $task->description;?></td>
                  <td><?php echo $task->datetime_from;?></td>
                  <td><?php echo $task->datetime_to;?></td>
                  <td><?php echo $task->id_tasklist;?></td>    
              </tr>            
  <?php      
    } ?>
    </tbody>
    </table>
    
    <form action="add_task.php">
      <input class="btn btn-primary" type="submit" value="Přidat další.">
      <?php // tato tabulka se zobrazí jen ADMINOVY! 
        $roleName = UserModel::getRole();
        if(in_array($roleName, ['admin', 'implementer'])) { ?> 
      <a class="btn btn-primary" href="tasklistEdit.php?id_tasklist=<?= $idTasklist ?>">Úprava seznamu</a>
      <a class="btn btn-primary" href="tasklistDelete.php?id_tasklist=<?= $idTasklist ?>">Smazání seznamu</a>
      <?php } ?>
    </form>
    
     </div>
        </div>
      </div>
      <?php } else {
         header("location:index.php");
      } ?>
<?php require_once "footer.php";?>
