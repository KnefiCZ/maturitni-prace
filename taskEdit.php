<?php include_once "header.php";?>
<?php
    //ONLY REALIZATOR A AMDIN
    //mazani tasku
  $idTask = filter_input(INPUT_GET, 'id_task'); // z URL načtené ID
  $roleName = UserModel::getRole();
  $submit = filter_input(INPUT_POST, 'submit');
 
  if (in_array($roleName, ['admin', 'submitter', 'implementer'])) {
      ?>
<?php
$message = "Stránka byla načtena...";
      if (isset($submit)) {
        $title = filter_input(INPUT_POST, 'title');
        $description = filter_input(INPUT_POST, 'description');
        $datetime_from = filter_input(INPUT_POST, 'datetime_from'); //PHP formát date
        //$SQLdatetime_from = date('Y-m-d H:i:s', strtotime($datetime_from)); //Přeformátování do MySQL formátu
        $datetime_to = filter_input(INPUT_POST, 'datetime_to');
        //$SQLdatetime_to = date('Y-m-d H:i:s', strtotime($datetime_to));
        $idTasklist = filter_input(INPUT_POST, 'idTasklist');
    
          $message = "Stránka byla načtena odesláním formuláře...";
          $result = TaskModel::updateTask($idTask, $title, $description, $datetime_from, $datetime_to, $idTasklist);
          if ($result) {
              $message .= "Tásk byl úspěšně přídán...";
          } else {
              $message .= "Nebylo možné přidat!!";
          }
      } 
      $task = TaskModel::getTask($idTask);
      $tasklists = TaskModel::getTasklists();
      ?>
<form action="taskEdit.php?id_task=<?= $idTask; ?>" method="post">
    <label for="title" class="col-sm-2 col-form-label">Název:</label>
            <input type="text" name="title" value="<?php echo $task->title; ?>"> <br>
    <label for="description" class="col-sm-2 col-form-label">Popis:</label>
            <textarea rows="1" cols="25" name="description" id="description" placeholder="Popisek úkolu..."><?php echo $task->description; ?></textarea> <br>
    <label for="datetime_from" class="col-sm-2 col-form-label">Začít úkol od: (Originální hodnota: <b><?php echo $task->datetime_from; ?> </b>)</label>
            <input name="datetime_from" id="datetime_from" type="datetime-local" value="<?php echo str_replace(' ', 'T', $task->datetime_from) ?>"> <br>
    <label for="datetime_to" class="col-sm-2 col-form-label">Dokončit úkol do: (Originální hodnota: <b> <?php echo $task->datetime_to; ?> </b>)</label>
            <input name="datetime_to" type="datetime-local" value="<?php echo str_replace(' ', 'T', $task->datetime_to); ?>"> <br>
    <label for="idTasklist" class="col-sm-2 col-form-label">Kategorie tasklistu (Originální hodnota: <b> <?php echo $task->id_tasklist; ?> </b>)</label>
    <select name="idTasklist" id="idTasklist" class="col-sm-2 col-form-label">
        <?php
            $tasklists = TaskModel::getTasklists();
            foreach ($tasklists as $tasklist) { ?>
                    <option value="<?php echo $task->id_tasklist; ?>"><?= $tasklist->name?></option>
        <?php } ?>
            </select> <br> 
    <input type="submit" name="submit" id="submit"> 
        <?php 
        } 
   else {
         header("location:index.php");
      } ?>
<?php require_once "footer.php";?>
