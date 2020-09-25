
$(function() {
    debugger;
    $('#puchasetable').bootstrapTable();
    var focus = $('#puchasetable > tbody  > tr').length;
    $('#puchasetable #optionsRadios').focus();
    $('.no-records-found').remove();
  })
  $(document).ready(function(){
    $("#search").on("keyup", function() {
        debugger;
      var value = $(this).val().toLowerCase();
      $("#puchasetable > tbody  > tr").filter(function() {
        var row_num =  $(this).attr('data-id');
        $(this).toggle($('#item_val'+row_num).text().toLowerCase().indexOf(value) > -1 ||
        $('input[type=number]').val().toLowerCase().indexOf(value) > -1 ||
        ($(this).children('.total_item_price').text()).toLowerCase().indexOf(value) > -1 ||
        ($(this).children('.total_after_discounts').text()).toLowerCase().indexOf(value) > -1 ||
        ($(this).children('.vat_tax_value').text()).toLowerCase().indexOf(value) > -1 ||
        ($(this).children('.comm_industr_tax').text()).toLowerCase().indexOf(value) > -1 ||
        ($(this).find('.net_value').text()).toLowerCase().indexOf(value) > -1);
      });
    });
  });
var table = $('#puchasetable')
function ajax_row(url) {
    $('#add').attr('disabled','disabled');
    setTimeout(function(){ $('#add').attr('disabled',false); }, 1000);
    var rowCount = 0;
    function getLastNum(rowCount) {
        $('#puchasetable > tbody  > tr').each(function(index) {
            debugger;
            // var isLastElement = index == $('#puchasetable > tbody  > tr').length -1;
            if (index == ($('#puchasetable > tbody  > tr').length - 1)) {
                rowCount =  $(this).attr('data-id');
            }

        });
        return ++rowCount;
    }

    // var rowCount = $('#puchasetable tbody tr').length;
    var rows = [];
    $.ajax({
            type:'GET',
            url:url,
            data:{
                rowCount:getLastNum(rowCount),
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
            $('#puchasetable > tbody  > tr').each(function(index) {
                var x =  $(this).attr('data-id');
                if (index == ($('#puchasetable > tbody  > tr').length - 1)) {
                    $('#select' + x).select2();
                }
            });
            $('#puchasetable').bootstrapTable();

            // alert($('#puchasetable > tbody  > tr').length);
            debugger;
            $('#puchasetable > tbody  > tr').each(function(index) {
                debugger;
                // var isLastElement = index == $('#puchasetable > tbody  > tr').length -1;
                var x =  $(this).attr('data-id');

                if ($('#select' + x).hasClass("select2-offscreen")) {
                    // Select2 has been initialized
                    $('#s2id_select' + x).remove();
                    var _select = '#select' + x;
                    $(_select).select2();
                }
                else{
                    $('#select' + x).select2();
                }
                if($('input[type=radio][name=optionsRadios'+x+']:checked').val() == 'no'){
                    var design_select = $('#s2id_select'+x);
                    $(design_select).css('display','none').attr('disabled','disabled');
                }
                $('#s2id_select' + x +' .select2-focusser').removeAttr('tabindex');
                if (index == ($('#puchasetable > tbody  > tr').length - 1)) {
                    var row_num = $(this).attr('data-id');
                    $('#hashed'+row_num).text(index + 1);
                    $("#optionsRadios"+x+"sec").focus();
                }
            });


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
