<?php
include "dbcon.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM users WHERE id=$id");
}