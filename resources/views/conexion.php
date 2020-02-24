<?php
    $mysqli=new mysqli("localhost", "root", "password", "horarios");

    if(mysqli_connect_errno())
    {
        echo 'conexion Fallida : ', mysqli_connect_error();
        exit();
    }

?>