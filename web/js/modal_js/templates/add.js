/**
 * Created by ZloyBarsuk on 30.06.2017.
 */
$(document).on('ready', function () {

    $('#modalButtonProducts').click(function () {
        var modal = $('#modal-products');
        var href = $(this).attr('value');
        var modal_content = modal.find('#modalContent');
        modal_content.html('');

        $.post(href, function (response) {
            modal_content.html(response);
            modal.modal('show');
        }).fail(function (response) {
            var n = Noty('id');
            $.noty.setText(n.options.id, response.responseText);
            $.noty.setType(n.options.id, 'error');

        })

        modal.on('hidden.bs.modal', function (event) {
            $.pjax.reload({container: '#pjax_templates'});
            modal_content.html('');
            return false;
            /* $('#pjax_add_product').on('pjax:end', function () {
             alert("pjax_add_product");
             $.pjax.reload({container: '#pjax_products', timeout: 5000});
             });*/
        });


    });
});
