<?php
    include('../../inc/fonctions/include.php');
    $email = $_POST['email'];
    $password = $_POST['password'];
    $isAdmin = $_POST['admin-user'];
    // echo $isAdmin;
    $reponse = login($email,$password,$isAdmin);
    echo json_encode($reponse);
?>