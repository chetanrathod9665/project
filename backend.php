<?php

// Connect to MySQL database
$servername = "localhost";
$username = "username"; // Your MySQL username
$password = "password"; // Your MySQL password
$database = "scholarship_management"; // Your database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to add a new scholarship
function addScholarship($name, $criteria) {
    global $conn;
    
    $sql = "INSERT INTO scholarships (name, criteria) VALUES ('$name', '$criteria')";
    
    if ($conn->query($sql) === TRUE) {
        return "New scholarship added successfully";
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to update an existing scholarship
function updateScholarship($id, $name, $criteria) {
    global $conn;
    
    $sql = "UPDATE scholarships SET name='$name', criteria='$criteria' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        return "Scholarship updated successfully";
    } else {
        return "Error updating scholarship: " . $conn->error;
    }
}

// Function to delete a scholarship
function deleteScholarship($id) {
    global $conn;
    
    $sql = "DELETE FROM scholarships WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        return "Scholarship deleted successfully";
    } else {
        return "Error deleting scholarship: " . $conn->error;
    }
}

// Close MySQL connection
$conn->close();

?>
