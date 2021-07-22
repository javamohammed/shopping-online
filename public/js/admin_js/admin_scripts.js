$( document ).ready(function() {
   $("#current_password").keyup(_=> {
       let current_password = $("#current_password").val();
       $.ajax({
           type: 'post',
           url:'/shopping-online/public/admin/check-current-pwd',
           data: {current_password: current_password},
           success: function(data){
            if (data == "true") {
                $('#error_current_password').css("color", "green").text("Password is correct")
            } else {
                $('#error_current_password').css("color", "red").text("Password is not correct")
            }
           }
       })
   })
});