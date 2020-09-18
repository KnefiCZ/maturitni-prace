<?php 

use Illuminate\Database\Capsule\Manager as DB;
    class TaskModel extends Model {
        public static function getTasks() {
            $tasks=DB::select("SELECT * FROM tasks");
            return $tasks;
        }
    }