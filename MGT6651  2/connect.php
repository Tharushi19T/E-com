<?php
    $userName = $_POST['userName' ];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Database connection

    $conn = new mysqli('localhost','','','login');
    if($conn->connect_error){
        die("Connection Failed: ".$conn->connect_error);
    }else{
        $stmt = $conn->prepare("Insert into registration(userName,email,password)
        values(?,?,?)");
    }

    $stmt->bind_param("sss", $userName, $email, $password);
    $stmt->execute();

    echo "Registration successful";

    $stmt->Close();
    $conn->Close();
?>