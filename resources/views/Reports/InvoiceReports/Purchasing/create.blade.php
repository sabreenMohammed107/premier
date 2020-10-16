

    {{-- @extends('Layout.web') --}}
    @extends(Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == null ? 'Layout.web' : 'Layout.company')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> التقارير<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> تقرير المشتريات  </span>
    </li>
</ul>

@endsection

@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mg-b-15">
                    {{-- <button class="btn btn-primary waves-effect waves-light">إلغــــاء</button>
                    <button class="btn btn-primary waves-effect waves-light">حــفـــظ</button> --}}
                    <a href="{{url(Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == null ? '/' : '/Company')}}" class="btn btn-primary waves-effect waves-light">إلغــــاء</a>

                </div>
            <form target="_blank" action="{{url('/Invoice/Purchasing/Report/Fetch')}}" method="post">
                {{ csrf_field() }}
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h4 style="text-align:right">تقرير المشتريات</h4>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright" style="direction:rtl">
                                <div class="chosen-select-single mg-b-20" style="direction:rtl;">
                                    <button class="btn btn-primary waves-effect waves-light">عرض تقرير صفحات</button>
                                </div>
                                <div class="form-group-inner" style="margin-right:10px;">
                                    <div class="row" style="text-align:right !important;direction:rtl !important">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 shadow">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

                                                    @if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == null)
                                                        <select required data-placeholder="Choose a Country..." name="company_id" class="selectpicker" id="company_id" data-live-search="true" data-width="100%" tabindex="-1">
                                                            <option value="" selected disabled>Select</option>
                                                            @foreach ($Companies as $Company)
                                                                <option value="{{$Company->id}}">{{$Company->company_official_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        {{$Companies[0]->company_official_name}}
                                                    <input id="company_id" type="hidden" value="{{$Companies[0]->id}}" />
                                                    @endif

                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <label class="login2">الشركة</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="input-mark-inner mg-b-22">
                                                        <input type="text" name="invoice_no" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <label class="login2">رقم الفاتورة</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="input-mark-inner mg-b-22">
                                                        <input type="date" name="from_date" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <label class="login2"><b>التاريخ من</b></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="input-mark-inner mg-b-22">
                                                        <input type="date" name="to_date" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <label class="login2"><b>التاريخ إالي</b></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="bt-df-checkbox">
                                                        <input class="" type="radio" value="0" id="optionsRadios1" name="approved">
                                                        <label><b> غير معتمد </b></label>
                                                        <input class="" type="radio" value="1" id="optionsRadios2" name="approved">
                                                        <label><b> معتمد </b></label>
                                                        <input class="radio-checked" type="radio" checked="" id="optionsRadios3" value="" name="approved">
                                                        <label><b> الكل </b></label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <label class="login2"> النوع الفاتورة</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="bt-df-checkbox">
                                                        <input class="" type="radio" value="101" id="optionsRadios1" name="outgoing_type_id">
                                                        <label><b> خدمات </b></label>
                                                        <input class="" type="radio" value="100" id="optionsRadios2" name="outgoing_type_id">
                                                        <label><b> سلعة </b></label>
                                                        <input class="" type="radio" value="102" id="optionsRadios3" name="outgoing_type_id">
                                                        <label><b> الات و معدات </b></label>
                                                        <input class="radio-checked" checked="" type="radio" value="" id="optionsRadios3" name="outgoing_type_id">
                                                        <label><b> الكل </b></label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <label class="login2">خدمة</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="bt-df-checkbox">
                                                        <input class="" type="radio" value="100" id="service_type_id" name="service_type_id">
                                                        <label><b> خدمة </b></label>
                                                        <input class="" type="radio" value="101" id="optionsRadios2" name="service_type_id">
                                                        <label><b> توريد </b></label>
                                                        <input class="radio-checked" type="radio" checked="" value="" id="optionsRadios3" name="service_type_id">
                                                        <label><b> الكل </b></label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <label class="login2">النوع</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="bt-df-checkbox">
                                                        <input class="" type="radio" value="0" id="optionsRadiosx1" name="return_back_invoice">
                                                        <label><b> فاتورة </b></label>
                                                        <input class="" type="radio" value="1" id="optionsRadiosx2" name="return_back_invoice">
                                                        <label><b> مرتد </b></label>
                                                        <input class="radio-checked" checked="" type="radio" value="" id="optionsRadiosx3" name="return_back_invoice">
                                                        <label><b> الكل </b></label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <label class="login2">نوع الفاتورة</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="bt-df-checkbox">
                                                        <input class="" type="radio" value="101" id="optionsRadios1" name="purchasing_type_id">
                                                        <label><b> محلي </b></label>
                                                        <input class="" type="radio" value="100" id="optionsRadios2" name="purchasing_type_id">
                                                        <label><b> مستورد </b></label>
                                                        <input class="radio-checked" type="radio" value="" checked="" id="optionsRadios3" name="purchasing_type_id">
                                                        <label><b> الكل </b></label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <label class="login2">النوع</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <select data-placeholder="Choose a Country..." name="person_id" id="persons" class="selectpicker" data-live-search="true" data-width="100%" tabindex="-1">
                                                        <option value="" selected disabled>Select</option>
                                                        @foreach ($Persons as $Person)
                                                            <option value="{{$Person->id}}">{{$Person->person_name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="bt-df-checkbox" style="margin-right:-10px;">
                                                        <input class="radio-checked" type="radio" checked="" value="101" id="firsr_check" name="person_type_id">
                                                        <label><b> موردين </b></label>
                                                        <input class="" type="radio" value="102" id="optionsRadios2" name="person_type_id">
                                                        <label><b> موظفين </b></label>
                                                        <input class="" type="radio" value="100" id="optionsRadios3" name="person_type_id">
                                                        <label><b> عملاء </b></label>
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
        @if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == null)
        <script>
            $('#company_id').change(function(){
                $('#firsr_check').prop("checked", true);
                var Company_id = $('#company_id').val();
                fetchPersons("{{url('/Cash/Sales/Fetch/Persons/Suppliers')}}",Company_id);
            });
        </script>
        @endif
        <script>
            $(document).ready(function(){
                debugger;
                $('#persons').selectpicker();
            })

            $('input[name=person_type_id]').change(function() {
                debugger;
                var Company_id = $('#company_id').val();
                if($('input[name=person_type_id]:checked').val() == 100){
                    fetchPersons("{{url('/Cash/Sales/Fetch/Persons/Clients')}}",Company_id);
                }else if($('input[name=person_type_id]:checked').val() == 101){
                    fetchPersons("{{url('/Cash/Sales/Fetch/Persons/Suppliers')}}",Company_id);
                }else{
                    fetchPersons("{{url('/Cash/Sales/Fetch/Persons/Employees')}}",Company_id);
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
                            $('#persons').html(data);
                            $('#persons').selectpicker('refresh');
                    },
                    error: function (request, status, error) {
                        console.log(request.responseText);
                    }
                    });
            }
        </script>
    @endsection
