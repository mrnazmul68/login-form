<?php

session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];

$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error) {
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">
            <form action="login_register.php" method="post">
                <h2>Login</h2>
                <?= showError($errors['login']); ?>

                <input type="email" name="email" id="" placeholder="Enter your email..." required>
                <input type="password" name="password" id="" placeholder="Enter your password..." required>
                <button type="submit" name="login">Login</button>
                <p>You don't have an account? <a href="#" onclick="showForm('register-form')">Register</a></p>
            </form>
        </div>
    </div>

  <!-- regestation form -->
    <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
        <form action="login_register.php" method="post">
            <h2>Register</h2>
            <?= showError($errors['register']); ?>

            <input type="text" name="name" id="" placeholder="Enter your name..." required>
            <input type="email" name="email" id="" placeholder="Enter your email..." required>
            <input type="password" name="password" id="" placeholder="Enter your password..." required>
            <select name="role" required>
                <option value="">--Select role--</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <button type="submit" name="register">register</button>
            <p>Already have an acco unt? <a href="#" onclick="showForm('login-form')">Login</a></p>
        </form>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>