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

</head>

<body class="bg-light">

    <div class="wrapper">
        <?php include "navbar.php" ?>
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



