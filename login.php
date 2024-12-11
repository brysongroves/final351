<?php
/* Start the session for login handling */
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('loginabackground.jpg');
            background-size: cover;
            background-position: center;
        }
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100vh;
            padding: 0 50px;
        }
        .login, .register {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 40%;
        }
        h2 {
            margin-top: 0;
            text-align: center;
            color: darkgreen;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: darkgreen;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        button:hover {
            background-color: green;
        }
    </style>
</head>


<!-- used llm to create the visuals for login and register -->
<!-- took a break -->
<body>
    <div class="container">
        <!-- Login Section -->
        <div class="login">
            <h2>Login</h2>
            <form action="process_login.php" method="post">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                
                <button type="submit">Login</button>
            </form>
        </div>

        <!-- Register Section -->
        <div class="register">
            <h2>Register</h2>
            <form action="process_register.php" method="post">
                <label for="new_username">Username</label>
                <input type="text" id="new_username" name="new_username" required>

                <label for="new_password">Password</label>
                <input type="password" id="new_password" name="new_password" required>

                <label for="confirm_password">Verify Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</body>
</html>