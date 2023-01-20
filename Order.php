<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "organn";
$link = mysqli_connect($servername, $username, $password, $dbname);
$conn = mysqli_select_db($link, $dbname);
if ($conn) {
    echo (" ");
} else {
    die("connection failed" . mysqli_connect_error());
}
session_start();
if(!$_SESSION['organn']){
    header('Location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Orders</title>
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
                            <a class="nav-link" name="logout" href="logout.php">logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <form id="form"  action="" method="post">
        <div class="container mt-5 border p-5">
            <div class="text-center m-4 text-dark">
                <h1>Order form</h1>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="Hname" placeholder="product name" />
                <label for="floatingInput">Hospital Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="Haddr" placeholder="product name" />
                <label for="floatingInput">Address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="cont" placeholder="product name" />
                <label for="floatingInput">Contact</label>
            </div>
            <div class="form-floating mb-3 startDate">
                <input type="date" class="form-control" id="floatingInput" name="date" placeholder="product name" />
                <label for="floatingInput">Date</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="Oid" placeholder="product name" />
                <label for="floatingInput">Organ id</label>
            </div>
            <button class="m-3" name="submit">
                Submit
            </button>
        </div>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>
<?php
// delete from organs and insert into order table
if (isset($_POST["submit"])) {
    $sql1 = "INSERT INTO orders values('$_POST[Hname]', '$_POST[Haddr]', '$_POST[cont]', '$_POST[date]', '$_POST[Oid]')";
    echo "$sql1";
    mysqli_query($link, $sql1);
    echo "donr";
    $sql2 = "DELETE FROM organ WHERE Oid='$_POST[Oid]'";
    echo "$sql2";
    mysqli_query($link, $sql2);
    $msg = "Order placed successfully";
    echo "<script type='text/javascript'>alert('$msg')</script>";
    echo "<script>document.getElementById('form').reset();</script>";

}
?>