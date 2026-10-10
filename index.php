<?php
include "dbcon.php";
$query = mysqli_query($conn, "SELECT * FROM users");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Pure PHP MySQL</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>User Management System</h1>

    <div class="container mt-6">
        <div class="row">
            <div class="col-md-4 bg-light border">
                <form method="POST">
                    <h3>Add New User</h3>
                    <label for="name">Full Name</label>
                    <br>
                    <input type="text" name="name" placeholder="Enter Full Name" >
                    <br>
                    <label for="email">Email Address</label>
                    <br>
                    <input type="email" name="email" placeholder="Enter Email Address">
                    <button type="submit" class="btn btn-primary" name="add">Submit</button>
                </form>
            </div>

            <?php

                include "dbcon.php";

                if(isset($_POST['add'])){
                    $name = $_POST['name'];
                    $email = $_POST['email'];

                    mysqli_query($conn, "INSERT INTO users (name, email)
                                        VALUES ('$name', '$email')");
                }
            ?>

            <div class="col-md-6 bg-light border">
                <h3>Registered Users</h3>
                <table class="table table-bordered table-sm">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    $no = 1;
                    while($user = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['created_at'] ?></td>
                            <td>
                                <a class="btn btn-success btn-sm" href="edit.php?id=<?= $user['id'] ?>">Edit</a>
                                <a class="btn btn-danger btn-sm" href="action.php?id=<?= $user['id'] ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>
    
    
</body>
</html>


