@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
   
    @if(str_replace('_', '-', app()->getLocale())=='ar')
    <li>
        <a href="#"></a>  {{ __('titles.home') }} <span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod">  {{ __('titles.purchases') }} </span>
    </li>
	@else
   
   
    <li>
        <span class="bread-blod">  {{ __('titles.purchases') }} /</span>
    </li>
    <li>
        <a href="#"></a>  {{ __('titles.home') }}
    </li>
   
	@endif
</ul>

@endsection

@section('content')
<style>
    .pagination ul li {
        float: right !important;
    }

    .search input:-ms-input-placeholder {
        color: white !important;
    }

   
</style>
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <input type="hidden" value="{{csrf_token()}}" id="csrf-token">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd dir-rtl">
                            <h1 > {{ __('titles.purchases') }}</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright dir-rtl" >
                            <div class="chosen-select-single mg-b-20 dir-rtl" >
                                <label>{{ __('titles.company') }}</label>
                                <select data-placeholder="Choose a Country..." id="select_company" name="select_company" class="selectpicker" data-live-search="true" data-width="100%" tabindex="-1">
                                    <option value="">{{ __('titles.select') }}</option>
                                    @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->company_official_name}} </option>

                                    @endforeach
                                </select>
                            </div>

                            <table class="table-striped dir-rtl" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-resizable="true" data-cookie="true" data-toolbar="#toolbar" data-show-toggle="true" data-show-fullscreen="true" data-show-columns-toggle-all="true" data-show-export="true" data-minimum-count-columns="2" data-page-list="[10, 25, 50, 100, all]" data-click-to-select="true">
                                <thead>
                        
                                    <tr>
                                        <th data-field="hash" data-sortable="true">#</th>
                                        <th data-field="date" data-sortable="true">{{ __('titles.date') }}</th>
                                        <th data-field="code" data-sortable="true">{{ __('titles.bill_no') }}</th>
                                        <th data-field="approved" data-sortable="true">{{ __('titles.type') }}</th>
                                        <th data-field="net" data-sortable="true">{{ __('titles.net_value') }}</th>
                                        <th data-field="outgoing" data-sortable="true">{{ __('titles.outgoings') }}</th>
                                        <th data-field="purchasing" data-sortable="true">{{ __('titles.Services') }}</th>
                                        <th data-field="service" data-sortable="true">{{ __('titles.payment') }}</th>
                                        <th data-field="actions" data-sortable="false">{{ __('titles.options') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="indexTable">
                                    @include('Admin.invoice.indexTable')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Static Table End -->



<!--/Modal-->
</div>
@endsection
@section('scripts')

<script>
    $(document).ready(function() {
        $('select[name="select_company"]').on('change', function() {
            var company = $(this).val();


          

            $.ajax({
                url: "{{route('invoice-purch-select')}}",
                method: "GET",
                data: {
                    company_id: company,

                },
                success: function(result) {
                    $('#table').bootstrapTable('destroy');
                 
                    $('#indexTable').html(result);
                    $('#table').bootstrapTable();
                    $('#select_company').selectpicker();

                }
            });

        });


    });
</script>
@endsection