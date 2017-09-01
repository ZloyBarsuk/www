/**
 * Created by ZloyBarsuk on 30.06.2017.
 */

    $('body').on('click', 'td>a.delete_templates', function (event) {
        var button_class= $(this).attr('class');
        alert(button_class);
        var grid_data = $('#contractor_templates_modal').data();

        if (confirm("Уверен, что хочешь удалить?")) {

            event.stopPropagation();
            var url = $(this).attr("href");
            $.ajax({
                'url': url,
                'type': 'POST',
                // 'data': form.serialize(),
                'cache': false,
                success: function (data) {
                    if (data === Object(data)) {
                        // Если success значит валидация не прошла
                        if (data.notify == 0) {
                            //Выводим ошибки валидации
                            /* $.each(data.validate, function(key, val) {
                             $("#example-form").yiiActiveForm("updateAttribute", key, "");
                             $("#example-form").yiiActiveForm("updateAttribute", key, [val]);
                             });*/
                            var n = Noty('id');
                            $.noty.setText(n.options.id, data.notify_text);
                            $.noty.setType(n.options.id, 'error');

                        } else {
                            if (data.notify == 1) {
                                var n = Noty('id');
                                $.noty.setText(n.options.id, data.notify_text);
                                $.noty.setType(n.options.id, 'information');
                                if (button_class == 'delete_templates') {
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
                                }
                                else {
                                    $.pjax.reload({container: '#contractor-templates-grid'});
                                }


                            }
                            else {
                                var n = Noty('id');
                                $.noty.setText(n.options.id, data.notify_text);
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
                    $.noty.setText(n.options.id, data.notify_text);
                    $.noty.setType(n.options.id, 'error');
                }
            });


            return false;
        }
        else {
            return false;
        }

    });


