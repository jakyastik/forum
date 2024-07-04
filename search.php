<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php
    include "partials/_header.php";
    include "partials/_dbconnect.php";
    ?>

    <div class="container mt-5">
        <div style="display:flex; flex-direction:column; justify-content:start; height:35px;">
            <h4>Search results for "<?php echo $_GET['search_query']; ?>"</h4>
        </div>

        <div class="mt-3">
            <h3><a class="text-dark" href="#">This is an example thread title.</a></h3>
            <p>This is an example description</p>
        </div>
    </div>



    <?php include "partials/_footer.php"; ?>
</body>

</html>