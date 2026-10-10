<?php
include "dbcon.php";
if(isset($_POST['edit'])){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    mysqli_query($conn, "UPDATE users 
                         SET name = '$name', 
                         email = '$email'
                         WHERE id = $id
                ");
}