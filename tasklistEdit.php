<?php include_once "header.php";?>
<?php
  $idTasklist = filter_input(INPUT_GET, 'id_tasklist'); // z URL načtené ID
  $tasklist = TaskModel::getTasklist($idTasklist);
  $roleName = UserModel::getRole();
  if(in_array($roleName, ['admin', 'submitter', 'implementer'])) {
      ?>
<?php
$message = "Stránka byla načtena...";
      if (isset($submit)) {
        $id_tasklist = filter_input(INPUT_POST, 'idTasklist');
        $name = filter_input(INPUT_POST, 'name');
        $description = filter_input(INPUT_POST, 'description'); //PHP formát date
        
          $message = "Stránka byla načtena odesláním formuláře...";
          $result = TaskModel::updateTasklist($idTasklist, $name, $description);
          if ($result) {
              $message .= "Tásklist byl úspěšně přídán...";
          } else {
              $message .= "Nebylo možné přidat!!";
          }
      } 
      $task = TaskModel::getTasklist($idTasklist);
      
      ?>
<form action="taskEdit.php?id_task=<?= $idTasklist; ?>" method="post">
    <label for="title">Název:</label>
            <input type="text" name="name" value="<?php echo $tasklist->name; ?>"> <br>
    <label for="description">Popis:</label>
            <textarea rows="1" cols="25" name="description" id="description" placeholder="Popisek úkolu..."><?php echo $tasklist->description; ?></textarea> <br>
    <input type="submit" name="submit" id="submit"> 
        <?php 
        } 
   else {
         header("location:index.php");
      } ?>
<?php require_once "footer.php";?>
