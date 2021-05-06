<?php include_once "header.php";?>
<?php
  $idUser = filter_input(INPUT_GET, 'id_user'); // z URL načtené ID
  $user = UserModel::getUser($idUser);
  $roleName = UserModel::getRole();
  $submit = filter_input(INPUT_POST, 'submit');
  if (in_array($roleName, ['admin', 'submitter', 'implementer'])) {
      ?>
<?php
$message = "Stránka byla načtena...";
      if (isset($submit)) {
        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $email = filter_input(INPUT_POST, 'email');
        $phonenumber = filter_input(INPUT_POST, 'phonenumber');
        $birthdate = filter_input(INPUT_POST, 'birthdate');
        $SQLbirthdate = date('Y-m-d', strtotime($birthdate));
        $address = filter_input(INPUT_POST, 'address');
        $city = filter_input(INPUT_POST, 'city');
        $id_role = filter_input(INPUT_POST, 'id_role');

          $message = "Stránka byla načtena odesláním formuláře...";
          $result = UserModel::updateUser($idUser, $firstname, $lastname, $email, /*$password,*/ $phonenumber, $birthdate, $address, $city, $id_role);
          if ($result) {
              $message .= "Tásk byl úspěšně přídán...";
          } else {
              $message .= "Nebylo možné přidat!!";
          }
      } 
      $user = UserModel::getUser($idUser);
      
      ?>
    <form action="userEdit.php?id_user=<?= $idUser; ?>" method="post">
        <label for="firstname" class="col-sm-2 col-form-label">Jméno:</label>
            <input type="text" name="firstname" value="<?php echo $user->firstname; ?>"> <br>
        <label for="lastname" class="col-sm-2 col-form-label">Příjmení:</label>
            <input type="text" name="lastname" id="lastname" value="<?= $user->lastname; ?>"> <br>
        <label for="email" class="col-sm-2 col-form-label">Email:</label>
            <input type="text" name="email" id="email" value="<?= $user->email; ?>"> <br>
        <label for="phonenumber" class="col-sm-2 col-form-label">Tel. číslo:</label>
            <input type="number" name="phonenumber" id="phonenumber" value="<?= $user->phonenumber; ?>"> <br>
        <label for="birthdate" class="col-sm-2 col-form-label">Datum narození:</label>
            <input type="date" name="birthdate" id="birthdate" value="<?php echo str_replace(' ', 'T', $user->birthdate); ?>"> <br>
        <label for="address" class="col-sm-2 col-form-label">Adresa:</label>
            <input type="text" name="address" id="address" value="<?= $user->address; ?>"> <br>
        <label for="city" class="col-sm-2 col-form-label">Město:</label>
            <input type="text" name="city" id="city" value="<?= $user->city; ?>"> <br>
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
        <?php 
        } 
   else {
         header("location:index.php");
      } ?>
<?php require_once "footer.php";?>
