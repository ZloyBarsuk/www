

$('body').on('click', '#add_dogovor_modal,#add_dogovor_index', function (event) {

        event.stopPropagation();
        var button_id = $(this).attr('id');

        var modal = $('#modal-lower');
        var href = $(this).attr('value');
        var modal_content = modal.find('#modalLowerContent');
        modal_content.html('');
        var grid_data = $('#contractor_banks_modal').data();
        var param = grid_data !== undefined ? grid_data.dogovor_id : '';

        $.get(href, {'dogovor_id': param}, function (data) {
            modal_content.html(data);
            modal.modal('show');


        }).fail(function (data) {

            $.noty.setText(n.options.id, data.responseText);
            $.noty.setType(n.options.id, 'error');

            if (button_id == 'add_dogovor_modal') {
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
            else if (button_id == 'add_bank_index') {
                $.pjax.reload({container: '#dogovors-grid'});
            }


        });

        modal.on('hidden.bs.modal', function (event) {

        });




})

