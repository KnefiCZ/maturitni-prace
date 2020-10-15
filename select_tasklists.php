<?php require_once "vendor" . DIRECTORY_SEPARATOR . "autoload.php";?>
<?php require_once "header.php";?>
    <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Tabulka ROLÍ</h1>
      <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
            <table class="table border">
            <thead>
            <tr>
                <th>ID seznamu</th>
                <th>Název</th>
                <th>Popis</th>
              </tr>
            </thead>
            <tbody>  
                <?php 
                  try {
                      $tasklists = TasklistModel::getTasklists();
                  } catch (\Throwable $th) {
                      echo "Nepovedl se SELECT ze seznamů!" . "<br>";
                      $tasklists = array();
                      var_dump($th);
                  }           
                ?>
            <?php  foreach ($tasklists as $tasklist) {
                ?> <tr>
                <td><?php echo $tasklist->id_tasklist;?></td>
                <td><?php echo $tasklist->name;?></td>
                <td><?php echo $tasklist->description;?></td>
                <td><?php echo $tasklist->created_at;?></td>
                <?php
                      } ?>     
              </tr>            
            </tbody>
          </table>
          <form action="add_tasklist.php">
            <input class="btn btn-primary" type="submit" value="Přidat další do ROLÍ.">
          </form>
      </div>
      </div>
      </div>
<?php require_once "footer.php";?>
