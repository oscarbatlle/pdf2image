/**
 * Created by oscar on 6/13/15.
 */
$(document).ready(function () {
    $('form').on("submit", function (event) {
        event.preventDefault();
        var form = $(this);
        $.ajax('process_file.php', {
            method: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            beforeSend: function(){
                $('.submit').val('Loading, Please wait...')
                $('.progress').removeClass('hide');
            },
            success: function (result) {
                form.remove();
                $('#result').html(result).fadeIn();
                document.getElementById('links').onclick = function (event) {
                    event = event || window.event;
                    var target = event.target || event.srcElement,
                        link = target.src ? target.parentNode : target,
                        options = {index: link, event: event},
                        links = this.getElementsByTagName('a');
                    blueimp.Gallery(links, options);
                };
            }
        });
    });
});