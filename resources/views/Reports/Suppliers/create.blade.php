

    {{-- @extends('Layout.web') --}}
    @extends(Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == null ? 'Layout.web' : 'Layout.company')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> التقارير<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> تقرير أرصدة الموردين</span>
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
            <form target="_blank" action="{{url('/Suppliers/Report/Fetch')}}" method="post">
                {{ csrf_field() }}
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h4 style="text-align:right">تقرير أرصدة الموردين</h4>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright" style="direction:rtl">
                                <div class="chosen-select-single mg-b-20" style="direction:rtl;">
                                    <button class="btn btn-primary waves-effect waves-light">عرض التقرير </button>
                                </div>
                                <div class="form-group-inner" style="margin-right:10px;">
                                    <div class="row" style="text-align:right !important;direction:rtl !important">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 shadow">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

                                                    @if (Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110)
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
        <script>
            $(document).ready(function(){
                debugger;
                $('#persons').selectpicker();
            })


        </script>
    @endsection
