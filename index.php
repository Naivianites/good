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
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>The Good Quotes</title>

    <style>
        .search-con form{
            display: flex;
            align-items: center;
            justify-content: flex-start;

        }
        .search-con form input{
           width: 300px;
        }
        .search-con form input, .search-con form button{
            border-radius: 0;
        }
    </style>
</head>

<body class="bg-light">
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
                <h2>Share Your Motivational and <br> Inspirational Quotes</h2>
                <a href="add.php">Add Quotes</a>
            </div>
        </section>
        <div class="search-con mt-5 mb-3">
            <form action="search.php" method="post">
                <input type="text" placeholder="Search by Author name" class="form-control" name="search-input" autocomplete="off">
                <button type="submit" class="btn btn-outline-dark" name="submit-search">search</button>
            </form>
        </div>
        <section class="quote-container mt-5">

            <!-- display data from database -->
            <?php

            while ($row = mysqli_fetch_array($results)) {

            ?>
                <a href="edit.php?id=<?= $row["id"]; ?>" class="quotes">
                    <div class="quote">
                        <h3>"<?= $row["Qoutes"]; ?> "</h3>
                    </div>
                    <div class="publisher">
                        <p class="text-secondary"><?= $row["Author"]; ?></p>
                    </div>
                </a>
            <?php
            }

            ?>

        </section>
    </div>


    <script type="text/javascript">

    </script>


</body>

</html>