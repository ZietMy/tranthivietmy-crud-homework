<?php
    require_once("database/database.php");
    db();
    $id=$_GET['id'];
    deleteStudent($id);
    header('Location: index.php');
?>