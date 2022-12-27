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

        <div class="d-flex justify-content-center align-items-center container">
            <div class="payment main mt-5 c-card">
                <form>
                    <input type="text" name="req" id="req" value="payment" class="d-none">
                    <input type="text" name="username" id="username" value=<?php echo $_SESSION['username'] ?> class="d-none">
                    <label class="d-inline" for="country">Select your Country:</label>
                    <select name="country" id="country">
                        <option value="pk" default>Pakistan</option>
                        <option value="ind">India</option>
                        <option value="ban">Bangladesh</option>
                        <option value="sl">Sri Lanka</option>
                    </select>
    
                    <div>
                        <h4 class="mt-3">Select Payment Method: </h4>
                        <ul>
                            <input name="p-method" value="Easypaisa" type="radio"><span class="ms-2">Easypaisa</span></input><br>
                            <input name="p-method" value="JazzCash" type="radio"><span class="ms-2">JazzCash</span></input><br>
                            <input name="p-method" value="Bank Transfer" type="radio"><span class="ms-2">Bank Transfer</span></input>
                        </ul>
                    </div>
                    <p class="mb-0"><button class="btn btn-gold proceed">Proceed</button></p>
                </form>
                <p class="request d-none">We are processing your request. Please hold on, this may take a while.</p>
                <p class="info" style="display: none;">Send Rs. 4000 to <span class="acc-num"></span>. Take the screenshot of transaction, navigate to the support chat from the side menu and send it there.</p>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="navScript.js"></script>
        <script>
            $(".proceed").click(function() {
                alert($("form").serialize());
                var formData = $("form").serialize();
                // Send a POST request to the PHP script with the form data
                $.post('messages.php', formData, function(data) {
                    // Process the response from the PHP script
                    console.log(data);
                })
                $(".request").removeClass("d-none");
                // $(".info").css("display", "block");
                // $(".acc-num").html("033xxxxxxx")
                return false;
            })
        </script>
    </body>
</html>