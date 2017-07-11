

$('body').on('click','#modalButtonBanks',function (event) {


        var modal = $('#modal-inner');
        var href = $(this).attr('value');
        var modal_content = modal.find('#modalInnerContent');
        modal_content.html('');

        $.post(href, function (data) {
            modal_content.html(data);
            modal.modal('show');
        }).fail(function (data) {
            var n = Noty('id');
            $.noty.setText(n.options.id, data.responseText);
            $.noty.setType(n.options.id, 'error');
            return false;
        })

        modal.on('hidden.bs.modal', function (event) {
        //    $.pjax.reload({container: '#pjax_banks'});
            modal_content.html('');


            // alert("pjax_add_product");
           //  $.pjax.reload({container: '#pjax_banks', timeout: 5000});
          //  $.pjax.reload('#pjax_banks' , { url:'/contractor/bankslist/67',timeout : 3000,type:'POST',push:false,replaceRedirect:true,pushRedirect:false,dataType:'html'});
            // $('#pjax_banks').yiiGridView({"methos": "POST"});
          //  $('#pjax_banks').yiiGridView({"filterUrl": "\/banks/bankslist/67"});
           // jQuery('#pjax_banks').yiiGridView('applyFilter');
         //   $('.grid-view').yiiGridView('applyFilter');
                 return false;

        });
        return false;

    });




