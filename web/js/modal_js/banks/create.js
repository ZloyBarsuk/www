/**
 * Created by ZloyBarsuk on 26.06.2017.
 */

$('body').on('beforeSubmit', 'form#banks-form', function (event) {
    event.stopPropagation();

  //  var contractor_id = $('#contractor-contractor_id').val();

  //  if (contractor_id !== undefined || contractor_id !== '') {

      //  $('#banks-contractor_id').val(contractor_id);
        var form = $(this);
    var grid_data = $('#contractor_banks_modal').data();

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
                success: function (data) {
                    var n = Noty('id');
                    $.noty.setText(n.options.id, data.notify_text);
                    $.noty.setType(n.options.id, 'information');


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



                  //  $.pjax.reload({container: '#test', timeout: 3000});


                   /* $("#test").on("pjax:complete", function(events) {
                        $(window).on('pjax:popstate', function() {
                            events.stopPropagation();
                            events.preventDefault();
                            return false;

                        });
                        $(window).on('pjax:popstate', function() {
                            events.stopPropagation();
                            events.preventDefault();
                            return false;

                        });
                        events.stopPropagation();
                        events.preventDefault();
                        return false;
                    });*/







                },

                error: function (response) {
                    // check error from RBAC and
                    var n = Noty('id');
                    $.noty.setText(n.options.id, response.responseText);
                    $.noty.setType(n.options.id, 'error');
                    return false;
                }
            });
        }
   // }
   /* else {
        var n = Noty('id');
        $.noty.setText(n.options.id, 'контрагент не сохранен или не указан');
        $.noty.setType(n.options.id, 'error');
    }*/
    event.preventDefault();
    return false;

});


