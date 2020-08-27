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