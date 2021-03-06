@extends('Layout.company')



@section('crumb')

<ul class="breadcome-menu">
  
    @if(str_replace('_', '-', app()->getLocale())=='ar')
    <li>
        <a href="#"></a>  {{ __('titles.home') }} <span class="bread-slash"> / </span>
    </li>
    <li>
        <a href="#"></a> {{ __('titles.cash_payments') }}<span class="bread-slash"> / </span>
    </li>
	@else
   
    <li>
        <a href="#"></a> {{ __('titles.cash_payments') }}<span class="bread-slash"> / </span>
    </li>
    <li>
        <a href="#"></a>  {{ __('titles.home') }}
    </li>
   
	@endif
</ul>

@endsection

@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row ">
        <form action="{{url('/Cash/Purchasing/Create')}}" method="post">
            {{ csrf_field() }}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="mg-b-15">
                    <a href="{{url('/Cash/Purchasing')}}" class="btn btn-warning">{{ __('titles.cancel') }}</a>
                    <button class="btn btn-primary waves-effect waves-light">{{ __('titles.save') }}</button>
                </div>
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd dir-rtl">
                            <h4 >{{ __('titles.cash_payments') }}</h4>
                            <h3 >{{$Company->company_official_name}} {{__('titles.supp_stock')}}</h3><br />
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright dir-rtl" >
                            <div class="form-group-inner" style="margin-right:10px;">
                                <div class="row row-ltr" >
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 shadow">
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input name="cash_date" type="date" class="form-control" placeholder="">
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
                                                <input type="number" name="" value="{{$Code}}" class="form-control" placeholder="" readonly>
                                                <input name="exit_permission_code" type="hidden" value="{{$Code}}">
                                                <input name="cash_master_type" type="hidden" value="0">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.permission_no')}}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input name="statement" type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.declaration')}}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <input type="number" class="form-control" placeholder="" value="10000" readonly>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.current_balance')}}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                                <input name="cash_amount" type="number" id="amount" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.amount')}}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <input type="text" disabled name="person_name" id="other_text" class="form-control" style="display: none;" placeholder="">
                                                <select data-width="100%" name="person_id" class="selectpicker" data-live-search="true" tabindex="-1">
                                                    <option value="">{{__('titles.select')}}</option>
                                                    @foreach ($Suppliers as $Supplier)
                                                        <option value="{{$Supplier->id}}">{{$Supplier->person_name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <div class="bt-df-checkbox"style="margin-right:-10px;">
                                                    <input class="radio-checked" type="radio" checked="" value="101" id="outgoing_type_id" name="person_type">
                                                    <label><b> {{__('titles.suppliers')}} </b></label>
                                                    <input class="" type="radio" value="102" id="optionsRadios2" name="person_type">
                                                    <label><b> {{__('titles.employees')}} </b></label>
                                                    <input class="" type="radio" value="100" id="optionsRadios3" name="person_type">
                                                    <label><b> {{__('titles.clients')}} </b></label>
                                                    <input class="" type="radio" value="" id="optionsRadios4" name="person_type">
                                                    <label><b> {{__('titles.other')}} </b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="bt-df-checkbox">
                                                    <input class="radio-checked" type="radio" value="101" id="optionsRadios1" name="outgoing_type_id">
                                                    <label><b> {{__('titles.Services')}} </b></label>
                                                    <input class="" type="radio" checked="" value="100" id="optionsRadios2" name="outgoing_type_id">
                                                    <label><b> {{__('titles.commodity')}} </b></label>
                                                    <input class="" type="radio" checked="" value="" id="optionsRadios2" name="outgoing_type_id">
                                                    <label><b> {{__('titles.machine_equipment')}} </b></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">{{__('titles.outgoings_type')}}</label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="bt-df-checkbox">
                                                    <input class="radio-checked" type="radio" checked="" value="1" id="optionsRadios1" name="approved">
                                                    <label><b> {{__('titles.confirm')}}  </b></label>
                                                    <input class="" type="radio" value="0" id="optionsRadios2" name="approved">
                                                    <label><b>  {{__('titles.not_confirm')}}  </b></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">{{__('titles.type')}}</label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="bt-df-checkbox">
                                                    <input class="radio-checked" type="radio" value="100" id="optionsRadios1" name="service_type_id">
                                                    <label><b> {{__('titles.Services')}}  </b></label>
                                                    <input class="" type="radio" checked="" value="101" id="optionsRadios2" name="service_type_id">
                                                    <label><b> {{__('titles.supplying')}} </b></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">{{__('titles.Services_type')}}</label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="bt-df-checkbox">
                                                    <input class="radio-checked" type="radio" value="100" id="optionsRadios1" name="purchasing_type_id">
                                                    <label><b> {{__('titles.imported')}} </b></label>
                                                    <input class="" type="radio" checked="" value="101" id="optionsRadios2" name="purchasing_type_id">
                                                    <label><b> {{__('titles.local')}} </b></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">{{__('titles.purshasing')}}</label>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="number" class="form-control ccit" placeholder="" readonly>
                                                    <input type="hidden" class="form-control ccit" placeholder="" name="comm_industr_prof_tax">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.comm_industr_prof_tax')}}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="number" class="form-control vvat" placeholder="" readonly>
                                                    <input type="hidden" class="form-control vvat" placeholder="" name="vat_value">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.vat_value')}}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="number" class="form-control net" placeholder="" readonly>
                                                    <input type="hidden" class="form-control net" name="net_value">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.net_value')}}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <textarea class="form-control" placeholder="" name="notes"></textarea>
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
            //خدمه - توريد (tax)
            $('input[type=radio][name=service_type_id]').change(function(){
                if(this.value == 101){
                    $('#cit').val("{{$CIT_Items->item_value}}")
                }else{
                    $('#cit').val("{{$CIT_Services->item_value}}")
                }
                var cit = (($('#cit').val())/100);
                var vat = (($('#vat').val())/100);
                var amount = $('#amount').val();
                if($('input[type=radio][name=approved]:checked').val() == 1){
                    $('.vvat').val((amount*(vat)).toFixed(2));
                    $('.net').val((amount*(1+((vat-cit)))).toFixed(2));
                    $('.ccit').val((amount*(cit)).toFixed(2));
                }else{
                    $('.vvat').val(0);
                    $('.net').val(amount);
                    $('.ccit').val(0);
                }
            })
            $('input[type=radio][name=approved]').change(function(){
                var cit = (($('#cit').val())/100);
                var vat = (($('#vat').val())/100);
                var amount = $('#amount').val();
                if($('input[type=radio][name=approved]:checked').val() == 1){
                    $('.vvat').val((amount*(vat)).toFixed(2));
                    $('.net').val((amount*(1+((vat-cit)))).toFixed(2));
                    $('.ccit').val((amount*(cit)).toFixed(2));
                }else{
                    $('.vvat').val(0);
                    $('.net').val(amount);
                    $('.ccit').val(0);
                }
            })

            $('#amount').on('input',function() {
                var cit = (($('#cit').val())/100);
                var vat = (($('#vat').val())/100);
                var amount = $('#amount').val();
                if($('input[type=radio][name=approved]:checked').val() == 1){
                    $('.vvat').val((amount*(vat)).toFixed(2));
                    $('.net').val((amount*(1+((vat-cit)))).toFixed(2));
                    $('.ccit').val((amount*(cit)).toFixed(2));
                }else{
                    $('.vvat').val(0);
                    $('.net').val(amount);
                    $('.ccit').val(0);
                }
            })
        </script>
    @endsection
