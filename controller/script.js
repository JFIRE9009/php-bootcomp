$(document).ready(function()
{
    $('.like_btn').on('click', function()
    {
        var post_id = $(this).data('orderGallery');
        alert(post_id);
    });
});