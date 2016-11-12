$(function() {

    $('.toggle-sidebar a').on('click', function() {
        if($(this).hasClass('active')) {
            $('.sidebar').removeClass('show');
        }
        else {
            $('.sidebar').addClass('show');
        }
        $(this).toggleClass('active');

        return false;
    });

    $('a.delete').on('click', function(e) {
        var respone = confirm('Вы действительно хотите выполнить это действие?');
        if(respone)
            return true;
        else
            return false;
    });
});