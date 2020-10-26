@extends('Layout.company')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> الشركات<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> إضافة مقبوضات </span>
    </li>
</ul>

@endsection

@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <form action="{{url('/Cash/Sales/Create')}}" method="post">
                {{ csrf_field() }}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mg-b-15">
                    <a href="{{url('/Cash/Sales')}}" class="btn btn-warning">إلغــــاء</a>
                    <button class="btn btn-primary waves-effect waves-light">حــفـــظ</button>
                </div>
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h4 style="text-align:right">بيان المقبوضات</h4>
                            <h3 style="text-align:right">{{$Company->company_official_name}}</h3><br />
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright" style="direction:rtl">
                            <div class="form-group-inner" style="margin-right:10px;">
                                <div class="row" style="text-align:right !important;direction:rtl !important">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 shadow">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input name="cash_date" type="date" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>التاريخ</b></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input disabled name="" value="{{$Code}}" type="number" class="form-control" placeholder="">
                                                    <input name="cash_receipt_note" type="hidden" value="{{$Code}}">
                                                    <input name="cash_master_type" type="hidden" value="1">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>اذن الاستلام</b></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input name="statement" type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>البيان</b></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <input type="text" class="form-control" placeholder="{{$SafeCurrentBalance->current}}جم" readonly>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>رصيدالخزينه الحالى</b></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <input name="cash_amount" type="number" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>المبلغ</b></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" id="type">
                                                <input type="text" disabled name="person_name" id="other_text" class="form-control" style="display: none;" placeholder="">
                                                <select data-width="100%" name="person_id" class="selectpicker" data-live-search="true" tabindex="-1">
                                                    <option value="" disabled selected>أختر</option>
                                                    @foreach ($Clients as $Client)
                                                        <option value="{{$Client->id}}">{{$Client->person_name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <div class="bt-df-checkbox"style="margin-right:-10px;">
                                                    <input class="radio-checked" type="radio" value="100" checked="" id="optionsRadios3" name="person_type">
                                                    <label><b> عملاء </b></label>
                                                    <input class="" type="radio" value="101" id="outgoing_type_id" name="person_type">
                                                    <label><b> موردين </b></label>
                                                    <input class="" type="radio" value="102" id="optionsRadios2" name="person_type">
                                                    <label><b> موظفين </b></label>
                                                    <input class="" type="radio" value="" id="optionsRadios4" name="person_type">
                                                    <label><b> أخري </b></label>
                                                </div>
                                            </div>
                                        </div>
<div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="bt-df-checkbox">
                                                    <input class="radio-checked" type="radio" checked="" value="1" id="optionsRadios1" name="approved">
                                                    <label><b> معتمد </b></label>
                                                    <input class="" type="radio" value="0" id="optionsRadios2" name="approved">
                                                    <label><b> غير معتمد </b></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">النوع</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <textarea name="notes" class="form-control" placeholder=""></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>ملاحظات</b></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

<style>
    .dropzone.dz-clickable .dz-message {
        display: none;
    }
</style>

@endsection

@section('modal')
<!--Modal-->

        <!--/Modal-->

        @endsection
@section('scripts')
    <script>
        // $('select.selectpicker').change(function() {
        //     alert($('.selectpicker').val());
        // })
        $('input[name=person_type]').change(function() {
            // alert($('input[name=person_type]:checked').val());
            if($('input[name=person_type]:checked').val() == 100){
                fetchPersons("{{url('/Cash/Sales/Fetch/Persons/Clients')}}","{{session('company_id')}}");
            }else if($('input[name=person_type]:checked').val() == 101){
                fetchPersons("{{url('/Cash/Sales/Fetch/Persons/Suppliers')}}","{{session('company_id')}}");
            }else if($('input[name=person_type]:checked').val() == 102){
                fetchPersons("{{url('/Cash/Sales/Fetch/Persons/Employees')}}","{{session('company_id')}}");
            }else{
                $('.dropdown.bootstrap-select.bs3').css({'display':'none'});
                $('.selectpicker').attr('disabled','disabled');
                //fetchPersons("{{url('/Cash/Sales/Others')}}","{{session('company_id')}}");
                $('#other_text').css({'display':'block'}).attr('disabled',false);
            }
        })
        function fetchPersons(url, compid) {
            $.ajax({
                type:'GET',
                url:url,
                data:{
                    compid : compid
                },
                    success:function(data) {
                        $('#other_text').css({'display':'none'}).attr('disabled','disabled');
                        $('.dropdown.bootstrap-select.bs3').css({'display':'block'});
                        $('.selectpicker').attr('disabled',false);
                        $('.selectpicker').html(data);
                        $('.selectpicker').selectpicker('refresh');
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
                }
                });
        }
    </script>
@endsection
