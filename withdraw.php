<?php
    // session_start();
    // if(!isset($_SESSION['loggedIn']) && !$_SESSION['loggedIn'] == true) {
    //     header("location: login.php");
    // }
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BitMoney</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha512-0QDLUJ0ILnknsQdYYjG7v2j8wERkKufvjBNmng/EdR/s/SE7X8cQ9y0+wMzuQT0lfXQ/NhG+zhmHNOWTUS3kMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <link rel="stylesheet" href="styles.css">
    <body>
        <?php
            include("nav.html");
        ?>
        <div class="d-flex justify-content-center align-items-center">
            <div class="withdraw main mt-5">
                <div class="c-card">
                    <h3>Your Earnings</h3>
                    <p>$500</p>
                    <p class="text center mb-0"><a href="withdrawForm.php">
                        <button class="btn btn-gold">Withdraw</button>
                    </a></p>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="navScript.js"></script>
    </body>
</html>