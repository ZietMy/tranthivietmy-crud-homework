<?php
require_once("database/database.php");
db();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name']) && !empty($_POST['age'])&& !empty($_POST['email'])&& !empty($_POST['image_url'])) :
    $value = [
        "name" => $_POST["name"],
        "age" => $_POST["age"],
        "email" => $_POST["email"],
        "profile" => $_POST["image_url"],
      ];
    // createStudent($_POST["name"],$_POST["age"],$_POST["email"],$_POST["image_url"]);
    createStudent($value);
    header('Location: index.php');
    endif;
?>