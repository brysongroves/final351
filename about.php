<?php

// starting with code from my login page, too keep layout the similar

$host = 'localhost';
$user = 'root'; 
$pass = 'mysql'; 
$dbname = '351final';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = $_POST['subject'];
    $problem = $_POST['problem'];

    $stmt = $pdo->prepare("INSERT INTO questions (subject, problem) VALUES (:subject, :problem)");
    $stmt->bindValue(':subject', $subject, PDO::PARAM_STR);
    $stmt->bindValue(':problem', $problem, PDO::PARAM_STR);

    if ($stmt->execute()) {
        $message = "Sent!";
    } 
}
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
            background-image: url('questions.jpg');
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
<body>

<!-- llm created the text boxes, & they suck -->
<div class="container">
        <h2>Submit Your Question / Issue</h2>
        <?php if (isset($message)): ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <form action="" method="post">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" required>

            <label for="problem">Problem</label>
            <textarea id="problem" name="problem" required></textarea>

            <button type="submit">Send</button>
        </form>
    </div>
    </body>

<?php
