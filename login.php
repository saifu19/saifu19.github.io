<?php
    session_start();
    if (isset($_SESSION['logged_in'])) {
        header('Location: index.php');
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>BitMoney</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha512-0QDLUJ0ILnknsQdYYjG7v2j8wERkKufvjBNmng/EdR/s/SE7X8cQ9y0+wMzuQT0lfXQ/NhG+zhmHNOWTUS3kMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <link rel="stylesheet" href="styles.css">
    <body class="d-flex justify-content-center align-items-center body" height="100vh">
        <div class="formMain main text-center">
            <div class="row d-flex align-items-center justify-content-centerd-flex align-items-center justify-content-center">
                <div class="formBox">
                    <h2 class="mb-4 text-gold">Log in</h2>
                    <form id="loginForm" method="post">
                        <input id="req" name="req" class="d-none" type="text" value="Login">
                        <input id="username" name="username" class="c-input mb-3" type="text" placeholder="Username">
                        <input id="password" name="password" class="c-input mb-2" type="password" placeholder="Password">
                        <div class="text-center">
                            <button class="btn btn-gold mt-2" type="submit">Log in</button>
                        </div>
                    </form>
                    <p class="errorMsg"></p>
                    <p class="change-url">Don't have an account ? <a href="register.php">Sign up! </a></p>
                </div>
            </div>
        </div>
        <script>
            $().ready(function() {
                $("form").validate({
                    rules: {
                        username: "required",
                        password: "required"
                    },
                    submitHandler: function() {
                        $.ajax({
                            method: 'POST',
                            url: 'actions.php',
                            data: $("form").serialize()
                        }).done(function(data) {
                            if(data === "Logged in") {
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