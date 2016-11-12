{{ content() }}
<script>
    $(function () {
        setTimeout(function () {
            var max = 0;
            $('.item').each(function () {
                max = ($(this).height() > max) ? $(this).height() : max;
            }).height(max).find('.image').css({'position' : 'absolute'});
        }, 100);
    });
</script>