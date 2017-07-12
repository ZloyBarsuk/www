/**
 * Created by ZloyBarsuk on 30.06.2017.
 */
$(document).on('ready', function () {

// обновление контрагента и его инфы
    $('body').on('click', 'td>a.update_contractor', function (event) {

        event.stopPropagation();
        var href = $(this).attr('href');
        var data_id = $(this).attr('data-model-id');
        var modal = $('#modal-contractor');
        var modal_content = modal.find('#modalContentContractor');
        modal_content.html('');
        $.post(href, function (data) {
            modal_content.html(data);
            modal.modal('show');
        }).fail(function (data) {
            var n = Noty('id');
            $.noty.setText(n.options.id, data.responseText);
            $.noty.setType(n.options.id, 'error');

        })
        return false;

    });

    // показать список банков контрагента блядь
    $('body').on('click', 'td>a.banks_by_contractor', function (event) {
        event.stopPropagation();
        var href = $(this).attr('href');

        var modal = $('#modal-universal');
        var modal_content = modal.find('#modalUniversalContent');
        modal_content.html('');
        $.post(href, function (data) {
            modal_content.html(data);
            modal.modal('show');
        }).fail(function (data) {
            var n = Noty('id');
            $.noty.setText(n.options.id, data.responseText);
            $.noty.setType(n.options.id, 'error');

        })
        modal.on('hidden.bs.modal', function (event) {
            modal_content.html('');
            $.pjax.reload({container: '#contractor_grids', timeout: 3000});

            return false;

        });


        return false;

    });


});

