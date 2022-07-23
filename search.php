<?php
include_once "database.php";
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
            </div>
        </section>

        <?php
        if (isset($_POST["submit-search"])) {
            $input = $_POST["search-input"];
            // query search
            if($input != ""){
                $search_query = "SELECT * FROM `qoutes` WHERE Author LIKE '{$input}%' ";
                $result = mysqli_query($conn, $search_query);
    
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="card text-center mt-5">
                            <div class="card-header">
                                Search Results
                            </div>
                            <div class="card-body p-5">
                                <h5 class="card-title">" <?= $row['Qoutes'] ?> "</h5>
                                <p class="card-text"> - <?= $row['Author'] ?></p>
                            </div>
                            <div class="card-footer text-muted">
                                <a href="index.php" class="btn btn-primary"> Search Again</a>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="container">
                        <h6 class='text-danger mt-3'>Author Does Not Exist In Database</h6>
                        <a href="index.php" class="btn btn-primary"> Search Again</a>
                    </div>
    
                <?php
                }
            }else{
                header("location:index.php");
            }
        }


        ?>

    </div>

    <script type="text/javascript">

    </script>


</body>

</html>