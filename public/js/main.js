$(document).ready(function() {
    $('.custom-list').on('click', function() {
        window.location.href = $(this).data('link');
        // new window:
        //window.open($(this).data('link'));
    });
    
    $('.custom-list a, .custom-list button')
    .on('click', function(e) {
        e.stopPropagation();
    });
});