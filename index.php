<?php require_once "vendor/autoload.php";?>

<html lang="cz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/application.min.css">
    <title>MATURITNÍ - PRÁCE</title>
</head>
<body>
<?php require_once "menu.php";?>
    <div class="content-wrap">
      <main id="content" class="content" role="main">
        <div class="row">
          <h1>Výpis tásků</h1>
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
            <input type="submit" value="Přidat další do TASKS.">
          </form>
        </div>
</main>
</div>
</body>
</html>