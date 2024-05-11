<?php
include 'db_connect.php'; // Include the database connection file
$table = 'USER_DETAILS';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $sql = "SELECT * FROM $table WHERE username='$username'";
    $stmt = $db_handle->prepare($sql);
    try {
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch();
    if (!$row) {
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO $table (username, password, reg_date) VALUES ('$username', '$hash', current_timestamp())";
            $stmt = $db_handle->prepare($sql);
            try {
                $stmt->execute();
                header('Location: index.php');
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            $showError = "Passwords do not match";
        }
    } else {
        echo "Username not available";
    }
}
?>