<?php
    session_start();
    if (isset($_SESSION['logged_in'])) {
        header('Location: index.php');
        exit;
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>BitMoney</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    </head>
    <link rel="stylesheet" href="styles.css">
    <body class="d-flex justify-content-center align-items-center body" height="100vh">
        <div class="formMain main text-center">
            <div class="row d-flex align-items-center justify-content-centerd-flex align-items-center justify-content-center">
                <div class="formBox">
                    <h2 class="text-gold mb-4">Register Now</h2>
                    <form id="regForm" method="post">
                        <div class="d-md-flex">
                            <div class="mx-md-2 mb-3">
                                <input id="req" name="req" class="d-none" value="Reg" type="text">
                                <input id="name" name="name" type="text" placeholder="Name" class="c-input">
                            </div>
                            <div class="mx-md-2 mb-3">
                                <input id="email" name="email" type="email" placeholder="Email Address" class="c-input">
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <div class="mx-md-2 mb-3">
                                <input id="number" name="number" type="tel" placeholder="Phone Number" class="c-input">
                            </div>
                            <div class="mx-md-2 mb-3">
                                <input id="username" name="username" type="text" placeholder="Username" class="c-input">
                                <p class="usernameText mb-0"></p>
                            </div>
                        </div>
                        <div class="d-md-flex">
                            <div class="mx-md-2 mb-3">
                                <input id="password" name="password" type="password" placeholder="Password" class="c-input">
                            </div>
                            <div class="mx-md-2 mb-3">
                                <input id="cpassword" name="cpassword" type="password" placeholder="Confirm Password" class="c-input">
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-gold">Register</button>
                        </div>
                    </form>
                    <p class="errorMsg"></p>
                    <p class="change-url">Already have an account ? <a href="login.php">Log in! </a></p>
                </div>
            </div>
        </div>
        <script>
            $().ready(function() {
                $('#username').keyup(function() {
                    // Get the username
                    var username = $(this).val();

                    if(username.length >= 4) {
                        // Send the AJAX request
                        $.ajax({
                        url: 'actions.php',
                        type: 'POST',
                        data: {
                            username: username
                        },
                        success: function(response) {
                            if (response == 'exists') {
                            // Show an error message
                            $('.usernameText').text('Username already exists');
                            } else {
                            // Clear the error message
                            $('.usernameText').text('Username available');
                            }
                        }
                        });
                    }
                });
                $("#regForm").validate({
                    rules: {
                        name: "required",
                        email: {
                            required: true,
                            email: true
                        },
                        number: {
                            minlength: 10,
                            required: "Phone number must contain at least 10 digits"
                        },
                        username: {
                            required: true,
                            minlength: 4
                        },
                        password: "required",
                        cpassword: {
                            equalTo: "#password",
                            required: true,
                        },
                    },
                    submitHandler: function() {
                        
                        $.ajax({
                            method: 'POST',
                            url: 'actions.php',
                            data: $("form").serialize()
                        }).done(function(data) {
                            if(data === "Registered") {
                                window.location.replace("index.php");
                            } else {
                                $(".errorMsg").html(data);
                            }
                        })
                    }
                })
            })
        </script>
    </body>
    
</html>