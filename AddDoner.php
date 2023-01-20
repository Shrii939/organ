<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "organn";
$link = mysqli_connect($servername, $username, $password, $dbname);
$con = mysqli_select_db($link, $dbname);
if ($con) {
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
    <title>Add-Donor</title>
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
                            <a class="nav-link  " aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="AddDoner.php">Add donor</a>
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
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <form  id="form" action="" method="post">
        <div class="container mt-5 border p-5">
            <div class="text-center m-4 text-dark">
                <h1>Donor organ details </h1>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" required name="Did" placeholder="product name" />
                <label for="floatingInput">Donor id</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="cost" name="dname" />
                <label for="floatingInput">Donor name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="stock" name="daddr" />
                <label for="floatingInput">Donor address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="stock" name="dcont" />
                <label for="floatingInput">Donor contact </label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="stock" name="ddtls" />
                <label for="floatingInput">Donor Details</label>
            </div>

        </div>
        <div class="text-center mt-5">
            <button onclick="" name="submit">
                submit
            </button>

            <button name="Delete">
                Delete
            </button>
            <button name="Available">
                Available
            </button>
    </form>
    </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>

<?php
if (isset($_POST["submit"])) {
    $message = 'Donor added';
    $sql0 = "INSERT INTO donor VALUES('$_POST[Did]','$_POST[dname]','$_POST[daddr]','$_POST[dcont]','$_POST[ddtls]')";
    echo "$sql0";
    mysqli_query($link, $sql0);
    echo "<script type='text/javascript'>alert('$message')</script>";
    header("Location: 'AddDoner.php'");
    echo "<script>document.getElementById('form').reset();</script>";

}


if (isset($_POST["Available"])) {
    echo "<div class='container table table-bordered table-responsive-sm '>";
    echo " <table class='table'>";
    echo "<thead>";
    echo "  <tr>";
    echo "    <th>Donor ID</th>";
    echo "    <th>Donor name</th>";
    echo "    <th>Contact</th>";
    echo "    <th>Address</th>";
    echo "    <th>Details</th>";
    echo "  </tr>";
    echo " </thead>";
    echo "<tbody>";
    // Fetch data from the database
    $sql1 = "SELECT * FROM donor";
    echo "$sql1";
    $result = $link->query($sql1);
    // Loop through each row of data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Did"] . "</td>";
        echo "<td>" . $row["DName"] . "</td>";
        echo "<td>" . $row["dCont"] . "</td>";
        echo "<td>" . $row["dAddr"] . "</td>";
        echo "<td>" . $row["dDetls"] . "</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
    echo "<script>document.getElementById('form').reset();</script>";

}

if (isset($_POST["Delete"])) {
    $sql = "DELETE FROM donor WHERE dName='$_POST[dname]' AND Did='$_POST[Did]'";
    echo "$sql";
    mysqli_query($link, $sql);
    $msg = "Deleted item";
    echo "<script type='text/javascript'>alert('$msg')</script>";
    echo "<script>document.getElementById('form').reset();</script>";

}


?>