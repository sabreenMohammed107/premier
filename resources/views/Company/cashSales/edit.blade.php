@extends('Layout.company')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> {{ __('titles.receipts') }}<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> {{ __('titles.company') }}</span>
    </li>

</ul>

@endsection

@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
        <form action="{{url("/Cash/Sales/$Cash->id/Update")}}" method="post">
            {{ csrf_field() }}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mg-b-15">
                    <a href="{{url('/Cash/Sales')}}" class="btn btn-warning">{{ __('titles.cancel') }}</a>
                    <button class="btn btn-primary waves-effect waves-light"> {{ __('titles.save') }}</button>
                </div>
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd dir-rtl">
                        <h1 class="dir-rtl">{{ __('titles.receipts') }}</h1>
                        <h3>{{$Company->company_official_name}} {{__('titles.supp_stock')}}</h3>                            <br />
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright" >
                            <div class="form-group-inner" style="margin-right:10px;">
                                <div class="row row-ltr" >
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 shadow">
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                <input name="cash_date" type="date" class="form-control" value="{{date('Y-m-d', strtotime($Cash->cash_date))}}" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.date')}}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="hidden" id="vat" class="form-control" value="{{$VAT->item_value}}" placeholder="">
                                                <input type="hidden" id="cit" class="form-control" value="{{$CIT_Items->item_value}}" placeholder="">
                                                <input name="id" type="hidden" value="{{$Cash->id}}">
                                                <input name="cash_receipt_note" type="number" value="{{$Cash->cash_receipt_note}}" class="form-control" placeholder="" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.permission_no')}}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input name="statement" value="{{$Cash->statement}}" type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.declaration')}}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <input type="number" class="form-control" placeholder="120100" readonly>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.current_balance')}}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <input value="{{$Cash->cash_amount}}" name="cash_amount" type="number" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.amount')}}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">

                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <input type="text"
                                                @if($Person->person_type_id != 0)
                                                disabled style="display: none;"
                                                @endif
                                            name="person_name" id="other_text" value="{{$Cash->person_name}}" class="form-control"  placeholder="">
                                                <select data-width="100%"
                                                @if ($Person->person_type_id == 0)
                                                disabled style="display: none;"
                                                @endif
                                                name="person_id" class="selectpicker" data-live-search="true" tabindex="-1">
                                                    <option value="">Select</option>
                                                    @foreach ($Persons as $CustomPerson)
                                                        <option
                                                        @if ($Person->id == $CustomPerson->id)
                                                        selected="selected"
                                                        @endif
                                                        value="{{$CustomPerson->id}}">{{$CustomPerson->person_name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <div class="bt-df-checkbox"style="margin-right:-10px;">
                                                    <input class="radio-checked" type="radio"
                                                    @if ($Person->person_type_id == 101)
                                                        checked="checked"
                                                    @endif
                                                    value="101" id="outgoing_type_id" name="person_type">
                                                    <label><b> {{__('titles.suppliers')}}  </b></label>
                                                    <input class="" type="radio"
                                                    @if ($Person->person_type_id == 102)
                                                        checked="checked"
                                                    @endif
                                                    value="102" id="optionsRadios2" name="person_type">
                                                    <label><b> {{__('titles.employees')}}  </b></label>
                                                    <input class="" type="radio"
                                                    @if ($Person->person_type_id == 100)
                                                        checked="checked"
                                                    @endif
                                                    value="100" id="optionsRadios3" name="person_type">
                                                    <label><b> {{__('titles.clients')}}  </b></label>
                                                    <input class="" type="radio"
                                                    @if ($Person->person_type_id == 0)
                                                        checked="checked"
                                                    @endif
                                                    value="" id="optionsRadios4" name="person_type">
                                                    <label><b>  {{__('titles.other')}}  </b></label>
                                                </div>
                                            </div>
                                        </div>
<div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="bt-df-checkbox">
                                                    <input class="radio-checked" type="radio"
                                                    @if ($Cash->approved == 1)
                                                        checked="checked"
                                                    @endif
                                                    value="1" id="optionsRadios1" name="approved">
                                                    <label><b> {{__('titles.confirm')}}  </b></label>
                                                    <input class="" type="radio"
                                                    @if ($Cash->approved == 0)
                                                        checked="checked"
                                                    @endif
                                                    value="0" id="optionsRadios2" name="approved">
                                                    <label><b>{{__('titles.not_confirm')}}</b></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">{{__('titles.type')}}</label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                <textarea class="form-control" name="notes" placeholder="">{{$Cash->notes}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.notes')}}</b></label>
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
@if ($Person->person_type_id == 0)
<script>
    $('.selectpicker').selectpicker('destroy');
</script>
@endif
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
