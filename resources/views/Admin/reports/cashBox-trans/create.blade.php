@extends(Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110 ? 'Layout.web' : 'Layout.company')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> {{ __('titles.reports') }} <span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> {{ __('titles.cashbox_transactions_reports') }}</span>
    </li>
</ul>

@endsection

@section('content')
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row row-ltr">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 >{{ __('titles.cashbox_transactions_reports') }}</h1><br />
                        </div>
                    </div>
                    <div class="sparkline13-graph">


                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <form action="@if(Auth::user()->role_id == 100 || Auth::user()->role_id == 101 || Auth::user()->role_id == 110){{route('Admin-cashBox-report.store')}}
                                @else {{route('Company-cashBox-report.store')}} @endif" method="post" target="_blank">
                                <div class="chosen-select-single mg-b-20 dir-rtl" >

                                    @csrf
                                    <input type="hidden" name="cashBox_ids[]" id="deto">
                                    <input type="hidden" name="companies_ids[]" id="comp">
                                    <!-- <button onclick="saving()" type="submit" class="btn btn-primary waves-effect waves-light">{{ __('titles.show_report') }}</button> -->
                                    <!-- <button class="btn btn-primary waves-effect waves-light">عرض تقرير صفحات</button> -->
                                    <button onclick="saving()"name="action" value="savepdf" type="submit" class="btn btn-primary waves-effect waves-light">{{ __('titles.show_report') }}</button>
                                    <button onclick="saving()"name="action" value="saveExcel" type="submit" class="btn btn-primary waves-effect waves-light">{{ __('titles.show') }} Excel</button>

                                </div>
                                <div class="form-group-inner" style="margin-right:10px;">
                                    @if(str_replace('_', '-', app()->getLocale())=='ar')
                                    <div class="row res-rtl" style="display: flex ;flex-direction: row-reverse ;">
                                        @else
                                        <div class="row ">
                                            @endif
                                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 mg-b-15" >

                                                <div class="row row-ltr">
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                        <div class="input-mark-inner mg-b-22">
                                                            <input type="date" name="from_date" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                        <label class="login2"><b>{{ __('titles.date_from') }}</b></label>
                                                    </div>
                                                </div>
                                                <div class="row row-ltr">
                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                        <div class="input-mark-inner mg-b-22">
                                                            <input type="date" name="to_date" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                        <label class="login2"><b>{{ __('titles.date_to') }}</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                            <table class="table-striped dir-rtl" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" >
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id"></th>
                                        <th data-field="db">Id</th>
                                        <th data-field="safe" data-visible="false">safeId</th>
                                        <th data-field="name">{{ __('titles.company') }}</th>
                                        <th>{{ __('titles.legal_entity') }}</th>
                                        <th>{{ __('titles.tax_authority') }}</th>
                                        <th>{{ __('titles.registeration_no') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="indexTable">

                                    @foreach($rows as $index => $row)
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->safe_id }}</td>
                                        <td>{{$row->company_official_name}}</td>
                                        <td>{{$row->legal_entity}}</td>
                                        <td>{{$row->tax_authority}}</td>
                                        <td>{{$row->registeration_no}}</td>
                                    </tr>
                                    @endforeach


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
    function saving() {
        //geting selected client
        var dd = [];
        var comp = [];
        var details = [];
        details = JSON.stringify($('#table').bootstrapTable('getSelections'));

        var obj = JSON.parse(details);

        jQuery.each(obj, function(i, val) {
            dd.push(obj[i].safe);
            comp.push(obj[i].db);
        });

        $('#deto').val(dd);
        $('#comp').val(comp);


    }
</script>
@endsection