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


$('.change-status-section').on('click',e => {
    let id = event.target.id
    let status = $(`#${id}`).hasClass('active') ;
    $.ajax({
        type: 'post',
        url:'/shopping-online/public/admin/change-status-section',
        data: {status: status === true ? 0 : 1, id: id},
        success: function(data){
          if (status == true) {
            $(`#${id}`).removeClass('fas fa-check-circle active ').addClass('fas fa-ban inactive').css('color', 'red')
        }else{
            $(`#${id}`).removeClass('fas fa-ban inactive').addClass('fas fa-check-circle active ').css('color', 'green')
        }
        }
    })
   });