<?php

require "../config/config.php";

function dbConnection() {
    $drive = DB_DRIVE;
    $host = DB_HOST;
    $dbname = DB_DATABASE_NAME;
    $user = DB_USER;
    $password = DB_PASSWORD;
    $connection = null;

    try {
        $connection = new PDO($drive.":host=".$host.";dbname=".$dbname, $user, $password);
        return $connection;
    }
    catch(Exception $error) {
            die( $error->getMessage());
        }
}



?>
