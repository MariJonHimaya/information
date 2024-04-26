<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "user"; 
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $status = $conn->real_escape_string($_POST['status']);

    // Insert data into database
    $sql = "INSERT INTO users (fullname, email, address, gender, status)
            VALUES ('$fullname', '$email', '$address', '$gender', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        // Redirect to a success page or back to the form
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
