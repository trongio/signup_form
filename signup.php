<!doctype html>
<html lang="en">
<head>
    <title>sign up</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Register</h1>
        <p id="serverResponse"></p>

        <div class="form-group">
            <label for="firstname">First name:</label>
            <input id="firstname" type="text" class="form-control <?php echo isset($errors['firstname']) ? ' is-invalid' : '' ?>"
                name="firstname">
            <div class="invalid-feedback">
                <?php echo $errors['firstname'] ?? '' ?>
            </div>
        </div>

        <div class="form-group">
            <label for="lastname">Last name:</label>
            <input id="lastname" type="text" class="form-control <?php echo isset($errors['lastname']) ? ' is-invalid' : '' ?>"
                name="lastname">
            <div class="invalid-feedback">
                <?php echo $errors['lastname'] ?? '' ?>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email address:</label>
            <input id="email" type="email" class="form-control <?php echo isset($errors['email']) ? ' is-invalid' : '' ?>"
                name="email">
            <div class="invalid-feedback">
                <?php echo $errors['email'] ?? '' ?>
            </div>
        </div>

        <button id="submitbutton" name="signup-btn" type="submit" class="btn btn-primary">Submit</button>

    </div>

</body>
</html>
<script>
    $(document).ready(function (){
        $("#submitbutton").click(function (){
            var datastring= {
                "firstname": $("#firstname").val().trim(),
                "lastname": $("#lastname").val().trim(),
                "email": $("#email").val().trim()}
                $.ajax({
                    type:"POST",
                    url: "controllers/RegisterController.php",
                    data:datastring,
                    success: function (result){
                        $("#serverResponse").html(result);
                    }
                })
        })

    })
</script>
