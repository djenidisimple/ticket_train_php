<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrainSun</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php
        if(isset($role) && $role == "customer")
        {
            include_once '../app/Views/includes/navbar.php';
        } else if(isset($role) && $role == "admin") {
            include_once '../app/Views/includes/navbarAdmin.php';
        }
    ?>