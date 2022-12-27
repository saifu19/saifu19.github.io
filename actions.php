<?php
    session_start();
    include("connection.php");
    require("vendor/autoload.php");
    use Respect\Validation\Validator as v;

    // Login User
    if(isset($_POST['req']) && $_POST['req'] == "Login") {
        // Get the form data
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validate the form data
        $username_validator = v::stringType()->notEmpty();
        $password_validator = v::stringType()->notEmpty();

        // Check if any errors were found
        if (!$username_validator->validate($username) || !$password_validator->validate($password)) {
            // Form validation failed, show an error message
            echo 'One or more entered fields are incorrect';
        } else {
            // Escape the form data
            $username = $mysqli->real_escape_string($username);
            $password = $mysqli->real_escape_string($password);

            // Select the user from the database
            $query = "SELECT * FROM Users WHERE username = '$username'";
            $result = $mysqli->query($query);

            // Check if the user was found
            if ($result->num_rows == 0) {
                // User not found, show an error message
                echo 'Invalid username or password.';
            } else {
                // User found, verify the password
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    // Password is correct, log the user in
                    $_SESSION['logged_in'] = true;
                    $_SESSION['username'] = $username;
                    // header('Location: index.php');
                    echo("Logged in");
                } else {
                    // Password is incorrect, show an error message
                    echo 'Invalid username or password.';
                }
            }
        }
    }
    if(isset($_POST['changePw'])) {
        // $validation = $validator->validate($_POST, [
        //     'password' => 'required',
        //     'confirmPassword' => 'required|same:password'
        // ]);
        // $validation->validate();
        // if($validation->fails()) {
        //     $errors = $validation->errors();
        //     print_r($errors->firstOfAll());
        // } else {
            $email = $_SESSION['email'];
            $password = $_POST['password'];
            $password = md5($email.$password);
            $query = "UPDATE `admin` SET `password`='".mysqli_escape_string($mysqli, $password)."'";
            mysqli_query($mysqli, $query);
            echo "Success!";
        // }
    }
    
    // Register new user
    if(isset($_POST["req"]) && $_POST['req'] == "Reg") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $name_validator = v::stringType()->notEmpty();
        $email_validator = v::email();
        $number_validator = v::phone()->notEmpty();
        $username_validator = v::stringType()->notEmpty();
        $password_validator = v::stringType()->notEmpty();

        if ($name_validator->validate($name) && $email_validator->validate($email) && $username_validator->validate($username) && $number_validator->validate($number) && $password_validator->validate($password) && $cpassword == $password) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // Escape the form data
            $name = $mysqli->real_escape_string($name);
            $email = $mysqli->real_escape_string($email);
            $username = $mysqli->real_escape_string($username);
            $number = $mysqli->real_escape_string($number);

            // Insert the data into the Users table
            $query = "INSERT INTO Users (name, email, username, number, password) VALUES ('$name', '$email', '$username', '$number', '$password_hash')";
            $result = $mysqli->query($query);
            if (!$result) {
                echo "There has been an error processing your request.";
            } else {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;
                // header('Location: index.php');
                echo("Registered");
            }
            
        } else {
            echo("One or more fields entered are incorrect");
        }
    }

    // Check if username is available
    if(isset($_POST['username']) && !isset($_POST['req'])) {
        // Get the username
        $username = $_POST['username'];

        // Escape the username
        $username = $mysqli->real_escape_string($username);

        // Check if the username already exists
        $query = "SELECT * FROM Users WHERE username = '$username'";
        $result = $mysqli->query($query);

        if ($result->num_rows > 0) {
        // Username already exists
        echo 'exists';
        } else {
        // Username does not exist
        echo 'not exists';
        }
    }
?>