<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">TechDiscuss</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                          </a>
                          <ul class="dropdown-menu">

                              <?php
                              include "_dbconnect.php";
                              $sqlCategories = "SELECT * FROM `categories`";
                              $result = mysqli_query($conn, $sqlCategories);

                              while ($row = mysqli_fetch_assoc($result)) {
                                  $categoryName = $row["category_name"];
                                  $categoryId = $row["category_id"];
                                  echo '<li><a class="dropdown-item" href="threads.php?catId=' .
                                      $categoryId .
                                      '">' .
                                      $categoryName .
                                      "</a></li>";
                              }
                              ?>
                          </ul>
                        </li>

            </ul>

            <?php
            session_start();

            if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
                $username = explode("@", $_SESSION["userEmail"]);

                echo '<form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                         <button class="btn btn-outline-success" type="submit">Search</button>
                         </form>

                         <div class="mx-3"> ' .
                    $username[0] .
                    ' <a href="partials/_handleLogout.php">(Log Out)</a> </div>';
            }

            if ($_SESSION["loggedIn"] != true) {
                echo '<div class="mx-2">
                <a type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal">Log
                    in</a>
                 </div>
                  <div class="ml-2">
                <a type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#signupModal">Sign
                    Up</a>
                 </div>';
            }
            ?>




        </div>

    </div>

</nav>

<?php
include "_handleSignup.php";
include "_signupmodal.php";
include "_loginmodal.php";

session_start();

// error_reporting(E_ALL);
// ini_set("display_errors", 1);


?>
