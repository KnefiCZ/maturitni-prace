<?php 
    //TaskModel.php rozšiřuje Model.php a propojuje v databázi tabulku tasks.
    use Illuminate\Database\Capsule\Manager as DB;

        class TasklistModel extends Model {
            //SELECT
            public static function getTasklists() {
                $tasklists=DB::select("SELECT *
                                   FROM tasklists"
                );
                return $tasklists;
            }
            //INSERT
            public static function addTasklist($name, $description) {
           
                $inserted = DB::insert("INSERT INTO tasklists
                                    (name,
                                    description,
                                    created_at)
                                     VALUES(
                                         '$name',
                                         '$description',
                                         NOW());");
        
                  return $inserted;
                
            }
        }
?>