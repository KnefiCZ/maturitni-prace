<?php require_once "header.php";?>
<?php 
  $roleName = UserModel::getRole();
  if(in_array($roleName, ['admin'])) {
?>

      <h1 class="h3 mb-2 text-gray-800">Tabulka ROLÍ</h1>
      <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
            <table class="table border">
            <thead>
            <tr>
                <th>ID role</th>
                <th>Název role</th>
                <th>Popis</th>
              </tr>
            </thead>
            <tbody>  
                <?php 
                try {
                    $roles = RoleModel::getRoles();
                } catch (\Throwable $th) {
                    echo "Nepovedl se SELECT z roles!" . "<br>";
                    $roles = array();
                    var_dump($th);
                }           
                ?>
            <?php  foreach ($roles as $role) {
                ?> <tr>
                <td><?php echo $role->id_role;?></td>
                <td><?php echo $role->name;?></td>
                <td><?php echo $role->description;?></td>
                <?php
            } ?>     
              </tr>            
            </tbody>
          </table>
          <form action="add_role.php">
            <input class="btn btn-primary" type="submit" value="Přidat další do ROLÍ.">
          </form>
      </div>
      </div>
      </div>
      <?php } else {
         header("location:index.php");
      } ?>
<?php require_once "footer.php";?>
