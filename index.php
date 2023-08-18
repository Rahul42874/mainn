<?php
$insert = false;
if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "trip";

    $con = mysqli_connect($server, $username, $password, $database);
    if (!$con) {
        die("Connection to this DataBase Failed Due To" . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];
    $sql = "INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
    // echo $sql;

    if ($con->query($sql) == true) {
        // echo "Successfully Inserted";
        $insert = true;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
    $con->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caprasimo&family=Oswald:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <img class="bg" src="iitbombay.jpg" alt="IIT BOMBAY">
    <div class="container">
        <h1>welcome to iit bombbay UK Trip form</h1>
        <p>Enter Your details And submit this form to confirm your participation in the trip</p>
        <?php
        if ($insert == true) {
            echo "Form Is Sumbmited. Thank You So Much";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="email" name="email" id="email" placeholder="entr your email">
            <input type="phone" name="phone" id="phone" placeholder="entr your number">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="other info"></textarea>
            <button class="btn">submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>
</body>

</html>
