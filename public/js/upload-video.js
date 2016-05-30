$('.form-add-video button[type=submit]').click(function(e){
    e.preventDefault();

    $('#response div').remove();
    $('#upload-button').text(' Uploading...');
    $('#upload-button').append('<span id="loading" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>');

    var formData = new FormData(document.getElementById("form-add-video"));

    $.ajax({
        headers: {
            "X-Authorization": $('meta[name=api_token]').attr("content")
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
            if(data.status == 429){
                $('#response').append('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Upps!</strong> Error to upload video. You have exceeded the limit for videos in one hour.</div>');
            }else{
                $('#response').append('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Upps!</strong> Error to upload video. Please fill all camps and review you video type. Only accept 2Mb size and MP4 type</div>');
            }
            console.log(data);
        }
    });
});
$(function () {
    var dropZoneId = "drop-zone";

    var dropZone = $("#" + dropZoneId);
    var ooleft = dropZone.offset().left;
    var ooright = dropZone.outerWidth() + ooleft;
    var ootop = dropZone.offset().top;
    var oobottom = dropZone.outerHeight() + ootop;
    var inputFile = dropZone.find("input");
    document.getElementById(dropZoneId).addEventListener("dragover", function (e) {
        e.preventDefault();
        e.stopPropagation();

        var x = e.pageX;
        var y = e.pageY;

        if (!(x < ooleft || x > ooright || y < ootop || y > oobottom)) {
            inputFile.offset({ top: y - 15, left: x - 100 });
        } else {
            inputFile.offset({ top: -400, left: -400 });
        }

    }, true);

})
//# sourceMappingURL=upload-video.js.map
