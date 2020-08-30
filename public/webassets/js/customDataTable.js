
$(function() {
    $('#puchasetable').bootstrapTable()
    $('.no-records-found').remove();
    $('.chosen-select').select2();
  })

var table = $('#puchasetable')



function ajax_row(url) {
    var rowCount = $('#puchasetable tbody tr').length;
    var rows = [];
    $.ajax({
            type:'GET',
            url:url,
            data:{
                rowCount:rowCount + 1,
                compid : $('#compid').val()
    },
        success:function(data) {
            rows.push(data);
            ++rowCount;
            $('.no-records-found').remove();

            $('#rows').prepend(data)
            $('#puchasetable #optionsRadios'+rowCount).focus();
            $('.chosen-select').select2();
            // addcustomrow();
    },
    error: function (request, status, error) {
        console.log(request.responseText);
    }
    });
}
function fetch_items(url) {
    var rowCount = $('#puchasetable tbody tr').length;
    var rows = [];
    var inv_id = $('#inv_id').val();
    $.ajax({
            type:'GET',
            url:url,
            data:{
                inv_id :inv_id,
                compid : $('#compid').val()
    },
        success:function(data) {
            rows.push(data);
            ++rowCount;
            $('.no-records-found').remove();

            $('#rows').prepend(data)
            $('#puchasetable #optionsRadios'+rowCount).focus();
            $('.chosen-select').select2();
    },
    error: function (request, status, error) {
        console.log(request.responseText);
    }
    });
}
