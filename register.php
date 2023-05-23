<?php
    include("database.php");


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($username)||empty($password)||empty($email)){
            echo "Please fullfill the registretion page";
        }else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(username, password, email) values ('$username','$hash','$email');"
        }

        
        mysqli_query($conn,$sql);

        session_start();
        $_SESSION["username"] = $username;
        header("Location: home.php");
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
        <label>Email:</label><br>
        <input type="email" name="email"><br>
        <input type="submit" name="Register" value="Register">
    </form>
    
</body>
</html>


