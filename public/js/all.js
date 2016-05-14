$('.form-add-video button[type=submit]').click(function(e){
    e.preventDefault();

    $('#response div').remove();
    $('#upload-button').text(' Uploading...');
    $('#upload-button').append('<span id="loading" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>');

    var formData = new FormData(document.getElementById("form-add-video"));

    $.ajax({
        headers: {
            "X-Authorization": $('#api_token').attr('content')
        },
        type: "POST",
        url: $('#form-add-video').attr('action'),
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        success: function(data) {
            $('#loading').remove();
            $('#upload-button').text('Upload');
            $('#response').append(' <div class="alert alert-info"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Video uploaded correctly. </div>')
            console.log(data);
        },
        error: function(data){
            $('#loading').remove();
            $('#upload-button').text('Upload');
            $('#response').append('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Upps!</strong> Error to upload video. Please fill all camps and review you video type. Only accept MP4.</div>');
            console.log(data);
        }
    });
});

//# sourceMappingURL=all.js.map
