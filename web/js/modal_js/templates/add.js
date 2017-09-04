/**
 * Created by ZloyBarsuk on 30.06.2017.
 */

$('body').on('click', '#add_template_modal,#add_templates_index', function (event) {

    event.stopPropagation();

    var button_id = $(this).attr('id');


    switch (button_id) {
        case 'add_templates_index':
            var modal = $('#modal-main');
            break;
        case 'add_template_modal':
            var modal = $('#modal-add');
            break;
        default:
            alert('Я таких значений не знаю! Проверь селектор в скрипте !');

    }

    var href = $(this).attr('value');
    var modal_content = modal.find('#modalContent');
    modal_content.html('');
    var grid_data = $('#contractor_templates_modal').data();
    var param = grid_data !== undefined ? grid_data.contractor_id : '';

    $.post(href, {'contractor_id': param}, function (response) {
        modal_content.html(response);
        modal.modal('show');
    }).fail(function (response) {
        var n = Noty('id');
        $.noty.setText(n.options.id, response.responseText);
        $.noty.setType(n.options.id, 'error');

    })

    modal.on('hidden.bs.modal', function (event) {


        modal_content.html('');
        return false;
        /* $('#pjax_add_product').on('pjax:end', function () {
         alert("pjax_add_product");
         $.pjax.reload({container: '#pjax_products', timeout: 5000});
         });*/

    });


});

