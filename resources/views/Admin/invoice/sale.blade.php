@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> الرئيسية<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod">  مبيعات اجله </span>
    </li>
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

    #table td,
    th {
        text-align: right
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
                        <div class="main-sparkline13-hd">
                            <h1 style="direction:rtl"> مبيعات اجله</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright" style="direction:rtl">
                            <div class="chosen-select-single mg-b-20" style="direction:rtl;">
                                <label>الشركة</label>
                                <select data-placeholder="Choose a Country..." id="select_company" name="select_company" class="selectpicker" data-live-search="true" data-width="100%" tabindex="-1">
                                    <option value="">إختار الشركة</option>
                                    @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->company_official_name}} </option>

                                    @endforeach
                                </select>
                            </div>

                            <table class="table-striped" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-resizable="true" data-cookie="true" data-toolbar="#toolbar" data-show-toggle="true" data-show-fullscreen="true" data-show-columns-toggle-all="true" data-show-export="true" data-minimum-count-columns="2" data-page-list="[10, 25, 50, 100, all]" data-click-to-select="true">
                                <thead>
                                    <tr>
                                        <th data-field="hash" data-sortable="true">#</th>
                                        <th data-field="date" data-sortable="true">التاريخ</th>
                                        <th data-field="code" data-sortable="true">رقم الفاتوره</th>
                                        <th data-field="approved" data-sortable="true">النوع</th>
                                        <th data-field="net" data-sortable="true">الصافى</th>
                                        <th data-field="outgoing" data-sortable="true">المصروف</th>
                                        <th data-field="purchasing" data-sortable="true">الخدمات</th>
                                        <th data-field="service" data-sortable="true">المدفوعات</th>
                                        <th data-field="actions" data-sortable="false">خيارات</th>
                                    </tr>
                                </thead>
                                <tbody id="indexTable">
                                    @include('Admin.invoice.indexTableSale')
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
                url: "{{route('invoice-sale-select')}}",
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