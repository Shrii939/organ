<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "organn";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/product.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Organ-Donation</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active " aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="AddDoner.php">Add donor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Donate.php">Donate</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="organ_bank.php">Organ Bank</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Order.php">Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="History.php">History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="about-us">
        <div class="about-us-text">
            <h2>Organ Donation Managent</h2>
            <p>Organ donation is defined as giving an organ or part of an organ to be transplanted into another person. Organ transplantation is the only option to save lives in patients affected by terminal organ failures and improve their quality of life. However, there is a disparity exists between the supply and demand of donated organs, leads to a loss of many lives. The number of organ transplantation have gradually increased in the last two decades and provide excellent results in children and young adults, and are challenging by the growing proportion of elderly transplant patients with co morbidity.</p>
        </div>
        <img src="https://domf5oio6qrcr.cloudfront.net/medialibrary/10415/GettyImages-488624012.jpg" alt="me">
    </div>
    </main>
    <footer class="footer">
        <div class="aboutus">
            <h1> Save a life afterlife
                <br>
                Let your life go on in someone’s body
            </h1>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>
<?php

?>