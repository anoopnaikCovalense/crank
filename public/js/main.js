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




$('#add').click(function() {
    $(".card").hide();
});

// $('.cardBox').on('click', '.addMore', function() {
//     if ($('form .fieldGroup').length > maxGroup) {
//       alert('Maximum ' + maxGroup + ' groups are allowed.');
//       return; // Exit
//     }
//     $(this).closest(".card").find('.fieldGroup:last').after(fieldTemplate); // TAKIT: Modified here
//   });
  
//   $('.add').trigger('click');
