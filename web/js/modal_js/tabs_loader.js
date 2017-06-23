/**
 * Created by Andrew on 13.01.2016.
 */

$(document).ready(function () {

    // Загружаем данные по текущему договору в зависимости от нажатия на вкладку. Тоесть, при нажатии на вкладку выбираем из
// сводных таблиц данные и выводим пользователю.


    $('body').on('click', '#tabs li a.jsloader ', function () {
        var href_controller = $(this).attr('href').replace('#', '');
        var contractor_id = jQuery('#contractor-contractor_id').val();

        if (contractor_id == undefined || contractor_id == null || contractor_id =='') {
            var n = Noty('id');
            $.noty.setText(n.options.id, "Вы не заполнили и не сохранили данные контраента !");
            $.noty.setType(n.options.id, 'error');

            return false;
        }
        alert(contractor_id);
        var url = '/' + href_controller + '/' + 'infobycontractor' + '/' + contractor_id;
        jQuery.get(url, function (r) {
            jQuery('#' + href_controller + '-body').html(r);
        });

    });

});