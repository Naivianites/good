<?php

if(isset($_GET["id"])){
    echo "AWdawdaw";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/add.css">
    <title>Edit Qoutes</title>
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="banner">
                <h1 class="title">The Good Qoutes</h1>
                <a href="index.php">Home</a>
            </div>
        </header>
        
        <!-- add qoutes sections -->
        <section class="add-container">
            <div class="add-container-top">
                <div class="add">
                    <h2>Edit Qoutes</h2>
                    <a href="#" id="delete"> Delete </a>
                </div>
            </div>
           <div class="add-form">
                <form action="#" method="post">
                    <div class="inputs">
                        <p>Qoute</p>
                        <!-- <input type="text" name="qoute" placeholder="Be the Best version of yourself"> -->
                        <textarea name="qoute">

                        </textarea>
                    </div>
                    <div class="inputs">
                        <p>Author </p>
                        <input type="text" name="qoute" placeholder="(If you want your name to be anonymous its completely OPTIONAL)">
                    </div>
                    <div class="btn">
                        <a href="#" id="submit">Submit</a>
                        <a href="index.php" id="close">Close</a>
                    </div>
                </form>
           </div>
        </section>
    </div>

</body>
</html>