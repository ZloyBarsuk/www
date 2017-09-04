/**
 * Created by ZloyBarsuk on 30.06.2017.
 */

// add controller
$('body').on('beforeSubmit', 'form#dogovor-form', function (event) {
    event.stopPropagation();
    var form = $(this);
    //  alert("pjax_add_product");
    // return false if form still have some validation errors
    if (form.find('.has-error').length) {
        event.stopPropagation();
        return false;
    }
    else {
        // submit form
        $.ajax({
            'url': form.attr('action'),
            'type': 'POST',
            'data': form.serialize(),
            'cache': false,
            success: function (data) {
                if (data === Object(data)) {
                    // Если success значит валидация не прошла
                    if (data.notify == 0) {
                       
                        var n = Noty('id');
                        $.noty.setText(n.options.id, response.responseText);
                        $.noty.setType(n.options.id, 'error');
                    } else {
                        if (data.notify == 1) {

                            $('#dogovor-dogovor_id').val(data.dogovor_id);
                            alert(data.dogovor_id);
                            var n = Noty('id');
                            $.noty.setText(n.options.id, data.notify_text);
                            $.noty.setType(n.options.id, 'information');
                            $.pjax.reload({container: '#dogovors-grid', timeout: 3000});
                            //  $.pjax.reload({container: '#pjax_products', timeout: 2000});
                        }
                        else {
                            var n = Noty('id');
                            $.noty.setText(n.options.id, response.responseText);
                            $.noty.setType(n.options.id, 'error');
                        }
                    }
                    //  event.stopPropagation();
                    return false;
                }
            },
            error: function (data) {
                console.log(JSON.stringify(data));
                var n = Noty('id');
                $.noty.setText(n.options.id, response.responseText);
                $.noty.setType(n.options.id, 'error');
            }
        });
    }
    return false;
});



