
function str_slug(Text)
{
    return Text
        .trim()
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
}

$(document).ready(function () {
    $('#post-title').on('input', function() {
        console.log(str_slug(this.value));
        $( "#post-slug" ).val(str_slug(this.value));
    });
});