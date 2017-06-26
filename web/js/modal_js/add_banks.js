/**
 * Created by ZloyBarsuk on 26.06.2017.
 */
/**
 * Created by Andrew on 13.01.2016.
 */




    $('body').on('beforeSubmit', 'form#bank-select-form', function (event) {

        event.stopPropagation();


/*
            $.ajax({
                'url': form.attr('action'),
                'type': 'POST',
                'data': form.serialize(),
                'cache': false,
                success: function (data) {


                },

                error: function (response) {


                }
            });*/


        return false;

    });


