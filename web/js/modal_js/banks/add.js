

$('body').on('click','#add_bank_modal,#add_bank_index',function (event) {
    event.stopPropagation();
   var button_id= $(this).attr('id');



        var modal = $('#modal-upper');
        var href = $(this).attr('value');
        var modal_content = modal.find('#modalUpperContent');
        modal_content.html('');
        var grid_data = $('#contractor_banks_modal').data();
        var param = grid_data!== undefined ? grid_data.contractor_id : '';


        $.get(href,{'contractor_id': param}, function (data) {
            modal_content.html(data);
            modal.modal('show');




        }).fail(function (data) {
            var n = Noty('id');
            $.noty.setText(n.options.id, data.responseText);
            $.noty.setType(n.options.id, 'error');
            if(button_id=='add_bank_modal')
            {
                $.pjax.reload({
                    container: '#contractor-banks-grid',
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
            else if(button_id=='add_bank_index')
            {
                $.pjax.reload({container: '#pjax_banks'});
            }

            modal_content.html('');
            return false;
        })


        modal.on('hidden.bs.modal', function (event) {








                 return false;

        });
        return false;

    });




