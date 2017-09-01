/**
 * Created by ZloyBarsuk on 26.06.2017.
 */


$('body').on('beforeSubmit', 'form#template-form', function (event) {

    event.stopPropagation();
    var grid_data = $('#contractor_templates_modal').data();
    var form = $(this);
    if (form.find('.has-error').length) {
        event.stopPropagation();
        return false;
    }
    else {
        $.ajax({
            'url': form.attr('action'),
            'type': 'POST',
            'data': form.serialize(),
            // 'data': data,
            'cache': false,
            success: function (response) {
                var n = Noty('id');
                $.noty.setText(n.options.id, response.responseText);
                $.noty.setType(n.options.id, 'information');

                    $.pjax.reload({
                        container: '#contractor-templates-grid',
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

            },
            error: function (response) {
                var n = Noty('id');
                $.noty.setText(n.options.id, response.responseText);
                $.noty.setType(n.options.id, 'error');
            }
        });
    }
    // }
    /* else {
     var n = Noty('id');
     $.noty.setText(n.options.id, 'контрагент не сохранен или не указан');
     $.noty.setType(n.options.id, 'error');
     }*/

    return false;

});


