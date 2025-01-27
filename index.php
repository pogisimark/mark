<?php include 'login.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
    <style>
        .message-popup {
            position: fixed;
            top: 20%;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 20px;
            border-radius: 5px;
            z-index: 1000;
            display: none;
        }
        .message-popup button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container active" id="login-container">
        <div class="column"  style="background-color: rgba(131, 131, 131, 0.8);">
            <form class="column1" method="POST">
                <h1>Log In</h1>
                <input type="text" name="student_number" placeholder="Student Number" style="margin-top: 60px;" required>
                <input type="password" name="password" placeholder="Password" style="margin-top: 20px;" required>
                <button type="submit" name="login" style="margin-top: 20px;">Log In</button> <br> <br> <br> <br>
                <a href="#" id="show-create-account" style="margin-top:40px; margin-left:10px;" >Don't have an account?</a>
            </form>
        </div>
    </div>

    <div class="container" id="create-account-container" style="display: none;">
        <div class="column" style="background-color: rgba(131, 131, 131, 0.8);">
            <form class="column1" method="POST">
                <h1>Create Account</h1>
                <input type="text" name="student_number" placeholder="Student Number" style="margin-top:20px;" required>
                <label for="section" style="margin-top:20px; font-size:20px;  margin-left:30px;">Section:</label>
                <select id="section" name="section" style="margin-top:20px;">
                    <option value="1A">1A</option>
                    <option value="1B">1B</option>
                    <option value="1C">1C</option>
                    <option value="2A">2A</option>
                    <option value="2B">2B</option>
                    <option value="3A">3A</option>
                    <option value="3B">3B</option>
                    <option value="4A">4A</option>
                    <option value="4B">4B</option>
                </select>
                <input type="password" name="password" placeholder="Password" style="margin-top:20px;" required>
                <button type="submit" name="create_account" style="margin-top:20px; margin-left:60px;">Create Account</button> <br><br>
                <a href="#" id="show-login" >Already Registered?</a>
            </form>
        </div>
    </div>

    <div class="image-container" id="login-container1">
        <img src="Images/nc_logo-removebg-preview.png" alt="Right side image">
        <h1 style="display: flex; justify-content: center; margin-top: 50px;">Norzagaray College</h1>
        <h1 style="display: flex; justify-content: center; font-size: 40px;">Faculty Evaluation</h1>
    </div>

    <!-- Message Popup -->
    <div class="message-popup" id="message-popup"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (isset($_SESSION['message'])): ?>
                document.getElementById('message-popup').style.display = 'block';
                document.getElementById('message-popup').innerHTML = '<?php echo $_SESSION['message']; ?> <button onclick="closePopup()">OK</button>';
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>

            // Toggle between login and create account forms
            document.getElementById("show-create-account").onclick = function() {
                document.getElementById('login-container').style.display = 'none';
                document.getElementById('create-account-container').style.display = 'block';
            };
            document.getElementById("show-login").onclick = function() {
                document.getElementById('create-account-container').style.display = 'none';
                document.getElementById('login-container').style.display = 'block';
            };
        });

        function closePopup() {
            document.getElementById('message-popup').style.display = 'none';
        }
    </script>

    <script src="script.js"></script>
</body>
</html>
