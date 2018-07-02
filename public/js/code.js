$('#here').html('This data from js file');

$(document).ready(function () {
    $('#ajax_url').on('click', function (e) {
        e.preventDefault();

        var link = $(this).attr('href');

        $.ajax({
            method: POST,
            url: link,
        }).done(function (data) {
            $('.num').html(data);
        })
    })
})