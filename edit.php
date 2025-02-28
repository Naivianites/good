<?php



if (isset($_POST["submit"])) {
 

    if ($qoutes === "" || $author === "") {
        header("location:index.php");
    } else {
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
            echo "not works" . mysqli_error($conn);
        }
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
    <link rel="stylesheet" href="./css/style.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="./css/add.css?v=<?= time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Quotes</title>
</head>

<body>
    <div class="wrapper">

        <header>
            <div class="banner">
                <h1 class="title">The Good Quotes</h1>
                <a href="index.php">Home</a>
            </div>
        </header>

        <!-- descriptions -->
        <section class="description">
            <div class="des-container">
                <h2>Share Your Motivational and Inspirational Quotes</h2>
            </div>
        </section>
        <!-- add qoutes sections -->
        <section class="add-container">
            <div class="add-container-top">
                <div class="add mt-4 mb-4">
                    <h2>Edit Quotes</h2>
                    <a href="delete.php?id=<?= $id ?>" class="btn btn-danger "> Delete </a>
                </div>
            </div>
            <div class="add-form">
                <?php
                $get_id_query = mysqli_query($conn, "SELECT * FROM `qoutes` WHERE id = $id");

                while ($row = mysqli_fetch_array($get_id_query)) {
                ?>
                    <form method="post">

                        <div class="inputs">
                            <p class="mt-1">Quotes</p>
                            <!-- <input type="text" name="qoute" placeholder="Be the Best version of yourself"> -->
                            <input name="qoute" value="<?= $row['Qoutes']; ?>">

                            </input>
                        </div>
                        <div class="inputs">
                            <p class="mt-2">Author </p>
                            <input type="text" name="author" value="<?= $row['Author']; ?>"">
                        </div>
                        <div class=" mt-4">
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            <a href="index.php" class="btn btn-secondary">Close</a>
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