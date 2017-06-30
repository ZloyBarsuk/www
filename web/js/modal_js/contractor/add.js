$(document).on('ready', function () {

    // index.php

    $('body  #modalButtonContractor').click(function () {

        var modal = $('#modal-contractor');
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

})

