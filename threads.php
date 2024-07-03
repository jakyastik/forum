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
    <div>
        <?php
        include "partials/_header.php";
        include "partials/_dbconnect.php";

        //--------------------------------------------------------------------------------------------get category and description
        $id = $_GET["catId"];
        $sql = "SELECT * FROM `categories` WHERE `category_id` = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        echo '<div class="container mt-5" style="border-bottom:1px solid #ccc; padding:20px 0px; margin:20px auto; ">
                <h1>' .
            $row["category_name"] .
            '</h1>
                <h4 class="text-secondary">' .
            $row["category_description"] .
            '</h4>
            </div>';

        //---------------------------------------------------------------------------------------post a new thread to the database.

        $threadSuccess = false;

        $method = $_SERVER["REQUEST_METHOD"];
        if (isset($_POST["submit_thread"]) && $method == "POST") {
            $currentUserId = $_SESSION["userId"];
            //insert thread into DB
            $thread_title = addslashes($_POST["title"]);
            $thread_description = addslashes($_POST["description"]);

            $sql = "INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_user_id`, `thread_cat_id`) VALUES ('$thread_title', '$thread_description', '$currentUserId', '$id');";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // Change here: Added success message
                $threadSuccess = true;
            }
        }
        ?>

        <!-- Form to Add Questions -->
        <div class="container mt-5">

            <?php if ($threadSuccess) {
                echo '<div class="alert alert-success" role="alert">Yey. We\'ve added your thread to discussion. Awaiting replies. </div>';
            } ?>


            <div style="display:flex; flex-direction:row; justify-content:space-between; height:35px;">
                <h3>Discussion</h3>

                <?php if (isset($_SESSION["loggedIn"])) {
                    echo '<button type="button" class="btn btn-sm btn-success ms-2" data-bs-toggle="modal"
                    data-bs-target="#addThread">
                    + New Thread
                </button>';
                } else {
                    echo "Log in to create a thread.";
                } ?>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="addThread" tabindex="-1" aria-labelledby="addThread" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addCommentLabel">Create a Thread</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo $_SERVER[
                                "REQUEST_URI"
                            ]; ?>" method="post">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Start a Discussion</label>
                                    <input type="text" class="form-control" name="title" id="title">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Add your bit.</label>
                                    <textarea class="form-control" id="description" name="description"
                                        rows="3"></textarea>
                                </div>
                                <button type="submit" name="submit_thread" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $id = $_GET["catId"];
            //get threads data from threads table
            $sql0 = "SELECT * FROM `threads` WHERE `thread_cat_id` = $id ORDER BY `thread_id` DESC";
            $result = mysqli_query($conn, $sql0);

            if ($result == true) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $threadId = $row["thread_id"];
                    $threadTitle = $row["thread_title"];
                    $threadDescription = $row["thread_description"];
                    $threadTime = $row["timestamp"];
                    $threadUserId = $row["thread_user_id"];

                    $sql2 = "SELECT user_email FROM `users` where user_id = $threadUserId;";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $userEmail = $row2["user_email"];
                    $username = explode("@", $userEmail);

                    echo '<div class="my-3 d-flex" style="border-bottom:1px solid #ccc; padding:20px 0px;">
                <div class="flex-shrink-2">
                    <img src="images/person-circle.svg" alt="...">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h4><a href="thread.php?threadId=' .
                        $threadId .
                        '">' .
                        $threadTitle .
                        '</a></h4>
                    <p>' .
                        $threadDescription .
                        '</p>
                    <div class="form-text">' .
                        $username[0] .
                        '</div>
                </div>
                </div>';
                }
            }

            if ($result == false) {
                echo "No discussions yes. Start one. ";
            }
            ?>
        </div>
    </div>


    <?php include "partials/_footer.php"; ?>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


</body>

</html>
