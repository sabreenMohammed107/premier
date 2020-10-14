@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> الرئيسية<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> القيود الاليه</span>
    </li>
</ul>

@endsection

@section('content')
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mg-b-23">
                    <div class="">
                        <!-- <button class="btn btn-primary waves-effect waves-light" href="{{ route('month-balance') }}">رجــوع</button> -->
                        <!-- <button class="btn btn-primary waves-effect waves-light">حــفـظ</button> -->
                    </div>
                </div>
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 style="direction:rtl">القيود الاليه</h1><br />
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div class="form-group-inner" style="margin-right:10px;">
                                <form>
                                    <div class="row res-rtl" style="display: flex ;flex-direction: row-reverse ;">
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 mg-b-15" style="direction:rtl">
                                            <div class="row" style="margin-top:5px;">
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                    <select data-placeholder="Choose a Company..." name="company_id" id="company" class="chosen-select dynamic" tabindex="-1">
                                                        <option value=""> الشركة</option>
                                                        @foreach($companies as $company)
                                                        <option value="{{$company->id}}">{{$company->company_official_name}}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    <div class="input-mask-title">
                                                        <label><b style="font-size:20px">الشركة</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:5px;">
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                    <select data-placeholder="إختر السنه" name="year_id" id="year" class="chosen-select year" tabindex="-1">

                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    <div class="input-mask-title">
                                                        <label><b style="font-size:20px">السنوات</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:5px;">
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                <select data-placeholder="إختر الشهر" name="month_id" id="month" class="chosen-select month" tabindex="-1">

</select>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    <div class="input-mask-title">
                                                        <label><b style="font-size:20px">الشهور</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chosen-select-single mg-b-20">
                                        <button class="btn btn-primary waves-effect waves-light">إلغاء توجيه</button>
                                        <button class="btn btn-primary waves-effect waves-light">توجيه</button>
                                        <button class="btn btn-primary waves-effect waves-light">عرض</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Static Table End -->

@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        $('.dynamic').change(function() {

            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();


                $.ajax({
                    url: "{{route('dynamicRestricCompany.fetch')}}",
                    method: "get",
                    data: {
                        select: select,
                        value: value,

                    },
                    success: function(result) {

                        $('#year').html(result);
                        $("#year").addClass("chosen-select");
                        $("#year").trigger("chosen:updated");
                        $(select).trigger("chosen:updated");
                        $('#month').val('').trigger('chosen:updated');
                    }

                })
            }
        });


        $('.year').change(function() {

if ($(this).val() != '') {
    var select = $(this).attr("id");
    var value = $(this).val();
var company_id=$('#company option:selected').val();

    $.ajax({
        url: "{{route('dynamicRestricYear.fetch')}}",
        method: "get",
        data: {
            select: select,
            value: value,
            company_id:company_id,


        },
        success: function(result) {

            $('#month').html(result);
            $("#month").addClass("chosen-select");
            $("#month").trigger("chosen:updated");
            $(select).trigger("chosen:updated");


        }

    })
}
});
    });
</script>
@endsection