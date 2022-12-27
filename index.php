<?php
    session_start();
    if(!isset($_SESSION['logged_in'])) {
        header("location: login.php");
    }
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
        
        <!-- Main -->
        <div class="dashboard container main">
            <h2>Dashboard</h2>

            <div class="row mt-4 d-flex align-items-strech">
                <div class="col-md-4 d-flex align-items-strech mb-3 mt-mb-0">
                    <div class="c-card w-100">
                        <h3>Referrals</h3>
                        <p>0 people</p>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-strech mb-3 mt-mb-0">
                    <div class="c-card w-100">
                        <h3>Earnings</h3>
                        <p>$0.00</p>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-strech mb-3 mt-mb-0">
                    <div class="c-card w-100">
                        <h3>People in Network</h3>
                        <p>0 people</p>
                    </div>
                </div>
            </div>

            <div class="d-flex my-5 align-items-strech justify-content-center fs-3">
                <div class="wrap">
                    <p class="mb-0">Invite Link:</p>
                </div>
                <div class="wrap-link d-flex align-items-center">
                    <input readonly class="me-3 copy" value=<?php 
                        echo "https://www.bitsmoney.com/".$_SESSION["username"]
                    ?>>
                    <img class="c-pointer btn-copy" src="copy.png">
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="navScript.js"></script>
        <script>
            $(".copy").css('width', $(".copy")[0].scrollWidth + 20 + "px"); 
            $(".btn-copy").click(function() {
                // Select the text to copy
                var copyText = $(".copy");
                copyText.select();

                // Copy the text to the clipboard
                document.execCommand("copy");
            });
            $(".changePwSubmit").click(function() {
                if($("#password").val() == "" || $("#confirmPassword").val() == "") {
                    $(".form-error").html("All fields are required!");
                    $(".form-error").show();
                } else if($("#password").val() !== $("#confirmPassword").val()) {
                    $(".form-error").html("Passwords doesn't match!");
                    $(".form-error").show();
                } else {
                    $.ajax({
                        method: 'POST',
                        url: 'actions.php',
                        data: $('#changePwForm').serialize()
                    }).done(function(data) {
                        if(data == "Success!") {
                            location.reload()
                        } else {
                            alert(data);
                        }
                    })
                }
            })
            $(".redirect-btn").click(function() {
                window.location.replace("https://t.me/+r5wPndspNgE1YmM1");
            })
        </script>
    </body>
</html>