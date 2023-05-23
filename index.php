<?php
    include("database.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($username)||empty($password)){
            echo "Please fullfill the registretion page";
        }else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
        }

        $sql = "SELECT * FROM users WHERE username = '$username'";
  
        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if a matching record was found
        if (mysqli_num_rows($result) == 1) {
            // Fetch the user's data
            $row = mysqli_fetch_assoc($result);
    
            // Verify the password
            if (password_verify($password, $row['password'])) {
                // Password is correct, redirect to the homepage
                session_start();
                $_SESSION["username"] = $username;
                header("Location: home.php");
                exit;
                }   
            }
        
    }


    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How to learn php</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <label>Username:</label><br>
        <input type="text" name="username"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br>
        <input type="submit" name="Log in" value="Log in">
        <p>Don't have an account? <a href="register.php">Sign up</a></p>
    </form>
    
</body>
</html>

<?php
    
?>
