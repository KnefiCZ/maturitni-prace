<?php 
    //TaskModel.php rozšiřuje Model.php a propojuje v databázi tabulku tasks.
    use Illuminate\Database\Capsule\Manager as DB;

        class TaskModel extends Model {
            //SELECT
            public static function getTasks() {
                $tasks=DB::select("SELECT *
                                   FROM tasks"
                );
                return $tasks;
            }
            //INSERT
            public static function addTask($title, $description, $datetime_from, $datetime_to, $id_tasklist) {
           
                $inserted = DB::insert("INSERT INTO tasks 
                                    (title,
                                    description,
                                    datetime_from,
                                    datetime_to,
                                    id_tasklist)
                                     VALUES(
                                         '$title',
                                         '$description',
                                         '$datetime_from',
                                         '$datetime_to',
                                         '$id_tasklist');");
        
                  return $inserted;
                
            }
        }
?>