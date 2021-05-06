<?php require_once "header.php";?>
<?php 
  $roleName = UserModel::getRole();
  if(in_array($roleName, ['admin', 'implementer', 'submitter'])) {
?>
<?php 
$title = filter_input(INPUT_POST, 'title');
$description = filter_input(INPUT_POST, 'description');
$datetime_from = filter_input(INPUT_POST, 'datetime_from'); //PHP formát date
$SQLdatetime_from = date('Y-m-d H:i:s', strtotime($datetime_from)); //Přeformátování do MySQL formátu
$datetime_to = filter_input(INPUT_POST, 'datetime_to');
$SQLdatetime_to = date('Y-m-d H:i:s', strtotime($datetime_to));
$idTasklist = filter_input(INPUT_POST, 'idTasklist');
$submit = filter_input(INPUT_POST, 'submit');

    $message = "Stránka byla načtena...";
if(isset($submit)) {
    $message = "Stránka byla načtena odesláním formuláře...";
    $result = TaskModel::addTask($title, $description, $datetime_from, $datetime_to, $idTasklist);
    if($result) {
        $message .= "Tásk byl úspěšně přídán...";       
    }
    else {
        $message .= "Nebylo možné přidat!!";
    }
}

?>

<h1>Přidání tasku...</h1>
<form action="add_task.php" method="post">

    <label for="title" class="col-sm-2 col-form-label">Název:</label>
            <input type="text" name="title" placeholder="úkol..."> <br>
    <label for="description" class="col-sm-2 col-form-label">Popis:</label>
            <textarea rows="1" cols="25" name="description" id="description" placeholder="Popisek úkolu..."></textarea> <br>
    <label for="datetime_from" class="col-sm-2 col-form-label">Dokončit úkol od:</label>
            <input name="datetime_from" type="datetime-local"> <br>
    <label for="datetime_to" class="col-sm-2 col-form-label">Dokončit úkol do:</label>
            <input name="datetime_to" type="datetime-local"> <br>
    <label for="idTasklist" class="col-sm-2 col-form-label">Kategorie tasklistu</label>
    <select name="idTasklist" id="idTasklist" class="col-sm-2 col-form-label">
                            <?php 
                                    $tasklists = TaskModel::getTasklists();

                                    foreach ($tasklists as $tasklist) { ?>
                                        <option value="<?= $tasklist->id_tasklist?>"><?= $tasklist->name?></option>
                                    <?php }
                            
                            ?>
            </select> <br> 
    <input type="submit" name="submit" id="submit"> 
    <?php echo $message;?> 
<hr>
</form>
<?php } else {
         header("location:index.php");
      } ?>
<? require_once "footer.php";?>

 
