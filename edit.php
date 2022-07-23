<?php

include_once "database.php";

$id = $_GET['id'];

if (isset($_POST["submit"])) {
    $qoutes = $_POST["qoute"];
    $author = $_POST["author"];

    function update_query()
    {

        global $conn, $qoutes, $author, $id;

        $results = mysqli_query($conn, "UPDATE `qoutes` SET `Qoutes`='$qoutes',`Author`='$author' WHERE `id` = '$id' ");
        
        return $results;
    }
    $results = update_query();

   

    if ($results) {
        header("location:index.php?msg= Update Successfully");
    } else {
        echo "not works".mysqli_error($conn);
    }
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
                    <a href="delete.php?id=<?= $id ?>" id="delete"> Delete </a>
                </div>
            </div>
            <div class="add-form">
                <?php
                $get_id_query = mysqli_query($conn, "SELECT * FROM `qoutes` WHERE id = $id");

                while ($row = mysqli_fetch_array($get_id_query)) {
                ?>
                    <form method="post">

                        <div class="inputs">
                            <p>Qoute</p>
                            <!-- <input type="text" name="qoute" placeholder="Be the Best version of yourself"> -->
                            <textarea name="qoute">
                                <?= $row['Qoutes']; ?>
                        </textarea>
                        </div>
                        <div class="inputs">
                            <p>Author </p>
                            <input type="text" name="author" value="<?= $row['Author']; ?>"">
                        </div>
                        <div class=" btn">
                            <button type="submit" name="submit">Submit</button>
                            <a href="index.php" id="close">Close</a>
                        </div>


                    </form>
                <?php
                }

                ?>
            </div>
        </section>
    </div>

</body>

</html>