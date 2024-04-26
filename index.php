<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="submit.php" method="post">
        <h2>Enter Your Information</h2>
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" cols="50" required></textarea>
        
        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>
        
        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="single">Single</option>
            <option value="married">Married</option>
            <option value="divorced">Divorced</option>
        </select>
        <input type="submit" value="Submit">
    </form>
    <div class="container">
        <h2 style="text-align: center;">Submitted Data</h2>
        <?php
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);

        if (result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<div class='data'>";
                echo "<label>Fullname:</label>" . $row[Fullname] . "<br>";
                echo "<label>Email:</label>" . $row[Email] . "<br>";
                echo "<label>Address:</label>" . $row[Address] . "<br>";
                echo "<label>Gender:</label>" . $row[Gender] . "<br>";
                echo "<label>Status:</label>" . $row[Status] . "<br>";
                echo "</div>";
            }
        }else{
            echo "0 results";
        
        } 
        $conn->close();
        ?>
    <div>
</body>
</html>
