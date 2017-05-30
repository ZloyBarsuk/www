// $(document).on('ready', function () {

// $( "form" ).off( ".validator" );
// alert('ready');

$('body #create_test_modal').on('click', function (e) {


    var modal = $('#modal-test');
    var href = $(this).attr('value');
    var modal_content = modal.find('#modalContent2');
    modal_content.html('modal-test /// fsdfdfdsfdsfsdfdsfdsfsdfddsfsdfsd');

    var index_highest2 = 0;
    modal.each(function () {
        // always use a radix when using parseInt
        var index_current = parseInt($(this).css("zIndex"), 10);
        if (index_current > index_highest2) {
            index_highest2 = index_current;
        }
    });

    modal.modal('show');
    alert(index_highest2);

    // prevent closing outer modals
    modal.on('click.dismiss.bs.modal', '[data-dismiss="modal"]', function (e) {
        e.stopPropagation();
    });




});


// })

