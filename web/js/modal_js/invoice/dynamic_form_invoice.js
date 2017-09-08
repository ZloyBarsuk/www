jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-products").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
    kvListenEvent('select2:select','function() { console.log("sdgksdjjsdfsdjhfjsdhfjkhsdhfjk"); }');
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-products").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});



