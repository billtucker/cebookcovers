<?php
/**
 * Created by IntelliJ IDEA.
 * User: billt
 * Date: 10/23/2017
 * Time: 9:54 AM
 */

include_once ($_SERVER["DOCUMENT_ROOT"] ."/cebookcovers/config.php");


function getConnection(){
    $host="localhost";
    $port=3306;
    $socket="";
    $user="root";
    $password="password";
    $dbname="playdb";

    $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
    or die ('Could not connect to the database server' . mysqli_connect_error());

    return $con;
}

function runQuery($sql, $conn){
    $result = $conn->query($sql);

    if($result->num_rows > 0){

        return $result;
    }else{
        echo "No results found fix the error";
        exit(0);
    }
}


function closeConn($conn){
    global $log;

    $log->debug("Closing MySql connection");
    $conn->close();
}