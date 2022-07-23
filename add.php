<?php
include_once "database.php";

if (isset($_POST["submit"])) {
    $qoutes = $_POST["qoute"];
    $author = $_POST["author"];

    if ($qoutes == "" || $author == "") {
        header("location:add.php?msg=Fields Should not be Empty.");
    } else {
        function insert_query()
        {
            global $conn, $qoutes, $author;

            $results = mysqli_query($conn, "INSERT INTO `qoutes`(`Qoutes`, `Author`) VALUES ('$qoutes' , '$author')");
            return $results;
        }
        $results = insert_query();

        if ($results) {
            header("location:index.php?msg=Successfully Added");
        } else {
            echo "not works";
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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/add.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add Qoutes</title>
</head>

<body class="bg-light">
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
                    <h2>Add Qoutes</h2>
                </div>
            </div>

            <!-- it will appear if the submit is set and has empty fields -->
            <?php
                if (isset($_GET["msg"])) { 
                    $msg = $_GET["msg"];
                    ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> <?= $msg;?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    
                }
                ?>
            <div class="add-form">
                <form method="post">
                    <div class="inputs">
                        <p class="mt-2">Qoute</p>
                        <input type="text" name="qoute" placeholder="The days the breaks you, are the days that will make you." class="inputs">
                        </input>
                    </div>
                    <div class="inputs">
                        <p class="mt-2">Author </p>
                        <input type="text" name="author" placeholder="Steve Jobs" class="inputs">
                    </div>

                    <div class="mt-2">
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        <a href="index.php" class="btn btn-secondary">Close</a>
                    </div>
                </form>
            </div>
        </section>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>