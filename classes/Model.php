<?php //Načtení všech knihoven z adresáře VENDOR
    require_once "vendor/autoload.php";

    use Illuminate\Database\Capsule\Manager as DB;

    $db = new DB;
    $db->addConnection(
        [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'maturitni-prace',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci'
        ]
        );

    $db->setAsGlobal();
    $db->bootEloquent();
    //Hlavní model, ke kterému se pak pojí další ve složce ./classes
    class Model {
        public static function getAll(int $id_tasklist = 1) {
            if ($id_tasklist != 1) {
                $where = 'WHERE id_tasklist = ' . $id_tasklist;
            }
        }
    }
    