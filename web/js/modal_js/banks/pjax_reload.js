/**
 * Created by Andrey on 12.07.2017.
 */



$('body').on('click','#pjax_button', function() {
   // $('#pjax_button').on('click', function (event) {
        event.stopPropagation();
        alert('cvbb');
        // $.pjax.defaults.timeout = 5000;//IMPORTANT
        // alert('ready');
        // $( "#refresh_grid" ).trigger( "click" );
        // event.stopPropagation();
// $( "body" ).data(); // { foo: 52, bar: { myType: "test", count: 40 }, baz: [ 1, 2, 3 ] }

        var grid_data = $('#contractor_banks_modal').data();

        // alert(JSON.stringify(grid_data));
        // $.pjax.reload({container:'#contractor-banks-grid', replaceRedirect:false, replace:true});
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
      //  $("#pjax_button").off();
        return false;


    });



