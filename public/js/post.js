function getParameterByName(name, url) {
    if (!url) {
      url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function scrollDownIfParam(param, position) {

    var result = getParameterByName(param);
    if(result && result == 'true') {

        setTimeout(function() {
            
            var scrollPoint = $(position).offset().top - 50;

            $('body,html').animate({
                scrollTop: scrollPoint
            }, 1250, 'easeInOutExpo');

        }, 1000);
        
    }

}

function unquote() {
    $('#quote_post').hide();
    $( "input[name*='postQuoteId']" ).val(0);
}

$(document).ready(function() {

    scrollDownIfParam('add', '.row-new-post');
    // scrollDownIfParam('error', '#error_post');

    var result = getParameterByName('error');

    if(result && result == 'true') {
        $('#post').focus();
    }

    $('.btn-quote').click(function() {
        var id = $(this).attr('id');
        id = id.split("-")[2];       

        $.getJSON("/post/" + id, function(result) {
            $('#quote-user').text(result.user);
            $('#quote-message').text(result.message);
            $( "input[name*='postQuoteId']" ).val(id);
            $('#quote_post').show();
        });

    });

});

