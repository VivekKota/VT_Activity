<?php
include 'db_connect.php';
$table = 'USER_LOCATION_DATA';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $location = $_POST["location"];
    $xAxis = $_POST["xAxis"];
    $yAxis = $_POST["yAxis"];
    $user_pk = $_SESSION['favcolor'];
    $sql = "INSERT INTO $table (locationname, x, y, id) VALUES ('$location', '$xAxis', '$yAxis',$user_pk)";
    $stmt = $db_handle->prepare($sql);
    try {
        $stmt->execute();
        header('Location: index.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>