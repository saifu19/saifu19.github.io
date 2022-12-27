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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha512-0QDLUJ0ILnknsQdYYjG7v2j8wERkKufvjBNmng/EdR/s/SE7X8cQ9y0+wMzuQT0lfXQ/NhG+zhmHNOWTUS3kMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <link rel="stylesheet" href="styles.css">
    <body>
        <div class="nav-container">
            <?php
                include("nav.html");
            ?>
        </div>
        
        <div class="main support mt-0">
            <div class="chat-window">
                
            </div>
            <div class="message-field">
                <!-- Image Preview -->
                <div class="preview-container d-none">
                    <div>
                        <i class="fa fa-times cross"></i>
                        <img id="preview">
                    </div>
                </div>
                <form class="mb-0">
                    <input id="username" name="username" type="text" class="d-none" value=<?php echo $_SESSION['username']?>>
                    <input id="message" name="message" type="text" class="" placeholder="Type your message here...">
                    <label for="attachment" id="attachment-label">
                        <i class="fa fa-paperclip mb-0"></i>
                    </label>
                    <input type="file" id="attachment" class="d-none" accept="image/*">
                    <button type="submit" class="send"><i class="fa fa-paper-plane"></i></button>
                </form>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="navScript.js"></script>
        <script>
            // Get the image input and preview elements
            const imageInput = document.getElementById('attachment');
            const imagePreview = document.getElementById('preview');
            
            // Add a change event listener to the input element
            imageInput.addEventListener('change', (e) => {
                // Check if the selected file is an image
                if (!imageInput.files[0].type.startsWith('image/')) {
                    // Display an error message
                    alert('Please select an image file.');
                    
                    // Clear the input field
                    imageInput.value = '';
                    
                    // Reset the preview image
                    imagePreview.src = '#';
                } else {
                    $(".chat-window").height($(window).height()-$(".nav-container").height()-$(".preview-container").height()-75);
                    // Create a new FileReader object
                    const reader = new FileReader();

                    // Add a load event listener to the FileReader object
                    reader.addEventListener('load', (event) => {
                        // Set the src attribute of the image preview element to the data URL of the image
                        imagePreview.src = event.target.result;
                    });

                    // Read the selected file as a data URL
                    reader.readAsDataURL(imageInput.files[0]);
                }
                $(".preview-container").removeClass("d-none");
            });

            $(".cross").click(function() {
                imageInput.value = '';
                // Reset the preview image
                imagePreview.src = '#';
                // Hide the remove button
                $(".preview-container").addClass("d-none");
                $(".chat-window").height($(window).height()-$(".nav-container").height()-75);
            })

            $(".send").click(function() {
                alert($("form").serialize());
                return false;
            })

            $(document).ready(function() {
                $(".chat-window").height($(window).height()-$(".nav-container").height()-75);
            })
        </script>
    </body>
</html>