$(document).ready(function () {
    // do not apply on the Login page
    if($('#loginPage').length) {
        return;
    }

    function initICheck()
    {
        $('input').filter(function () {
            return !$(this).parent().is('.form-radio');
        }).iCheck({
            checkboxClass: 'form-checkbox',
            radioClass: 'form-radio',
            checkedClass: 'checked',
            hoverClass: 'form-hover'
        });
    }

    initICheck();
    $(document).bind('ScheduledReport.edit', initICheck);
    $(broadcast).bind('locationChangeSuccess', initICheck);

    $('body').on('ifClicked', 'input', function () {
        $(this).trigger('click');
    }).on('ifChanged', 'input', function () {
        $(this).trigger('change');
    });
});