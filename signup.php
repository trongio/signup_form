<?php
require_once __DIR__ .'/controllers/RegisterController.php';
?>
<!doctype html>
<html lang="en">
<head>
    <title>sign up</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Register</h1>
    <form method="post" action="signup.php">
        <div class="form-group">
            <label for="firstname">First name:</label>
            <input type="text" class="form-control <?php echo isset($errors['firstname']) ? ' is-invalid' : '' ?>"
                   name="firstname">
            <div class="invalid-feedback">
                <?php echo $errors['firstname'] ?? '' ?>
            </div>
        </div>
        <div class="form-group">
            <label for="lastname">Last name:</label>
            <input type="text" class="form-control <?php echo isset($errors['lastname']) ? ' is-invalid' : '' ?>"
                   name="lastname">
            <div class="invalid-feedback">
                <?php echo $errors['lastname'] ?? '' ?>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control <?php echo isset($errors['email']) ? ' is-invalid' : '' ?>"
                   name="email">
            <div class="invalid-feedback">
                <?php echo $errors['email'] ?? '' ?>
            </div>
        </div>

        <button name="signup-btn" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
