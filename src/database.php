<?php

include 'db_connect.php'; // Include the database connection file

//trigger exception in a "try" block
try {
  $table_name = "USER_DETAILS";
  $create_table_query = "CREATE TABLE IF NOT EXISTS $table_name (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(256) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  if ($db_handle->query($create_table_query)) {

  } else {
  }

  $table_name_1 = "USER_LOCATION_DATA";
  $create_table_query_1 = "CREATE TABLE IF NOT EXISTS  $table_name_1 (
    L_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    locationname VARCHAR(100) NOT NULL,
    x VARCHAR(100) NOT NULL,
    y VARCHAR(100) NOT NULL,
    id INT(6) UNSIGNED,
    FOREIGN KEY (id) REFERENCES USER_DETAILS(id)
);

  )";

  if ($db_handle->query($create_table_query_1)) {

  } else {

  }
} 

//catch exception
catch (PDOException  $e) {
  echo 'Message: ' . $e->getMessage();
}

?>