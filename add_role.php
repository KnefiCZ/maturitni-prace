<?php require_once "header.php";?>
<?php 
  $roleName = UserModel::getRole();
  if(in_array($roleName, ['admin'])) {
?>
<?php 
    $name = filter_input(INPUT_POST, 'name');
    $description = filter_input(INPUT_POST, 'description');
    $submit = filter_input(INPUT_POST, 'submit');

        $message = "Stránka byla načtena...";
    if(isset($submit)) {
        $message = "Stránka byla načtena odesláním formuláře...";
        $result = RoleModel::addRole($name, $description);
        if($result) {
            $message .= "Tásk byl úspěšně přídán...";       
        }
        else {
            $message .= "Nebylo možné přidat!!";
        }
    }

?>

<h1>Přidání role...</h1>
<form action="add_role.php" method="post">

    <label for="title" class="col-sm-2 col-form-label">Název:</label>
            <input type="text" name="name" placeholder="..."> <br>
    <label for="description" class="col-sm-2 col-form-label">Popis:</label>
            <textarea rows="1" cols="25" name="description" id="description" placeholder="Popisek úkolu..."></textarea> <br>
    <input type="submit" name="submit" id="submit"> 
    <?php echo $message;?> 
<hr>
</form>
<?php } else {
         header("location:index.php");
      } ?>
<? require_once "footer.php";?>
