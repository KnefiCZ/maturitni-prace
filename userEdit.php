<?php include_once "header.php";?>
<?php
  $idUser = filter_input(INPUT_GET, 'id_user'); // z URL načtené ID
  $user = UserModel::getUser($idUser);
  $roleName = UserModel::getRole();
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
        $address = filter_input(INPUT_POST, 'address');
        $city = filter_input(INPUT_POST, 'city');

          $message = "Stránka byla načtena odesláním formuláře...";
          $result = UserModel::updateUser($idUser, $firstname, $lastname, $email, $password, $phonenumber, $birthdate, $address, $city, $id_role);
          if ($result) {
              $message .= "Tásk byl úspěšně přídán...";
          } else {
              $message .= "Nebylo možné přidat!!";
          }
      } 
      $user = UserModel::getUser($idUser);
      
      ?>
<form action="userEdit.php?id_user=<?= $idUser; ?>" method="post">
    <label for="firstname">Jméno:</label>
            <input type="text" name="firstname" value="<?php echo $user->firstname; ?>"> <br>
    <label for="lastname">Příjmení:</label>
            <textarea rows="1" cols="25" name="lastname" id="lastname"><?php echo $user->lastname; ?></textarea> <br>
    <label for="datetime_from">Začít úkol od: (Originální hodnota: <b><?php echo $user->datetime_from; ?> </b>)</label>
            <input name="datetime_from" id="datetime_from" type="datetime-local" value="<?php echo str_replace(' ', 'T', $user->datetime_from) ?>"> <br>
    <label for="datetime_to">Dokončit úkol do: (Originální hodnota: <b> <?php echo $user->datetime_to; ?> </b>)</label>
            <input name="datetime_to" type="datetime-local" value="<?php echo str_replace(' ', 'T', $user->datetime_to); ?>"> <br>
    <label for="idTasklist">Kategorie userlistu </label>
    <select name="idTasklist" id="idTasklist">
        <?php
            $userlists = TaskModel::getTasklists();
      foreach ($userlists as $userlist) { ?>
            <option value="<?php echo $user->id_userlist; ?>"><?= $userlist->name?></option>
        <?php
        }?>
            </select> <br> 
    <input type="submit" name="submit" id="submit"> 
        <?php 
        } 
   else {
         header("location:index.php");
      } ?>
<?php require_once "footer.php";?>
