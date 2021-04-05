<?php include_once "header.php";?>
<?php
  $roleName = UserModel::getRole();
  if(in_array($roleName, ['admin', 'submitter', 'implementer'])) {
?>
    <?php foreach ($tasklists as $tasklist) { ?>
        <h1 class="h3 mb-2 text-gray-800">Seznam: <?php echo $TaskList; ?> </h1>
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
                  <?php 
                  try {
                        $tasks = TaskModel::getTasks();
                  } catch (\Throwable $th) {
                      echo "Nepovedl se SELECT z tasks!" . "<br>";
                      $tasks = array();
                  }           
                  ?>
              <?php  foreach ($tasks as $task) {
                  ?> <tr>
                  <td><?php echo $task->id_task;?></td>
                  <td><?php echo $task->title;?></td>
                  <td><?php echo $task->description;?></td>
                  <td><?php echo $task->datetime_from;?></td>
                  <td><?php echo $task->datetime_to;?></td>
                  <td><?php echo $task->id_tasklist;?></td>
                  <?php
              } ?>     
                </tr>            
              </tbody>
            </table>
            <form action="add_task.php">
              <input class="btn btn-primary" type="submit" value="Přidat další do TASKS.">
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
