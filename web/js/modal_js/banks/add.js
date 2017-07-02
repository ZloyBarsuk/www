$(document).on('ready', function () {

    // index.php


    $('#modalButtonBanks').click(function () {
        var modal = $('#modal-banks');
        var href = $(this).attr('value');
        var modal_content = modal.find('#modalContentBanks');
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


})

