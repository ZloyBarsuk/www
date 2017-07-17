/**
 * Created by ZloyBarsuk on 30.06.2017.
 */
$(document).on('ready', function () {

// обновление контрагента и его инфы
    $('body').on('click', 'td > a.update_contractor', function (event) {
        event.stopPropagation();
        alert('td > a.update_contractor');

        var href = $(this).attr('href');
        var data = $(this).data();
        var modal = $('#modal-main');
        var modal_content = modal.find('#modalMainContent');
        modal_content.html('');
        $.get(href,{contractor_id:data.contr_id} , function (data) {
            modal_content.html(data);
            modal.modal('show');
        }).fail(function (data) {
            var n = Noty('id');
            $.noty.setText(n.options.id, data.responseText);
            $.noty.setType(n.options.id, 'error');
            $.pjax.reload({container: '#contractors_grid', timeout: 3000});

        })
        return false;

    });

    // показать список банков контрагента
    $('body').on('click', 'td > a.banks_by_contractor', function (event) {
        event.stopPropagation();
        var href = $(this).attr('href');
        var data = $(this).data();
        var modal = $('#modal-main');
        var modal_content = modal.find('#modalMainContent');
        modal_content.html('');
        // alert(JSON.stringify(data));
        //return false;
        $.get(href, {contractor_id: data.contr_id}, function (data) {
            modal_content.html(data);
            modal.modal('show');
        }).fail(function (data) {
            var n = Noty('id');
            $.noty.setText(n.options.id, data.responseText);
            $.noty.setType(n.options.id, 'error');

        });


        modal.on('hidden.bs.modal', function (event) {
            modal_content.html('');
            $.pjax.reload({container: '#contractors_grid', timeout: 3000});

            return false;

        });


        return false;

    });


});

