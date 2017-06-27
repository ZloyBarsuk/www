/**
 * Created by ZloyBarsuk on 26.06.2017.
 */
/**
 * Created by Andrew on 13.01.2016.
 */




$('body').on('beforeSubmit', 'form#banks-form', function (event) {

    event.stopPropagation();




    var contractor_id = $('#contractor-contractor_id').val();

    if (contractor_id !== undefined || contractor_id !== '') {

        $('#banks-contractor_id').val(contractor_id);
        var form = $(this);
        var data = form.serializeArray();
        data.push({name:"Banks[contractor_id]", value:contractor_id});
alert(JSON.stringify(contractor_id));
        if (form.find('.has-error').length) {
            event.stopPropagation();
            return false;
        }
        else {

            $.ajax({
                'url': form.attr('action'),
                'type': 'POST',
                // 'data': form.serialize(),
                'data': data,
                'cache': false,
                success: function (data) {
                    var n = Noty('id');
                    $.noty.setText(n.options.id, data.notify_text);
                    $.noty.setType(n.options.id, 'information');

                },

                error: function (response) {
                    var n = Noty('id2');
                    $.noty.setText(n.options.id, JSON.stringify(response));
                    $.noty.setType(n.options.id, 'error');

                }
            });
        }
    }
    else {
        var n = Noty('id2');
        $.noty.setText(n.options.id, 'контрагент не сохранен или не указан');
        $.noty.setType(n.options.id, 'error');
    }

    return false;

});


