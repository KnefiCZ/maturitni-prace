<?php require_once "vendor" . DIRECTORY_SEPARATOR . "autoload.php";?>
<?php require_once "header.php";?>
    <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Tabulka UŽIVATELŮ</h1>
      <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
            <table class="table border">
            <thead>
            <tr>
                <th>ID</th>
                <th>Jméno</th>
                <th>Příjmení</th>
                <th>Email</th>
                <th>Heslo</th>
                <th>Datum narození</th>
                <th>Bydliště</th>
              </tr>
            </thead>
            <tbody>  
                <?php 
                  try {
                      $users = UserModel::getUsers();
                  } catch (\Throwable $th) {
                      echo "Nepovedl se SELECT z users!" . "<br>";
                      $users = array();
                      var_dump($th);
                  }           
                ?>
            <?php  foreach ($users as $user) {
                ?> <tr>
                <td><?php echo $user->id_user;?></td>
                <td><?php echo $user->firstname;?></td>
                <td><?php echo $user->lastname;?></td>
                <td><?php echo $user->email;?></td>
                <td><?php echo $user->password;?></td>
                <td><?php echo $user->birthdate;?></td>
                <td><?php echo $user->address;?></td>
                <?php
                      } ?>     
              </tr>            
            </tbody>
          </table>
          <form action="add_user.php">
            <input class="btn btn-primary" type="submit" value="Přidat další do UŽIVATELŮ.">
          </form>
      </div>
      </div>
      </div>
<?php require_once "footer.php";?>
