<?php 
    //TaskModel.php rozšiřuje Model.php a propojuje v databázi tabulku tasks.
    use Illuminate\Database\Capsule\Manager as DB;

class TaskModel extends Model
{
    //SELECT
    public static function getTasks()
    {
        $tasks=DB::select(
            "SELECT * FROM tasks"
        );
        return $tasks;
    }
    //SELECT TASKU PO ID
    public static function getTasksByTasklistID($idTask)
    {
        $tasks =DB::select("SELECT * FROM tasks WHERE id_tasklist = $idTask");
        return $tasks;        
    }
    public static function getTask($idTask)
    {
        $task =DB::select("SELECT * FROM tasks WHERE id_task = $idTask");
        return $task[0];
    }
    //INSERT
    public static function addTask($title, $description, $datetime_from, $datetime_to, $id_tasklist)
    {
           
        $inserted = DB::insert(
            "INSERT INTO tasks 
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
                                         '$id_tasklist');"
        );
        
          return $inserted;
                
    }
    // TASKLISTMODEL

    //SELECT TASKLISTU PO ID
    public static function getTasksByTasklist($idTasklist)
    {
        $tasks =DB::select("SELECT * FROM tasks WHERE id_tasklist = $idTasklist");
        return $tasks;        
    }

    //SELECT
    public static function getTasklists()
    {
        $tasklists=DB::select("SELECT * FROM tasklists");
        return $tasklists;
    }
    public static function getTasklist($idTasklist)
    {
        $tasklist =DB::select("SELECT * FROM tasklists WHERE id_tasklist = $idTasklist");
        return $tasklist[0];
    }

    //INSERT
    public static function addTasklist($name, $description)
    {         
        $inserted = DB::insert(
            "INSERT INTO tasklists
                                    (name,
                                    description,
                                    created_at)
                                     VALUES(
                                         '$name',
                                         '$description',
                                         NOW());"
        );        
          return $inserted;      
    }
    public static function updateTask($idTask, $title, $description, $datetime_from, $datetime_to, $id_tasklist)
    {
        $inserted = DB::update(
            "UPDATE tasks SET
                            title = '$title' , 
                            description = '$description',
                            datetime_from = '$datetime_from',
                            datetime_to = '$datetime_to',
                            id_tasklist = '$id_tasklist'
            WHERE id_task = '$idTask';"               
        );
          return $inserted;
    }
}
?>
