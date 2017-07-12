/**
 * Created by ZloyBarsuk on 26.06.2017.
 */


$('body').on('beforeSubmit', 'form#template-form', function (event) {

    event.stopPropagation();
    //  var contractor_id = $('#contractor-contractor_id').val();

    //  if (contractor_id !== undefined || contractor_id !== '') {

    //  $('#banks-contractor_id').val(contractor_id);
    var form = $(this);
    //    var data = form.serializeArray();
    //   data.push({name: "Banks[contractor_id]", value: contractor_id});
    // alert(JSON.stringify(contractor_id));
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
                $.pjax.reload({container: '#pjax_templates', timeout: 3000});
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


