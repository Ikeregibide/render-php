<?php 
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

function connect(){
    try {
        $host = "dpg-cevuvmg2i3mmhmd9c1eg-a";
        $dbname = "laraveldb_eh8k";
        $user = "laraveldb_eh8k_user";  
        $pass = "6O52moASVONqhvdyvekGmsD4trvzRjIz";
        $dbh = pg_connect("host=$host dbname=$dbname user=$user password=$pass");
        return $dbh;
    }
    catch(PDOException $e) {
    echo $e->getMessage();
    }
}

    if(isset($_GET["producto"])){
        $dbh = connect();
        $data = array("nombre" => $_GET["producto"]);
        $stmt = pg_query($dbh,"INSERT INTO lista (nombre) VALUES (:nombre)");
        $stmt->execute($data);
    }

    if(isset($_GET["accion"])){
        switch ($_GET["accion"]) {
            case 'borrar':
                borrar();
                break;
            
            case 'borrarTodo':
                borrarTodo();
                break;
        }
    }

function borrar(){
        $dbh = connect();
        $data = array("nombre" => $_GET['nombre']);
        $stmt = pg_query($dbh,"DELETE FROM lista WHERE nombre = :nombre");
        $stmt->execute($data);

}

function borrarTodo(){
        $dbh = connect();
        $stmt = pg_query($dbh,"DELETE FROM lista");
        $stmt->execute();
}

function select(){
    $dbh = connect();
    $sth = pg_query($dbh, "SELECT * FROM lista");
    $val = pg_fetch_result($sth, 1, 0);
    echo "Primer valor: ", $val, "\n";
    $val = pg_fetch_result($sth, 2, 0);
    echo "Segundo valor: ", $val, "\n";
    $val = pg_fetch_result($sth, 3, 0);
    echo "Tercer valor ", $val, "\n";
    
}

    require 'ejer1.view.php';

?>
