/**
 * Created by ZloyBarsuk on 30.06.2017.
 */





$('body').on('click', 'td>a.update_templates,td>a.update_templates_contractor', function (event) {


    event.stopPropagation();
    var button_class = $(this).attr('class');
    switch (button_class) {
        case 'update_templates_contractor':
            var modal = $('#modal-update');
            break;
        case 'update_templates':
            var modal = $('#modal-main');
            break;
        default:
            alert('Я таких значений не знаю! Проверь селектор в скрипте !');

    }
    var href = $(this).attr('href');
    //  var data_id = $(this).attr('data-model-id');
    var modal_content = modal.find('#modalContent');
    var grid_data = $('#contractor_templates_modal').data();
    modal_content.html('');

    /*  $.post(href).done(function (data) {
     modal_content.html(data);
     modal.modal('show');
     });*/
    $.get(href, function (response) {
        modal_content.html(response);
        modal.modal('show');

    }).fail(function (response) {
        var n = Noty('id');
        $.noty.setText(n.options.id, response.responseText);
        $.noty.setType(n.options.id, 'error');

        return false;
    })

    modal.on('hidden.bs.modal', function (event) {

        if (button_class == 'update_templates_contractor') {
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
        else if (button_class == 'update_templates') {
            $.pjax.reload({container: '#contractor-templates-grid'});
        }

        modal_content.html('');

        return false;
    });
    return false;


});

