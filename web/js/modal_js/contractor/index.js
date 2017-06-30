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
        $.post(href).done(function (data) {
            modal_content.html(data);
            modal.modal('show');
        });
        return false;

    });
});