/**
 * Created by ZloyBarsuk on 30.06.2017.
 */
$(document).on('ready', function () {

    // обновление твоара блядь
    $('body').on('click', 'td>a.update_templates', function (event) {
        event.stopPropagation();
        var href = $(this).attr('href');
        var data_id = $(this).attr('data-model-id');
        var modal = $('#modal-products');
        var modal_content = modal.find('#modalContent');
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
});