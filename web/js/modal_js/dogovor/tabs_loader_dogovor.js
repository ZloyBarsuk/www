/**
 * Created by Andrew on 13.01.2016.
 */
$(document).ready(function () {

    $('body').on('click', '#tabs li>a.ajax_loader', function () {
        var href_controller = $(this).attr('href').replace('#', '');
        var dogovor_id = $('#dogovor-dogovor_id').val();


        if (dogovor_id == undefined || dogovor_id == null || dogovor_id == '') {
            var n = Noty('id');
            $.noty.setText(n.options.id, "Вы не заполнили и не сохранили данные договора!");
            $.noty.setType(n.options.id, 'error');
            return false;
        }
        var format_url = href_controller.replace('_', '/');
        var url = '/' + format_url;
        $.ajax({
            'url': url,
            'type': 'GET',
            'data': {
                dogovor_id: dogovor_id

            },
            'cache': false,
            success: function (response) {
                $('#' + href_controller).html(response);
            },
            error: function (response) {
                var n = Noty('id');
                $.noty.setText(n.options.id, JSON.stringify(response));
                $.noty.setType(n.options.id, 'error');
                return false;
            }
        });

    });

});