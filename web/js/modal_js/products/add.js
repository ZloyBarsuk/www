/**
 * Created by ZloyBarsuk on 30.06.2017.
 */
$(document).on('ready', function () {

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
});
