$(document).on('ready', function () {


    // $( "form" ).off( ".validator" );


    $('#modalButton').click(function () {


        var modal = $('#modal-products');
        var href = $(this).attr('value');
        var modal_content = modal.find('#modalContent');
        modal_content.html('');


        $.post(href).done(function (data) {
            modal_content.html(data);
            modal.modal('show');

        });

        modal.on('hidden.bs.modal', function (event) {
            $.pjax.reload({container: '#pjax_products'});
            modal_content.html('');
            return false;
            /* $('#pjax_add_product').on('pjax:end', function () {
             alert("pjax_add_product");
             $.pjax.reload({container: '#pjax_products', timeout: 5000});
             });*/
        });


    });
    // обработка формы товара

    $('body').on('beforeSubmit', 'form#products-form', function (event) {
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

                                $.pjax.reload({container: '#pjax_products', timeout: 3000});

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

    // обновление твоара блядь
    $('body').on('click', 'td>a.update_poducts', function (event) {
        alert('form#products-form');
        event.stopPropagation();
        var href = $(this).attr('href');
        var data_id = $(this).attr('data-model-id');

        var modal = $('#modal-products');

        var modal_content = modal.find('#modalContent');
        modal_content.html('');
        $.post(href).done(function (data) {

            if (data.notify == 1) {
                notification('success', data);

                $.pjax.reload({container: '#pjax_products', timeout: 3000});

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

    $('body').on('click', 'td>a.delete_poducts', function (event) {

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

                        notyfy_alert(data);

                    } else {
                        if (data.notify == 1) {
                            notyfy_alert(data);

                            $.pjax.reload({container: '#pjax_products', timeout: 3000});

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


    });
    function notification(flag, response) {
        var notify = $('#' + flag + '_notify').css('display', 'inline-block');
        notify.find('.' + flag + '_notify_content').text(response.notify_text);
        notify.toggle(6000);


    }


    function notyfy_alert(response) {
        alert(JSON.stringify(response));
        var notify = $('#noty_'+response.flag);
        var notify_text=notify.find('.noty_text');
        notify_text.text('');
        notify_text.text(response.notify_text);
        notify.css('display', 'inline-block');
        notify.toggle(7000);

        $.pjax.reload({container: '#pjax_products', timeout: 3000});
        return false;
    }

    return false;




})

