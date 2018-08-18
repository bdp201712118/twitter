$(function () {
    $('.search-box').autocomplete({
        search: function (event, ui) {
            $('.searchMessage').show();
        },
        open: function (event, ui) {
            $('.searchMessage').hide();
        },
        source: 'controller.php?autosearch=true',
        minLength: 1
    }).off('blur').on('blur', function () {
        if (document.hasFocus()) {
            $('ul.ui-autocomplete').hide();
        }
    });
});