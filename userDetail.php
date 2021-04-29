<?php require_once "header.php";?> 
<?php 
  $idUser = filter_input(INPUT_GET, 'id_user'); // z URL načtené ID
  $user = UserModel::getUser($idUser);
  $roleName = UserModel::getRole();
  if(in_array($roleName, ['admin'])) {
?>
      <h1 class="h3 mb-2 text-gray-800">Tabulka UŽIVATELE</h1>
      <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
            <table class="table border">
            <thead>
            <tr>
                <th>ID uživatele</th>
                <th>Jméno</th>
                <th>Příjmení</th>
                <th>Email</th>
                <th>Tel. číslo</th>
                <th>Datum narození</th>
                <th>Adresa</th>
                <th>Město</th>
                <th>ID role</th>
              </tr>
            </thead>
            <tbody>  
             <tr>
                <td><?php echo $user->id_user;?></td>
                <td><?php echo $user->firstname;?></td>
                <td><?php echo $user->lastname;?></td>
                <td><?php echo $user->email;?></td>
                <td><?php echo $user->phonenumber;?></td>
                <td><?php echo $user->birthdate;?></td>
                <td><?php echo $user->address;?></td>
                <td><?php echo $user->city;?></td>
                <td><?php  $roles = RoleModel::getRoles();
                           echo $user->id_role;?></td>    
              </tr>            
            </tbody>
          </table>
          <form action="add_user.php">
            <input class="btn btn-primary" type="submit" value="Přidat další.">
            <a class="btn btn-primary" href="userEdit.php?id_user=<?= $idUser ?>">Úprava uživatele</a>
          </form>
      </div>
      </div>
      </div>
      <?php } else {
         header("location:index.php");
      } ?>
<?php require_once "footer.php";?>
