<?php require_once "header.php";?>
<?php 
  $roleName = UserModel::getRole();
  if(in_array($roleName, ['admin'])) {
?>
<?php //PROC TO TED NEFUNGUJE FUNGOVALO TO FURT A TED NEEEEEEEEEEE!
        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $phonenumber = filter_input(INPUT_POST, 'phonenumber');;
        $birthdate = filter_input(INPUT_POST, 'birthdate');
        $SQLbirthdate = date('Y-m-d', strtotime($birthdate));
        $address = filter_input(INPUT_POST, 'address');
        $city = filter_input(INPUT_POST, 'city');
        $id_role = filter_input(INPUT_POST, 'id_role');
        $submit = filter_input(INPUT_POST, 'submit');

        $message = "Stránka byla načtena...";
        if(isset($submit)) {
                $message = "Stránka byla načtena odesláním formuláře...";
                $result = UserModel::addUser($firstname, $lastname, $email, $password, $phonenumber, $birthdate, $address, $city, $id_role);
                if($result) {
                        $message .= "Uživatel byl úspěšně přídán...";       
                }
                else {
                        $message .= "Nebylo možné přidat!!";
        }
        }

?>

<h1>Přidání uživatele...</h1>
<form action="add_user.php"method="post">
    <label for="firstname" class="col-sm-2 col-form-label">Jméno:</label>
            <input type="text" name="firstname"> <br>
    <label for="lastname" class="col-sm-2 col-form-label">Příjmení:</label>
            <input type="text" name="lastname"> <br>
    <label for="email" class="col-sm-2 col-form-label">Email:</label>
            <input name="email" type="email" placeholder="xxxx@yyyy.xy"><br>
    <label for="password" class="col-sm-2 col-form-label">Heslo:</label>
            <input name="password" type="password" placeholder="********"><br>
    <label for="phonenumber" class="col-sm-2 col-form-label">Telefoní číslo:</label>
            <input name="phonenumber" type="number"><br>
    <label for="birthdate" class="col-sm-2 col-form-label">Datum narození:</label>
            <input name="birthdate" type="date"><br>
    <label for="address" class="col-sm-2 col-form-label">Adresa:</label>
            <input name="address" type="text" placeholder="..."><br>
    <label for="city" class="col-sm-2 col-form-label">Město:</label>
            <input name="city" type="text" placeholder="..."><br>
    <label for="id_role" class="col-sm-2 col-form-label">Role:</label>
    <select name="id_role" id="id_role">
                            <?php 
                                    $roles = RoleModel::getRoles();

                            foreach ($roles as $role) { ?>
                                        <option value="<?php echo $role->id_role?>"><?php echo $role->name?></option>
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

 
