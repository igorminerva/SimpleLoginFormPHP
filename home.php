<?php
    include("database.php");
    session_start();
    $username = $_SESSION["username"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1><?php echo "Hello {$username}!"?></h1><br>
        <div class="gif-container">
            <div class="tenor-gif-embed" data-postid="19354605" data-share-method="host" data-aspect-ratio="0.5625" data-width="40%">
            <a href="https://tenor.com/view/cat-cat-jumping-cat-excited-excited-dance-gif-19354605"></a></div> 
            <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
        </div>
        
    </div>
    
</body>
</html>

