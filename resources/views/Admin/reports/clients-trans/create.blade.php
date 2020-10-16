@extends(Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110 ? 'Layout.web' : 'Layout.company')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> التقارير <span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> تقرير حركة العميل</span>
    </li>
</ul>

@endsection

@section('content')
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 style="direction:rtl"> تقرير حركة العميل </h1><br />
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                       

                            <div class="datatable-dashv1-list custom-datatable-overright">
                            <form action="@if(Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110){{route('Admin-client-report.store')}}
                                @else {{route('Company-client-report.store')}} @endif" method="post" target="_blank">
                                <div class="chosen-select-single mg-b-20" style="direction:rtl;">

                                    @csrf
                                    <input type="hidden" name="client_ids[]" id="deto">
                                    <button onclick="saving()" type="submit" class="btn btn-primary waves-effect waves-light">عرض تقرير جدول</button>
                                    <!-- <button class="btn btn-primary waves-effect waves-light">عرض تقرير صفحات</button> -->
                       
                    </div>
                    <div class="form-group-inner" style="margin-right:10px;">
                        <div class="row res-rtl" style="display: flex ;flex-direction: row-reverse ;">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 mg-b-15" style="direction:rtl">
                                <div class="row" style="margin-top:5px;">
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                        <select data-placeholder="Choose a Country..." id="select_company" name="select_company" class="chosen-select" tabindex="-1">
                                            <option value="">Select</option>
                                            @foreach($rows as $row)
                                            <option value="{{$row->id}}">{{$row->company_official_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <div class="input-mask-title">
                                            <label><b style="font-size:18px">الشركة</b></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                        <div class="input-mark-inner mg-b-22">
                                            <input type="date" name="from_date" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <label class="login2"><b>التاريخ من</b></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                        <div class="input-mark-inner mg-b-22">
                                            <input type="date" name="to_date" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <label class="login2"><b>التاريخ إالي</b></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            </form>
                    <table class="table-striped" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" style="direction:rtl">
                        <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true"></th>
                                <th data-field="id"></th>
                                <th data-field="db">Id</th>
                                <th data-field="name">الإسم</th>
                                <th>الهاتف</th>
                                <th>موبايل</th>
                                <th>رقم التسجيل</th>
                                <th>السجل التجاري</th>
                            </tr>
                        </thead>
                        <tbody id="indexTable">
                            @include('Admin.reports.clients-trans.createTable')


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
@endsection
@section('scripts')



<script>
    $(document).ready(function() {


        $('select[name="select_company"]').on('change', function() {
            var company = $(this).val();


            $.ajax({
                url: "@if(Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id ==110){{route('dynamicCompany-clientReport.fetch')}}@else{{route('Company-dynamicCompany-clientReport.fetch')}}@endif",
                method: "get",
                data: {
                    company_id: company,

                },
                success: function(result) {
                    alert(result);
                    $('#table').bootstrapTable('destroy');

                    $('tbody').html(result);
                    $('#table').bootstrapTable()


                }
            });

        });


    });

    function saving() {
        //geting selected client
        var dd = [];
        var details = [];
        details = JSON.stringify($('#table').bootstrapTable('getSelections'));

        var obj = JSON.parse(details);

        jQuery.each(obj, function(i, val) {
            dd.push(obj[i].db);
        });

        $('#deto').val(dd);
        // $.ajax({
        //     type: 'POST',
        //     url: "{{route('Admin-client-report.store')}}",
        //     data: {
        //         "_token": "{{ csrf_token() }}",
        //         client_ids: dd,
        //         company_id: $('#select_company option:selected').val(),
        //     },
        //     success: function(data) {
        //     },
        //     error: function(request, status, error) {
        //         console.log(request.responseText);
        //     }
        // });

    }
</script>
@endsection