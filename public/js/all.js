$('.form-update-user').submit(function(e){
    e.preventDefault();

    $('#response div').remove();

    var formData = new FormData(document.getElementById("form-update-user"));

    $.ajax({
        headers: {
            "X-Authorization": $('meta[name=api_token]').attr("content")
        },
        type: "POST",
        url: $('#form-update-user').attr('action'),
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        success: function(data) {
            location.reload();
        },
        error: function(data){
            $('#response').append('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Upps!</strong> Error to update profile. Please fill in all required fields: Name ( max 255 characters) , Email , Password ( min 6 characters).About Image only can upload jpeg, jpg or png ( max 2048KB ).</div>');
            console.log(data);
        }
    });
});

$('#delete-account-button').click(function(e){
    e.preventDefault();

    $('#response div').remove();

    var user = jQuery.parseJSON($('meta[name=user]').attr("content"));

    $.ajax({
        headers: {
            "X-Authorization": $('meta[name=api_token]').attr("content")
        },
        type: "DELETE",
        url: 'api/users/'+user.id,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            location.reload();
        },
        error: function(data){
            $('#response').append('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Upps!</strong> Error to delete account.</div>');
            console.log(data);
        }
    });
});
//# sourceMappingURL=all.js.map
