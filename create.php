<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$database = "php-crud";

$connection = new mysqli($serverName, $userName, $password, $database);

$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
}

do {

    if (empty($name) || empty($email) || empty($phone) || empty($address)) {
        $errorMessage = "All the fields are required!";
        break;
    }

    $sql = "INSERT INTO users (name, email, phone, address)" . "VALUES ('$name', '$email', '$phone', '$address')";
    $result = $connection->query($sql);

    if (!$result) {
        $errorMessage = "Invalid Query: " . $connection->error;
        break;
    }

    $name = "";
    $email = "";
    $phone = "";
    $address = "";

    $successMessage = "User added correctly!";

    header("location: /index.php");
    exit;

} while (false);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD | Abrorbekdev</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container my-5">
        <h2>New User</h2>

        <?php

        if (!empty($errorMessage)) {
            echo "
            
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                               <strong>$errorMessage</strong>
                               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>

            ";
        }

        ?>

        <form method="POST">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>

            <?php

            if (!empty($successMessage)) {
                echo "
                
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-3 d-grid'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                               <strong>$successMessage</strong>
                               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>

                ";
            }

            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/index.php">Cancel</a>
                </div>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>