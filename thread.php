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
            include 'partials/_header.php'; 
            include 'partials/_dbconnect.php'; 

            //displays thread title and description
            $id = $_GET['threadId'];
            $sql = "SELECT * FROM `threads` WHERE `thread_id` = $id";
            $result = mysqli_query($conn, $sql);
            
            while ($row = mysqli_fetch_assoc($result)) {
                
                echo '
                <div class="container mt-5" >
                <h2>'.$row['thread_title'].'</h2>
                <p>'.$row['thread_description'].'</p>
                </div>
                ';
        } 

        ?>

        <?php 
                $method = $_SERVER['REQUEST_METHOD'];
                if ($method == 'POST') {
                    //insert comment into comments table table
                    $comment = $_POST['comment'];
    
                    $sql = "INSERT INTO `comments` (`comment_text`, `thread_id`, `user_id`, `comment_date`) VALUES ('$comment', '$id', '0', current_timestamp());";
                    $result = mysqli_query($conn, $sql);
                
                }
                ?>

        <div class="container mt-5">
            <div style="display:flex; flex-direction:row; justify-content:space-between; height:35px;">
                <h3>Discussion</h3>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-success ms-2" data-bs-toggle="modal"
                    data-bs-target="#addComment">
                    Add to Discussion
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="addComment" tabindex="-1" aria-labelledby="addComment" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addCommentLabel">Add Comment</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="/forum/partials/_handleSignup" method="POST">
                                <div class="mb-3">
                                    <div class="form-floating">
                                        <div class="mb-3">
                                            <label for="comment" class="form-label">Add your bit.</label>
                                            <textarea type="text" class="form-control" name="comment" id="comment"
                                                rows="5"></textarea>
                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Add Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container mt-3">

            <?php 
            // displays comments in threads page.
            $sql = "SELECT * FROM `comments` WHERE `thread_id` = $id";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                
                echo '
                <div class="container mt-3" style="background: #f2f2f2; border-radius:10px; padding: 15px;" >
                <p style="font-size:18px">'.$row['comment_text'].'</p>
                <p class="form-text">'.$row['comment_date'].'</p>
                </div>
                '; }
                
                ?>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <?php include 'partials/_footer.php'?>
</body>

</html>