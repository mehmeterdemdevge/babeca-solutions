<!DOCTYPE html>
<html>
<head>
    <title>Check User Data</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <h2>Check User Data</h2>
    <form action="check_data.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Check Data">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $found = false;

        $file = fopen('users.txt', 'r');
        while (($line = fgets($file)) !== false) {
            list($stored_email, $stored_password) = explode(',', trim($line));
            if ($email === $stored_email && $password === $stored_password) {
                $found = true;
                break;
            }
        }
        fclose($file);

        if ($found) {
            echo "Data is correct. Welcome back, $email.";
        } else {
            echo "Incorrect data. Please check your email and password.";
        }
    }
    ?>
</body>
</html>
