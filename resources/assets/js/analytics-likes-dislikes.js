import Chart from 'chart.js/src/chart.js';

$(function(){

    var user = jQuery.parseJSON($('meta[name=user]').attr("content"));

    $.getJSON("/api/videos/user/"+user.id, function (result) {

        var labels = [],dataLikes=[],dataDislikes=[];
        for (var i = 0; i < result.data.length; i++) {
            labels.push(result.data[i].name);
            dataLikes.push(result.data[i].likes);
            dataDislikes.push(result.data[i].dislikes);
        }

        var likesData = {
            labels : labels,
            datasets : [
                {
                    label: "Likes",
                    backgroundColor: "rgba(92,184,92,1)",
                    strokeColor: "rgba(92,184,92,1)",
                    data:dataLikes
                },
                {
                    label: "Dislikes",
                    backgroundColor: "rgba(217,83,79,1)",
                    strokeColor: "rgba(217,83,79,1)",
                    data: dataDislikes
                }
            ]
        };

        var canvas = document.getElementById('likes-graph').getContext('2d');
        var myBarChartLikes = new Chart(canvas, {
            type: 'bar',
            data: likesData
        });

    });

});