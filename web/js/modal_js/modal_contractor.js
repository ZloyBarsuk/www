$(document).on('ready', function () {

    // $( "form" ).off( ".validator" );


    $('body  #modalButtonContractor').click(function () {

        var modal = $('#modal-contractor');

        // проверка работы универсального модалки нахуй
        // var modal = $('#modal-universal');

        var href = $(this).attr('value');
        var modal_content = modal.find('#modalContentContractor');
        modal_content.html('');

        var index_highest = 0;
        modal.each(function () {
            // always use a radix when using parseInt
            var index_current = parseInt($(this).css("zIndex"), 1);
            if (index_current > index_highest) {
                index_highest = index_current;
            }
        });
        // alert(href);


        $.post(href).done(function (data) {
            modal_content.html(data);
            modal.modal('show');

        });

        modal.on('hidden.bs.modal', function (event) {
            $.pjax.reload({container: '#pjax_contractor'});
            modal_content.html('');
            return false;
            /* $('#pjax_add_product').on('pjax:end', function () {
             alert("pjax_add_product");
             $.pjax.reload({container: '#pjax_products', timeout: 5000});
             });*/
        });


    });
    // добавление контрагента бяльт

    $('body').on('beforeSubmit', 'form#contractor-form', function (event) {
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
                            //Выводим ошибки валидации
                            /* $.each(data.validate, function(key, val) {
                             $("#example-form").yiiActiveForm("updateAttribute", key, "");
                             $("#example-form").yiiActiveForm("updateAttribute", key, [val]);
                             });*/

                            notification('danger', data);

                        } else {
                            if (data.notify == 1) {
                                notification('success', data);
                                $('#contractor-contractor_id').val(data.contractor_id);

                                $.pjax.reload({container: '#pjax_contractor', timeout: 3000});

                                //  $.pjax.reload({container: '#pjax_products', timeout: 2000});

                            }
                            else {
                                notification('danger', data);
                            }


                        }
                        //  event.stopPropagation();
                        return false;
                    }
                },

                error: function (response) {

                    console.log(JSON.stringify(response));
                    notification('danger', response)
                    // do something with response
                }
            });
        }


        return false;
    });
    // обновление контрагента и его инфы  блядь
    $('body').on('click', 'td>a.update_contractor', function (event) {

        event.stopPropagation();
        var href = $(this).attr('href');
        var data_id = $(this).attr('data-model-id');

        var modal = $('#modal-contractor');

        var modal_content = modal.find('#modalContentContractor');
        modal_content.html('');
        $.post(href).done(function (data) {

            if (data.notify == 1) {
                notification('success', data);

                $.pjax.reload({container: '#pjax_contractor', timeout: 3000});

                //  $.pjax.reload({container: '#pjax_products', timeout: 2000});

            }
            else {
                notification('danger', data);
            }


            modal_content.html(data);
            modal.modal('show');

        });


        return false;
    });


    // удаление товара

    $('body').on('click', 'td>a.delete_contractor', function (event) {
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
                            //   alert(JSON.stringify(data));

                            notyfy_alert(data);

                        } else {
                            if (data.notify == 1) {
                                notyfy_alert(data);
                                //   alert(JSON.stringify(data));

                                var n = Noty('id');
                                $.noty.setText(n.options.id, data.notify_text);
                                $.noty.setType(n.options.id, 'information');

                                $.pjax.reload({container: '#pjax_contractor', timeout: 2000});

                                //  $.pjax.reload({container: '#pjax_products', timeout: 2000});

                            }
                            else {
                                notyfy_alert(data);
                            }


                        }
                        //  event.stopPropagation();
                        return false;
                    }
                },

                error: function (data) {

                    console.log(JSON.stringify(data));
                    notyfy_alert(data);
                    // do something with response
                }
            });

            return false;
        }
        else {
            return false;
        }


    });
    function notification(flag, response) {
        var notify = $('#' + flag + '_notify').css('display', 'inline-block');
        notify.find('.' + flag + '_notify_content').text(response.notify_text);
        notify.toggle(6000);


    }


    function notyfy_alert(response) {
        // alert(JSON.stringify(response));
        var notify = $('#noty_' + response.flag);
        var notify_text = notify.find('.noty_text');
        notify_text.text('');
        notify_text.text(response.notify_text);
        notify.css('display', 'inline-block');
        notify.toggle(7000);

        $.pjax.reload({container: '#pjax_contractor', timeout: 2000});
        return false;
    }

    return false;


})

