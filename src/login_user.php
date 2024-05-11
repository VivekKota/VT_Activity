<?php
include 'db_connect.php'; // Include the database connection file
$table = 'USER_DETAILS';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM $table WHERE username='$username'";
    $stmt = $db_handle->prepare($sql);
    try {
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            if (password_verify($password, $row['password'])) {
                // Start the session
                session_start();

                // Set session variables
                $_SESSION["favcolor"] = $row['id'];
                header('Location: index.php');
            } else {
                echo 'password wrong';
            }
        }
        header('Location: index.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>