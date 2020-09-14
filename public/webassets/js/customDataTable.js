
$(function() {
    debugger;
    $('#puchasetable').bootstrapTable();
    var focus = $('#puchasetable > tbody  > tr').length;
    $('#puchasetable #optionsRadios').focus();
    $('.no-records-found').remove();
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
            debugger;
            rows.push(data);
            ++rowCount;
            var trs = $('#puchasetable > tbody').html();
            console.log(trs);
            $('#puchasetable').bootstrapTable('destroy');
            $('.no-records-found').remove();
            $('#rows').html(trs);
            $('#rows').append(data);
            // $('.chosen-select').select2();
            $('#puchasetable').bootstrapTable();
            $('#puchasetable #optionsRadios'+rowCount).focus();
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
            $('#puchasetable').bootstrapTable('destroy');
            rows.push(data);
            ++rowCount;
            $('.no-records-found').remove();

            $('#rows').prepend(data)
            $('#puchasetable #optionsRadios'+rowCount).focus();
            $('.chosen-select').select2();
            $('#puchasetable').bootstrapTable();
    },
    error: function (request, status, error) {
        console.log(request.responseText);
    }
    });
}
