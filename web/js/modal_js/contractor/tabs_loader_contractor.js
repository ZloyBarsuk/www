/**
 * Created by Andrew on 13.01.2016.
 */

$(document).ready(function () {



    $('body').on('click', '#tabs li>a.ajax_loader', function () {
        var href_controller = $(this).attr('href').replace('#', '');

        var contractor_id = jQuery('#contractor-contractor_id').val();

        if (contractor_id == undefined || contractor_id == null || contractor_id == '') {
            var n = Noty('id');
            $.noty.setText(n.options.id, "Вы не заполнили и не сохранили данные на предыдущей вкладке!");
            $.noty.setType(n.options.id, 'error');
            return false;
        }


        var format_url = href_controller.replace('_', '/');
       // var url = '/' + format_url + '/' + contractor_id + '/';
           var   url = '/' + format_url;

        //   var url = '/' + href_controller + '/' + 'infobycontractor' + '/' + contractor_id;

        /*  jQuery.get(url, function (response) {
         jQuery('#' + href_controller).html(response);
         });*/

        $.ajax({
            'url': url,
            'type': 'GET',
            'data': {contractor_id:contractor_id},
            'cache': false,
            success: function (response) {
                $('#' + href_controller).html(response);

            },

            error: function (response) {

                var n = Noty('id');
                $.noty.setText(n.options.id, JSON.stringify(response) );
                $.noty.setType(n.options.id, 'error');

                return false;

            }
        });


    });

});