@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
   
   
    @if(str_replace('_', '-', app()->getLocale())=='ar')
    <li>
        <a href="#"></a>  {{ __('titles.home') }} <span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> {{ __('titles.annual_balance') }}</span>
    </li>
	@else
   
   
    <li>
        <span class="bread-blod"> {{ __('titles.annual_balance') }}</span>
    </li>
    <li>
        <a href="#"></a>  {{ __('titles.home') }}
    </li>
   
	@endif
</ul>

@endsection
@section('style')
<style>
    .pagination-info {
        display: none !important;
    }

    .page-list {
        display: none !important;
    }

    .pagination ul li {
        float: right !important;
    }

    .search input:-ms-input-placeholder {
        color: white !important;
    }

    #table td,
    th {
        text-align: right;
    }

    .shadow {
        -webkit-box-shadow: 10px 10px 5px -9px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 10px 10px 5px -9px rgba(0, 0, 0, 0.75);
        box-shadow: 10px 10px 5px -9px rgba(0, 0, 0, 0.75);
    }

    .input-mask-title {
        text-align: right !important;
    }
</style>

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
                            <h1 >{{ __('titles.annual_balance') }}</h1><br />
                        </div>
                    </div>
                    <div class="chosen-select-single mg-b-20 dir-rtl">
										<!--<h3><span>شركة : </span> عباد المعين (حركة الموردين+حركة المخزون)</h3>-->
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="row row-ltr">
												<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"></div>
													<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 dir-rtl">
														<div class="row row-ltr" style="margin-top:5px;">
															<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                <select data-placeholder="Choose a Company..." class="dynamic chosen-select " tabindex="-1" id="compid">
                                                    <option value=""> {{ __('titles.select') }}</option>
                                                    @foreach($companies as $company)
                                                    <option value="{{$company->id}}">{{$company->company_official_name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                <div class="input-mask-title dir-rtl">
                                                    <label><b style="font-size:20px">{{ __('titles.company') }}</b></label>
                                                </div>
                                            </div>
                                        </div>
                                                    </div>
                                            </div>
										</div>
                                    
                               

                            </div>
                            <div id="tableData">
                                @include('Admin.year-balance.tableData')
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
        $('#error-msg').html('');

        $('.dynamic').change(function() {

            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();

                $.ajax({
                    url: "{{route('dynamicYear.fetch')}}",
                    method: "get",
                    data: {
                        value: value,
                    },
                    success: function(result) {

                        $('#tableData').html(result);
                        $('#error-msg').html('');

                    }

                })
            }

        });
    });

    function closeYear(id) {
    
        $.ajax({
            url: "{{route('dynamicYearClose.fetch')}}",
            method: "get",
            data: {
                id: id,
            },
            success: function(result) {

            
                $('#tableData').html(result);


            }

        })
    }

    function openYear(id) {
      
        $.ajax({
            url: "{{route('dynamicYearOpen.fetch')}}",
            method: "get",
            data: {
                id: id,
            },
            success: function(result) {

              
                $('#tableData').html(result);


            }

        })
    }
    
    function openYearBalance(id) {
      
            $.ajax({
          url: "{{route('openYearBalance.fetch')}}",
          method: "get",
          data: {
              id: id,
          },
          success: function(result) {

            
              $('#tableData').html(result);


          }

      })
  }


  function cancelBalance(id) {
      
      $.ajax({
          url: "{{route('cancelBalance.fetch')}}",
          method: "get",
          data: {
              id: id,
          },
          success: function(result) {

            
              $('#tableData').html(result);


          }

      })
  }
</script>
@endsection