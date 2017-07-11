/**
 * Created by ZloyBarsuk on 30.06.2017.
 */


// обновление контрагента и его инфы

// alert('ready');

$('body').on('click', '#pjax_button', function (event) {
    event.stopPropagation();
   // $.pjax.defaults.timeout = 5000;//IMPORTANT
   //  $.pjax.reload({container:'#test',timeout: false});


    $.pjax.reload({
        container: '#test', // '#test',
        push: true,
      //  url:'banks/bankslist/67',
        history: false,
        replaceRedirect: true,
        replace: true,
        type: 'POST',
        timeout: 5000
    });





});


$('body #modal-universal2').on('hidden.bs.modal', function (event) {

    //   event.stopPropagation();

    //  $.pjax.reload({container:'#pjax_banks', replaceRedirect:false, replace:false,type:'POST'});


// refresh the grid
    //  alert('dfdf');
    //  $('.grid-view').yiiGridView('applyFilter');
    //  alert($('.filters').serialize());
    //  $.pjax.reload({container: '#fuckddd', timeout: false});
    // $('.grid-view').yiiGridView('applyFilter');
    //  $.pjax.reload({container: '#pjax_banks', push: false, replaceRedirect: false ,type:'POST'});


    // $.pjax.reload({container: '#fuckddd', push: true, replaceRedirect: false ,type:'POST'});


//  $.pjax.defaults.timeout = false;       // For JS use case yor should manual override default timeout.
    //  $.pjax.reload({container: '#pjax_banks'});
    // $.pjax.reload({container: '#pjax_banks', async: false});
    //   $.pjax.reload('#pjax_banks', {timeout : 3000});


});
