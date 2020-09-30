<?php require_once "vendor" . DIRECTORY_SEPARATOR . "autoload.php";?>
<?php require_once "header.php";?>
    <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Tabulka TÁSKŮ</h1>
      <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
            <table class="table border">
            <thead>
            <tr>
                <th>ID</th>
                <th>Název</th>
                <th>Popisek</th>
                <th>Vytvořeno v:</th>
                <th>Dokončit do:</th>
              </tr>
            </thead>
            <tbody>  
                <?php 
                  try {
                      $tasks = TaskModel::getTasks();
                  } catch (\Throwable $th) {
                      echo "Nepovedl se SELECT z tasks!" . "<br>";
                      $tasks = array();
                      var_dump($th);
                  }           
                ?>
            <?php  foreach ($tasks as $task) {
                ?> <tr>
                <td><?php echo $task->id_task;?></td>
                <td><?php echo $task->title;?></td>
                <td><?php echo $task->description;?></td>
                <td><?php echo $task->datetime_from;?></td>
                <td><?php echo $task->datetime_to;?></td>
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
<?php require_once "footer.php";?>
