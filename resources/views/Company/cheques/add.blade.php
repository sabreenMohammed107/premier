@extends('Layout.company')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> {{ __('titles.company') }}<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod">{{ __('titles.cheques') }} </span>
    </li>
</ul>

@endsection

@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
        <form action="{{url('/Cheques/Create')}}" method="post">
            {{ csrf_field() }}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mg-b-15">
                    <a href="{{url('/Cheques')}}" class="btn btn-warning">{{ __('titles.cancel') }} </a>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">{{ __('titles.save') }} </button>
                </div>
                <div class="sparkline13-list">
                    <div class="sparkline13-hd dir-rtl">
                        <div class="main-sparkline13-hd  dir-rtl">
                            <h4 >{{ __('titles.cheques') }}</h4>
                            <h3 >{{ __('titles.company') }} : {{$Company->company_official_name}}</h3><br />
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
                                                <div class="bt-df-checkbox">
                                                    <input class="radio-checked" type="radio" checked="" value="person" id="optionsRadios1" name="optionsRadios0">
                                                    <label><b> {{ __('titles.person') }} </b></label>
                                                    <input class="" type="radio" value="safe" id="optionsRadios2" name="optionsRadios0">
                                                    <label><b> {{ __('titles.cash_box') }} </b></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2" >{{ __('titles.send_to') }} </label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr" id="forperson">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <select data-width="100%" name="person_id" class="selectpicker" data-live-search="true" tabindex="-1">
                                                    <option value="">{{ __('titles.select') }}</option>
                                                    @foreach ($Suppliers as $Supplier)
                                                        <option value="{{$Supplier->id}}">{{$Supplier->person_name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <div class="bt-df-checkbox" style="margin-right:-10px;">
                                                    <input class="radio-checked" type="radio" checked="" value="101" id="optionsRadios1" name="person_type">
                                                    <label><b>  {{ __('titles.suppliers') }}  </b></label>
                                                    <input class="" type="radio" value="102" id="optionsRadios2" name="person_type">
                                                    <label><b>  {{ __('titles.employees') }}  </b></label>
                                                    <input class="" type="radio" value="100" id="optionsRadios3" name="person_type">
                                                    <label><b>  {{ __('titles.clients') }}  </b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="date" name="transaction_date" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b> {{ __('titles.date') }} </b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="number" disabled class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2" id="forwhomtext"><b> {{ __('titles.credit') }}  + / {{ __('titles.depit') }}  - </b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    @php
                                                        $Bank = $Company->bank;
                                                    @endphp
                                                    <input type="text" disabled value="{{$Bank->bank_name}}" name="" id="bank_name_fake" class="form-control bank" placeholder="">
                                                    <input type="hidden" value="{{$Bank->bank_name}}" name="bank_name" id="bank_name" class="form-control bank" placeholder="">
                                                    <input type="hidden" value="{{$Bank->id}}" name="bank_id" id="bank_id" class="form-control bank" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <div class="bt-df-checkbox" style="margin-right:-10px;">
                                                    <input class="radio-checked" type="radio" checked="" value="current" id="optionsRadios1" name="optionsRadios2">
                                                    <label><b> {{ __('titles.bank') }} </b></label>
                                                    <input class="" type="radio" value="other" id="optionsRadios2" name="optionsRadios2">
                                                    <label><b> {{ __('titles.other') }} </b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="row row-ltr">
                                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                        <div class="input-mark-inner mg-b-22">
                                                            <input type="text" disabled class="form-control" value="{{$Code}}" placeholder="">
                                                        <input type="hidden" name="cheque_serial" class="form-control" value="{{$Code}}" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                        <label class="login2"><b>{{ __('titles.cheque_nu') }}</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <div class="bt-df-checkbox" style="margin-right:-10px;">
                                                    <input class="radio-checked" type="radio" checked="" value="0" id="optionsRadios1" name="trans_type">
                                                    <label><b>{{ __('titles.cash_cheques') }}</b></label>
                                                    <input class="" type="radio" value="1" id="1aaa" name="trans_type">
                                                    <label><b>{{ __('titles.receipt_cheques') }}</b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="text" name="cheque_no" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{ __('titles.cheque_no') }}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <input type="number" name="amount" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{ __('titles.mony_amount') }}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="date" name="release_date" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{ __('titles.release_date') }}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="date" name="due_date" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{ __('titles.due_date') }}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <textarea class="form-control" name="notes" placeholder=""></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{ __('titles.notes') }}</b></label>
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
                    fetchPersons("{{url('/Cash/Sales/Fetch/Persons/Clients')}}","{{session('company_id')}}");
                }else if($('input[name=person_type]:checked').val() == 101){
                    fetchPersons("{{url('/Cash/Sales/Fetch/Persons/Suppliers')}}","{{session('company_id')}}");
                }else if($('input[name=person_type]:checked').val() == 102){
                    fetchPersons("{{url('/Cash/Sales/Fetch/Persons/Employees')}}","{{session('company_id')}}");
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
