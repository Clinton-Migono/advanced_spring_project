<?php
// Establish MySQL connection
$conn = mysqli_connect("localhost", "root", "", "job_search_db");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>