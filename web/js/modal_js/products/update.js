/**
 * Created by ZloyBarsuk on 30.06.2017.
 */

$(document).on('ready', function () {



$('body').on('click', 'td>a.update_products', function (event) {


    event.stopPropagation();
    var href = $(this).attr('href');
    var modal = $('#modal-main');
    var modal_content = modal.find('#modalMainContent');

    $.get(href, function (data) {
        modal_content.html(data);
        modal.modal('show');
    }).fail(function (data) {
        var n = Noty('id');
        $.noty.setText(n.options.id, data.notify_text);
        $.noty.setType(n.options.id, 'error');
        return false;
    })

    modal.on('hidden.bs.modal', function (event) {

        $.pjax.reload({container: '#products_grid'});
        modal_content.html('');
        return false;

    });

    return false;


});
});
