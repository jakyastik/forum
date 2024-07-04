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
    include "partials/_handleSignup.php";

    $signupsuccess = $_GET["signupsuccess"];
    $emailexists = $_GET["emailexists"];
    $passwordmismatch = $_GET["passwordmismatch"];

    if ($signupsuccess == true) {
        echo "Signup successful";
    }

    if ($emailexists == true) {
        echo "Email Exists";
    }

    if ($passwordmismatch == true) {
        echo "password mismatch";
    }
    ?>

    <!-- categories container starts here -->
    <div class="container">
        <h3 class="mt-5">Categories</h3>
        <div class="row">

            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row["category_name"];

                echo '<div class="col align-items-start">
                <div class="card my-4">
                    <div class="card-body">
                        <h4 class=" card-title"><a href="threads.php?catId=' .
                    $row["category_id"] .
                    '">' .
                    $row["category_name"] .
                    '</a></h4>
                        <p class="card-text">' .
                    substr($row["category_description"], 0, 120) .
                    ' ...</p>
                        <a href="threads.php?catId=' .
                    $row["category_id"] .
                    '" class="btn btn-success">View Threads</a>
                    </div>
                </div>
            </div>';
            }
            ?>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <?php include "partials/_footer.php"; ?>

</body>

</html>
