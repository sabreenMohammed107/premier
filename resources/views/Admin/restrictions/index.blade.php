@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
  
    @if(str_replace('_', '-', app()->getLocale())=='ar')
    <li>
        <a href="#"></a>  {{ __('titles.home') }} <span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> {{ __('titles.restrictions') }}</span>
    </li>
	@else
   
    <li>
        <span class="bread-blod"> {{ __('titles.restrictions') }} /</span>
    </li>
    <li>
        <a href="#"></a>  {{ __('titles.home') }}
    </li>
   
	@endif
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
                        <div class="main-sparkline13-hd dir-rtl">
                            <h1>{{ __('titles.restrictions') }}</h1><br />
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div class="form-group-inner" style="margin-right:10px;">
                                <form>

                                    <div class="row row-ltr">
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"></div>
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 dir-rtl">
                                            <div class="row row-ltr" style="margin-top:5px;">
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                    <select data-placeholder="Choose a Company..." name="company_id" id="company" class="chosen-select dynamic" tabindex="-1">
                                                        <option value=""> {{ __('titles.select') }}</option>
                                                        @foreach($companies as $company)
                                                        <option value="{{$company->id}}">{{$company->company_official_name}}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    <div class="input-mask-title">
                                                        <label><b style="font-size:20px">{{ __('titles.company') }}</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-ltr" style="margin-top:5px;">
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                    <select data-placeholder="{{ __('titles.years') }}" name="year_id" id="year" class="chosen-select year" tabindex="-1">

                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    <div class="input-mask-title">
                                                        <label><b style="font-size:20px">{{ __('titles.years') }}</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-ltr" style="margin-top:5px;">
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                    <select data-placeholder="{{ __('titles.months') }}" name="month_id" id="month" class="chosen-select month" tabindex="-1">

                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    <div class="input-mask-title">
                                                        <label><b style="font-size:20px">{{ __('titles.months') }}</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chosen-select-single mg-b-20">
                                        <button class="btn btn-primary waves-effect waves-light">{{ __('titles.exit_guidance') }}</button>
                                        <button class="btn btn-primary waves-effect waves-light">{{ __('titles.guidance') }}</button>
                                        <button class="btn btn-primary waves-effect waves-light">{{ __('titles.show') }}</button>
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
                var company_id = $('#company option:selected').val();

                $.ajax({
                    url: "{{route('dynamicRestricYear.fetch')}}",
                    method: "get",
                    data: {
                        select: select,
                        value: value,
                        company_id: company_id,


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