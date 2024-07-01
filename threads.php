<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum - Threads</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php 
    include 'partials/_header.php'; 
    include 'partials/_dbconnect.php';  
    
    $id = $_GET['catId'];
    $sql = "SELECT * FROM `categories` WHERE `category_id` = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    echo '<div class="container mt-5 forum-cover">
        <h1>'.$row['category_name'].'</h1>
        <h3>'.$row['category_description'].'</h3>
    </div>';
    
    ?>



    <div class="container mt-5">
        <h2>Browse Questions</h2>



        <?php
        
        $id = $_GET['catId'];
        $sql = "SELECT * FROM `threads` WHERE `thread_cat_id` = $id";
        
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="my-3 d-flex">
            <div class="flex-shrink-2">
                <img src="images/person-circle.svg" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
                <h4><a href="thread.php">'.$row['thread_title'].'</a></h4>
                <p>'.$row['thread_description'].'</p>
            </div>
        </div>';
        }
    
        
        ?>


    </div>

    <?php include 'partials/_footer.php'?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


</body>

</html>