$('body').on('click', '#add_invoice_modal,#add_invoice_index', function (event) {
    event.stopPropagation();
    var button_id = $(this).attr('id');

    switch (button_id) {
        case 'add_invoice_index':
            var modal = $('#modal-main');
            break;
        case 'add_invoice_modal':
            var modal = $('#modal-add');
            break;
        default:
            alert('Я таких значений не знаю! Проверь селектор в скрипте !');

    }
    var contractor = $('#dogovor-id_contractor').val();
    var executor = $('#dogovor-id_executor').val();


    var href = $(this).attr('value');
    var modal_content = modal.find('#modalContent');
    modal_content.html('');
    var grid_data = $('#contractor_dogovor_invoices_modal').data();
    var param = grid_data !== undefined ? grid_data.dogovor_id : '';


    $.ajax({
        'url': href,
        'type': 'POST',
        'data': {
            dogovor_id: param,
            dog_contractor: contractor,
            dog_executor: executor,
        },
        'cache': false,
        success: function (response) {

            if (response === Object(response)) {
                console.log(response.notify);
            }
            if (response.notify == 0) {

                var n = Noty('id');
                $.noty.setText(n.options.id, response.responseText);
                $.noty.setType(n.options.id, 'error');
                return false;
            }
            else {
                modal_content.html(response);
                modal.modal('show');
            }

        },
        error: function (response) {
            // check error from RBAC and
            var n = Noty('id');
            $.noty.setText(n.options.id, response.responseText);
            $.noty.setType(n.options.id, 'error');


            return false;
        }


    });


    modal.on('hidden.bs.modal', function (event) {


        return false;

    });
    return false;

});




