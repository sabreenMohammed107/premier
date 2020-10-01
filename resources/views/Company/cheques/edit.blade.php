@extends('Layout.company')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> الشركات<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> تعديل الشيكات </span>
    </li>
</ul>

@endsection

@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
        <form action="{{url('/Cheques/Update')}}" method="post">
            {{ csrf_field() }}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mg-b-15">
                    <a href="{{url('/Cheques')}}" class="btn btn-warning">إلغــــاء</a>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">حــفـــظ التعديلات</button>
                </div>
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h4 style="text-align:right">بيان الشيكات</h4>
                            <h3 style="text-align:right">شركة : {{$Company->company_official_name}}</h3><br />
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
                                                <div class="bt-df-checkbox">
                                                    <input class="radio-checked" type="radio"
                                                    @if ($Person->person_type_id != 0)
                                                        checked="checked"
                                                    @endif
                                                    value="person" disabled id="optionsRadios1" name="optionsRadios0">
                                                    <label><b> شخص </b></label>
                                                    <input class=""
                                                    @if ($Person->person_type_id == 0)
                                                        checked="checked"
                                                    @endif
                                                    type="radio" disabled value="safe" id="optionsRadios2" name="optionsRadios0">
                                                    <label><b> الخزينة </b></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">شيك موجه إالي</label>
                                            </div>
                                        </div>
                                        <div class="row" id="forperson"
                                        @if ($Person->person_type_id == 0)
                                                        style="display:none;"
                                        @endif
                                        >
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <select disabled data-width="100%" name="person_id" class="selectpicker" data-live-search="true" tabindex="-1">
                                                    <option value="">أختر</option>
                                                    @foreach ($Persons as $customPerson)
                                                        <option
                                                        @if ($Person->id == $customPerson->id)
                                                        selected="selected"
                                                        @endif
                                                        value="{{$customPerson->id}}">{{$customPerson->person_name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <div class="bt-df-checkbox" style="margin-right:-10px;">
                                                    <input class="radio-checked" type="radio"
                                                    @if ($Person->person_type_id == 101)
                                                        checked="checked"
                                                    @endif
                                                    value="101" disabled id="optionsRadios1" name="person_type">
                                                    <label><b> موردين </b></label>
                                                    <input class="" type="radio" value="102" disabled
                                                    @if ($Person->person_type_id == 102)
                                                        checked="checked"
                                                    @endif
                                                    id="optionsRadios2" name="person_type">
                                                    <label><b> موظفين </b></label>
                                                    <input class="" type="radio" value="100" disabled
                                                    @if ($Person->person_type_id == 100)
                                                        checked="checked"
                                                    @endif
                                                    id="optionsRadios3" name="person_type">
                                                    <label><b> عملاء </b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="date" name="transaction_date" value="{{date('Y-m-d', strtotime($Cheque->transaction_date))}}" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>التاريخ</b></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="number" disabled disabled class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2" id="forwhomtext"><b>دائن + / مدين  - </b></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    @php
                                                        $Bank = $Company->bank;
                                                    @endphp
                                                    <input type="text" disabled value="{{$Bank->bank_name}}" name="" id="bank_name_fake" class="form-control bank" placeholder="">
                                                    <input type="hidden" value="{{$Bank->bank_name}}" name="bank_name" id="bank_name" class="form-control bank" placeholder="">
                                                    <input type="hidden" value="{{$Bank->id}}" name="bank_id" id="bank_id" class="form-control bank" placeholder="">
                                                    <input type="hidden" value="{{$Cheque->id}}" name="id" id="id" class="form-control bank" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <div class="bt-df-checkbox" style="margin-right:-10px;">
                                                    <input class="radio-checked" type="radio" disabled checked="" value="current" id="optionsRadios1" name="optionsRadios2">
                                                    <label><b> بنك </b></label>
                                                    <input class="" type="radio" value="other" disabled id="optionsRadios2" name="optionsRadios2">
                                                    <label><b> أخري </b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                        <div class="input-mark-inner mg-b-22">
                                                            <input type="text" disabled class="form-control" value="{{$Cheque->cheque_serial}}" placeholder="">
                                                        <input type="hidden" name="cheque_serial" class="form-control" value="{{$Cheque->cheque_serial}}" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                        <label class="login2"><b>مسلسل الشيك</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <div class="bt-df-checkbox" style="margin-right:-10px;">
                                                    <input class="radio-checked" type="radio"
                                                    @if ($Cheque->trans_type == 0)
                                                        checked="checked"
                                                    @endif
                                                    value="0" disabled id="optionsRadios1" name="trans_type">
                                                    <label><b> صرف شيك مشتريات </b></label>
                                                    <input class="" type="radio"
                                                    @if ($Cheque->trans_type == 1)
                                                        checked="checked"
                                                    @endif
                                                    value="1" disabled id="1aaa" name="trans_type">
                                                    <label><b> ايداع شيك مبيعات </b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                <input type="text" name="cheque_no" value="{{$Cheque->cheque_no}}" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>رقم الشيك</b></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                            <input type="number" disabled name="amount" value="{{$Cheque->amount}}" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>القيمة</b></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="date" disabled name="release_date" value="{{date('Y-m-d', strtotime($Cheque->release_date))}}" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>تاريخ الاصدار</b></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="date" disabled name="due_date" value="{{date('Y-m-d', strtotime($Cheque->due_date))}}" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>تاريخ الاستحقاق</b></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                <textarea class="form-control" name="notes" placeholder="">{{$Cheque->notes}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>البيان</b></label>
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
$('input[name=optionsRadios0]').change(function(){
    if(this.value == 'person'){
        $('.selectpicker').attr('disabled',false);
        $('#forperson').fadeIn();
        $('#forwhomtext').text('دائن + / مدين  - ');
    }else{
        $('.selectpicker').attr('disabled','disabled');
        $('#forperson').fadeOut();
        $('#forwhomtext').text('رصيد الخزينة الحالي');
    }
})
$('input[name=person_type]').change(function() {
                // alert($('input[name=person_type]:checked').val());
                if($('input[name=person_type]:checked').val() == 100){
                    fetchPersons("{{url('/Cash/Sales/Clients')}}","{{session('company_id')}}");
                }else if($('input[name=person_type]:checked').val() == 101){
                    fetchPersons("{{url('/Cash/Sales/Suppliers')}}","{{session('company_id')}}");
                }else if($('input[name=person_type]:checked').val() == 102){
                    fetchPersons("{{url('/Cash/Sales/Employees')}}","{{session('company_id')}}");
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
                            $('.selectpicker').html(data);
                            $('.selectpicker').selectpicker('refresh');
                    },
                    error: function (request, status, error) {
                        console.log(request.responseText);
                    }
                    });
            }

            $('input[name=optionsRadios2]').change(function(){
                debugger;
                if(this.value == 'current'){
                    $('#bank_name_fake').attr('disabled','disabled');
                    $('#bank_id').attr('disabled',false);
                    $('#bank_name_fake').val("{{$Bank->bank_name}}");
                    $('#bank_name').val("{{$Bank->bank_name}}");
                }else{
                    $('#bank_name_fake').attr('disabled',false);
                    $('#bank_id').attr('disabled','disabled');
                    $('#bank_name_fake').val('');
                    $('#bank_name').val('');
                }
            })

            $('#bank_name_fake').on('input',function(){
                var bank_name = $('#bank_name_fake').val();
                $('#bank_name').val(bank_name);
            })
</script>
@endsection
