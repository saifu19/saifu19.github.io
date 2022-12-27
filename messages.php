<?php
    session_start();
    include("connection.php");
    require("vendor/autoload.php");
    use Respect\Validation\Validator as v;

    if(isset($_POST['req']) && $_POST['req'] == "payment") {
        // Get the form data
        $username = $mysqli->real_escape_string($_POST['username']);
        $country = $mysqli->real_escape_string($_POST['country']);
        $pMethod = $mysqli->real_escape_string($_POST['p-method']);

        // Insert the data into the table
        $sql = "INSERT INTO paymentmethod (username, country, method) VALUES ('$username', '$country', '$pMethod')";
        $mysqli->query($sql);

        echo("Message Sent");
    }
?>