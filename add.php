<?php
include_once "database.php";

if(isset($_POST["submit"])){
    $qoutes = $_POST["qoute"];
    $author = $_POST["author"];

    function insert_query(){
        global $conn, $qoutes, $author;

        $results = mysqli_query($conn, "INSERT INTO `qoutes`(`Qoutes`, `Author`) VALUES ('$qoutes' , '$author')");
        return $results;
    }
    $results = insert_query();

    if($results){
        header("location:index.php?msg=Successfully Added");
    }else{
        echo "not works";
        echo $qoutes;
        echo $author;
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
    <title>Add Qoutes</title>
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
                    <h2>Add Qoutes</h2>
                </div>
            </div>
           <div class="add-form">
                <form method="post">
                    <div class="inputs">
                        <p>Qoute</p>
                        <!-- <input type="text" name="qoute" placeholder="Be the Best version of yourself"> -->
                        <textarea name="qoute" placeholder="The days the breaks you, are the days that will make you.">
                        </textarea>
                    </div>
                    <div class="inputs">
                        <p>Author </p>
                        <input type="text" name="author" placeholder="Steve Jobs">
                    </div>
                    
                    <div class="btn">
                        <button type="submit" name="submit">Submit</button>
                        <a href="index.php" id="close">Close</a>
                    </div>
                </form>
           </div>
        </section>
    </div>

</body>
</html>