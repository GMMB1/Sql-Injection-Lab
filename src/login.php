<?php
$host = 'mysql'; // docker-compose.yml
$db = 'injection_lab';
$user = 'dbuser';
$pass = 'dbpassword';

$conn = new mysqli($host, $user, $pass, $db);

$message = ''; // store message to show in form

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vulnerable SQL query (for your lab)
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $message = "✅ Successfully login";
    } else {
        $message = "❌ The username or password incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Roboto', sans-serif; }
        body { height: 100vh; display: flex; justify-content: center; align-items: center;
               background: linear-gradient(135deg, #667eea, #764ba2); color: #333; }
        .login-container { background: #fff; padding: 40px 50px; border-radius: 15px;
                           box-shadow: 0 15px 30px rgba(0,0,0,0.2); width: 350px; text-align: center; position: relative; }
        .login-container svg { width: 80px; margin-bottom: 20px; fill: #667eea; }
        h2 { margin-bottom: 30px; color: #333; }
        input { width: 100%; padding: 12px 15px; margin: 10px 0; border-radius: 8px; border: 1px solid #ccc; outline: none; transition: 0.3s; }
        input:focus { border-color: #667eea; box-shadow: 0 0 8px rgba(102, 126, 234, 0.4); }
        button { width: 100%; padding: 12px; margin-top: 20px; border: none; border-radius: 8px;
                 background: #667eea; color: #fff; font-size: 16px; cursor: pointer; transition: 0.3s; }
        button:hover { background: #5a67d8; }
        .message { margin-top: 15px; font-size: 14px; color: red; min-height: 20px; }
    </style>
</head>
<body>

<div class="login-container">
    <!-- Example SVG icon -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0ZM12 3C13.6569 3 15 4.34315 15 6C15 7.65685 13.6569 9 12 9C10.3431 9 9 7.65685 9 6C9 4.34315 10.3431 3 12 3ZM12 21C9.33 21 7.06 19.94 5.5 18.26C5.52 16.17 10 15 12 15C14 15 18.48 16.17 18.5 18.26C16.94 19.94 14.67 21 12 21Z"/>
    </svg>

    <h2>Login</h2>
    <form id="loginForm" action="" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
        <div class="message" id="message"><?php echo $message; ?></div>
    </form>
</div>

<script>
    // simple JS feedback effect
    const form = document.getElementById('loginForm');
    const messageDiv = document.getElementById('message');

    form.addEventListener('submit', function() {
        messageDiv.style.color = "#667eea";
        messageDiv.textContent = "Logging in...";
    });
</script>

</body>
</html>
