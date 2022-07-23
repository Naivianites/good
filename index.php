<?php
include_once "database.php";

function display_data()
{
    global $conn;
    $display_query = "SELECT * FROM qoutes";
    $results = mysqli_query($conn, $display_query);

    return $results;
}

$results = display_data();

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
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time();?>">
    <title>The Good Qoutes</title>

</head>

<body>
    <div class="wrapper">
        <!-- <div class="msg" id="msgContainer">
            <p id="message">awdawdaw</p>
            <span id="close"> &times; </span>
        </div> -->
       
        <header>
            <div class="banner">
                <h1 class="title">The Good Quotes</h1>
                <a href="index.php">Home</a>
            </div>
        </header>

        <!-- descriptions -->
        <section class="description">
            <div class="des-container">
                <h2>Share Your Motivational and <br> Inspirational Qoutes</h2>
                <a href="add.php">Add Qoutes</a>
            </div>
        </section>
        <div class="search">
            <input type="text" name="seach" placeholder="Search By Author name">
        </div>
        <!-- display qoutes -->
        <section class="quote-container">

            <!-- display data from database -->
            <?php

            while ($row = mysqli_fetch_array($results)) {

            ?>
                <a href="edit.php?id=<?= $row["id"]; ?>" class="quotes">
                    <div class="quote">
                        <h2>"<?= $row["Qoutes"]; ?> "</h2>
                    </div>
                    <div class="publisher">
                        <p><?= $row["Author"]; ?></p>
                    </div>
                </a>
            <?php
            }

            ?>

        </section>
    </div>

    <script>
        let btnClose = document.getElementById("close");
        let msgContainer = document.getElementById("msg-container");

        btnClose.onclick = ()=> {
            msgContainer.style.display = "none";
        }

    </script>


</body>

</html>