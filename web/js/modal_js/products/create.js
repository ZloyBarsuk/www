/**
 * Created by ZloyBarsuk on 30.06.2017.
 */


    $('body').on('beforeSubmit', 'form#products-form', function (event)
    {
        event.stopPropagation();
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
                'cache': false,
                success: function (data) {

                    if (data === Object(data))
                    {

                        if (data.notify == 0)
                        {
                            //Выводим ошибки валидации
                            /* $.each(data.validate, function(key, val) {
                             $("#example-form").yiiActiveForm("updateAttribute", key, "");
                             $("#example-form").yiiActiveForm("updateAttribute", key, [val]);
                             });*/
                            var n = Noty('id');
                            $.noty.setText(n.options.id, data.notify_text);
                            $.noty.setType(n.options.id, 'error');
                        }
                        else
                            {
                            if (data.notify == 1)
                            {
                                var n = Noty('id');
                                $.noty.setText(n.options.id, data.notify_text);
                                $.noty.setType(n.options.id, 'information');
                                $.pjax.reload({container: '#pjax_products', timeout: 3000});
                                //  $.pjax.reload({container: '#pjax_products', timeout: 2000});
                                return false;
                            }
                            else
                                {
                                var n = Noty('id');
                                $.noty.setText(n.options.id, data.notify_text);
                                $.noty.setType(n.options.id, 'error');
                            }
                        }
                        return false;
                    }
                },
                error: function (data)
                {
                    console.log(JSON.stringify(data));
                    var n = Noty('id');
                    $.noty.setText(n.options.id, data.notify_text);
                    $.noty.setType(n.options.id, 'error');
                    // do something with response
                }
            });
        }
        return false;
    });
