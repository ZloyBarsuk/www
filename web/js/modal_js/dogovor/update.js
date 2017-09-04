/**
 * Created by ZloyBarsuk on 30.06.2017.
 */





    $('body').on('click', 'td>a.update_dogovors,td>a.update_dogovors_contractor', function (event) {

        var button_class= $(this).attr('class');
        event.stopPropagation();
        var href = $(this).attr('href');
      //  var data_id = $(this).attr('data-model-id');
        var modal = $('#modal-update');
        var modal_content = modal.find('#modalContent');
        var grid_data = $('#dogovors_modal').data();
        modal_content.html('');

        /*  $.post(href).done(function (data) {
         modal_content.html(data);
         modal.modal('show');
         });*/
        $.get(href, function (data) {
            modal_content.html(data);
            modal.modal('show');
        }).fail(function (data) {
            var n = Noty('id');
            $.noty.setText(n.options.id, data.responseText);
            $.noty.setType(n.options.id, 'error');
            return false;
        })

        modal.on('hidden.bs.modal', function (event) {


            if (button_class == 'update_dogovors_contractor') {
                $.pjax.reload({
                    container: '#dogovors-grid',
                    push: true,
                    url: grid_data.controller,
                    data: {'contractor_id': grid_data.contractor_id},
                    history: false,
                    cache: false,
                    datatype: 'html',
                    replaceRedirect: false,
                    replace: true,
                    type: 'GET',
                    timeout: 3000
                });
            }
            else {
                $.pjax.reload({container: '#dogovors-grid'});
            }
            modal_content.html('');

            return false;
        });
        return false;


    });

