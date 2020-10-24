@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> الرئيسية<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> مقبوضات نقدية </span>
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
                            <h1 style="direction:rtl">مقبوضات نقدية</h1>
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

                            <table class="table-striped" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="id">#</th>
                                        <th data-field="name">التاريخ</th>
                                        <th data-field="email">البيان</th>
                                        <th data-field="phone">إذن إستلام</th>
                                        <th>معيار تفصيلى </th>
                                        <th>بند توجيه</th>
                                        <th>معتمد</th>
                                        <th data-field="price">المبلغ</th>
                                        <th data-field="action">خيارات</th>
                                    </tr>
                                </thead>
                                <tbody id="indexTable">
                                    @include('Admin.cash-sale.indexTable')
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

<!--Delete-->
<div id="del" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title" style="text-align:right">حذف بيانات المقبوضات النقدية</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-danger modal-check-pro information-icon-pro"> </span>
                <h2>شركة عباد المعين</h2>
                <h2>مقبوضات نقدية</h2>
                <h4>هل تريد حذف بيانات المقبوضات النقدية ؟ </h4>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">إلغــاء</a>
                <a href="#">حـذف</a>
            </div>
        </div>
    </div>
</div>
<!--/Delete-->
<!--View-->
<div id="vw" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title" style="text-align:right">عرض بيانات المقبوضات النقدية</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">

                <span class="educate-icon educate-warning modal-check-pro information-icon-pro"> </span>
                <h2>شركة عباد المعين</h2>
                <h4>مقبوضات نقدية</h4>
                <div class="message-content" style="text-align:right;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-content-section">
                            <div id="dropzone1" class="pro-ad addcoursepro">
                                <form action="/upload" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="direction:rtl">
                                            <div class="form-group">
                                                <label class="">الشـركة</label>
                                                <input name="" type="text" class="form-control" placeholder="شركة عباد المعين" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="">الحاله</label>
                                                <input name="" type="text" class="form-control" placeholder="غير معتمد" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="">البيان</label>
                                                <input name="" type="text" class="form-control" placeholder="دفعة من حساب شبابيك المسجد" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="">المبلغ</label>
                                                <input name="" type="number" class="form-control" placeholder="20000" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="">ض.أ.ت.ص</label>
                                                <input name="" type="text" class="form-control" placeholder="1205" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="">قيمه ض. القيمه المضافه</label>
                                                <input name="" type="number" class="form-control" placeholder="104" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="">بند توجيه</label>
                                                <input name="" type="text" class="form-control" placeholder="أرباح وخسائر" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="direction:rtl">
                                            <div class="form-group">
                                                <label class="">التاريخ</label>
                                                <input name="" type="date" class="form-control" placeholder="2020-01-01" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="">رقم اذن الصرف</label>
                                                <input name="" type="text" class="form-control" placeholder="102 " disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="">السيولة</label>
                                                <input name="" type="text" class="form-control" placeholder="الخزينة" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="">نوع إذن إستلام</label>
                                                <input name="" type="text" class="form-control" placeholder="خدمة" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="">ض.القيمه المضافه</label>
                                                <input name="" type="number" class="form-control" placeholder="14%" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="">صافى القيمه</label>
                                                <input name="" type="text" class="form-control" placeholder="10000" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="">معيار تفصيلى</label>
                                                <input name="" type="text" class="form-control" placeholder="معيار تفصيلى" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="direction:rtl">
                                            <div class="form-group">
                                                <label class="">ملاحظات</label>
                                                <textarea name="" placeholder="ملاحظات" style="max-height:100px" disabled></textarea>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">إلغــاء</a>
            </div>
        </div>
    </div>
</div>
<!--/View-->
<!--/Modal-->
</div>
@endsection
@section('scripts')

<script>
    $(document).ready(function() {
        $('#select_company').selectpicker();
        $('select[name="select_company"]').on('change', function() {
            var company = $(this).val();



            $.ajax({
                url: "{{route('dynamicCompany.salefetch')}}",
                method: "get",
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

    function fillForm(id) {

        var criterion = $('input[name=detailed_criterion' + id + ']').val();

        $.ajax({
            url: "{{route('update.salecriterion')}}",
            method: "Post",
            data: {
                criterion: criterion,
                _token: $('#csrf-token').val(),
                id: id,
                company_id: $('#select_company').val(),

            },
            success: function(result) {
                $('#table').bootstrapTable('destroy');
                $('#indexTable').html(result);
                $('#table').bootstrapTable();
                $('#select_company').selectpicker();
            }
        });

    }

    function fillSelect(id) {

        var guided_item_id = $('select[name=guided_item_id' + id + ']').val();
       
        $.ajax({
            url: "{{route('update.saleguided')}}",
            method: "Post",
            data: {
                guided_item_id: guided_item_id,
                _token: $('#csrf-token').val(),
                id: id,
                company_id: $('#select_company').val(),

            },
            success: function(result) {
                $('#table').bootstrapTable('destroy');
                $('#indexTable').html(result);
                $('#table').bootstrapTable();
                $('#select_company').selectpicker();
            }
        });

    }

    function fillCheck(id) {
        var confirmed = 0;

        if ($('input[name=confirmed' + id + ']').prop('checked')) {

            confirmed = 1;
        } else {
            confirmed = 0;
        }

        $.ajax({
            url: "{{route('update.saleconfirmed')}}",
            method: "Post",
            data: {
                confirmed: confirmed,
                _token: $('#csrf-token').val(),
                id: id,
                company_id: $('#select_company').val(),

            },
            success: function(result) {
                $('#table').bootstrapTable('destroy');
                $('#indexTable').html(result);
                $('#table').bootstrapTable();
                $('#select_company').selectpicker();
            }
        });

    }
</script>
@endsection