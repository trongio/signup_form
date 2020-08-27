<!doctype html>
<html lang="en">
<head>
    <title>sign up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="ajax.js"></script>
</head>

<body>
    <div class="container">
        <h1>Register</h1>
        <p id="serverResponse"></p>

        <div class="form-group">
            <label for="firstname">First name:</label>
            <input id="firstname" type="text" class="form-control "
                name="firstname">
        </div>

        <div class="form-group">
            <label for="lastname">Last name:</label>
            <input id="lastname" type="text" class="form-control "
                name="lastname">
        </div>

        <div class="form-group">
            <label for="email">Email address:</label>
            <input id="email" type="email" class="form-control "
                name="email">
        </div>

        <button id="submitbutton" name="signup-btn" type="submit" class="btn btn-primary">Submit</button>

    </div>

</body>
</html>