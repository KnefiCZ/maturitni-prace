<?php 
    //RoleModel.php rozšiřuje Model.php a propojuje v databázi tabulku tasks.
    use Illuminate\Database\Capsule\Manager as DB;

class RoleModel extends Model
{
    //SELECT
    public static function getRoles()
    {
        $roles=DB::select(
            "SELECT *
                                   FROM roles"
        );
        return $roles;
    }
    //INSERT
    public static function addRole($name, $description)
    {
           
        $inserted = DB::insert(
            "INSERT INTO roles 
                                    (name,
                                    description,)
                                     VALUES(
                                         '$name',
                                         '$description');"
        );
        
          return $inserted;
                
    }
}
?>
