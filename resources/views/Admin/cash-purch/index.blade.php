@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> الرئيسية<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> مدفوعات نقدية </span>
    </li>
</ul>

@endsection

@section('content')
<!-- Static Table Start -->
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
        text-align: right
    }

    .fixed-table-loading {
        display: none !important;
    }
</style>
<div class="product-status mg-b-15">

    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1 style="direction:rtl">مدفوعات نقدية</h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright" style="direction:rtl">
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                <div class="chosen-select-single mg-b-20" style="direction:rtl;">
                                    <label>الشركة</label>
                                    <select data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1" style="display: none;">
                                        <option value="">إختار الشركة</option>
                                        <option value="United States">وينرز اكتوبر</option>
                                        <option value="United Kingdom">ارت شادو</option>
                                        <option value="Afghanistan">عباد المعين</option>
                                        <option value="Aland Islands">وينرز مدكور</option>
                                        <option value="Albania">شركة بيولا</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">انتربلوك النميسى</option>
                                        <option value="Andorra">ثينك تكنولوجي</option>
                                        <option value="Angola">شركة انترنايل</option>
                                    </select>
                                </div>
                                <form id="form" action="{{route('cc')}}" method="post">
                                    <table class="table-striped" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">

                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id">#</th>
                                                <th data-field="name" data-editable="false">التاريخ</th>
                                                <th data-field="email" data-editable="false">البيان</th>
                                                <th data-field="phone" data-editable="false">إذن إستلام</th>

                                                <th data-field="Application_ids" data-editable="true">معيار تفصيلى </th>
                                                <th data-field="task" data-editable="false">بند توجيه</th>
                                                <th data-field="number" data-editable="true">معتمد</th>
                                                <th data-field="price" data-editable="false">المبلغ</th>
                                                <th data-field="action">خيارات</th>
                                            </tr>
                                        </thead>
                                        <tbody>







                                            @foreach($rows as $index=>$row)
                                            <td></td>
                                            <td>{{$row->id}}
                                                <input type="hidden" name="ids[]" value="{{$row->id}}">

                                            </td>
                                            <?php
                                            $date = null;
                                            if ($row->created_at) {
                                                $date = date_create($row->created_at);
                                            }
                                            ?>
                                            <td>@if($date){{ date_format($date,"d-m-Y")  }}@endif</td>
                                            <td>{{$row->company_official_name ?? ''}}</td>
                                            <td>{{$row->registeration_no}}</td>
                                            <td data-id="{{$row->id}}" data-type="text" data-name="tax_authority" data-value="{{$row->tax_authority}}"  class="name" data-pk="{{$row->id}}"> {{$row->tax_authority}}</td>


                                            <td>مقبوضات نقدية

                                            </td>
                                            <td>{{$row->active}}</td>
                                            <td>4300</td>
                                            <td>
                                                <div class="product-buttons">

                                                    <button data-toggle="modal" data-target="#vw" title="View" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true"></i></button>
                                                    <button data-toggle="modal" data-target="#del" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </div>
                                            </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
<!-- data table JS
		============================================ -->
<script src="{{ asset('webassets/js/data-table/bootstrap-table.js')}}"></script>
<script src="{{ asset('webassets/js/data-table/tableExport.js')}}"></script>
<script src="{{ asset('webassets/js/data-table/data-table-active.js')}}"></script>
<script src="{{ asset('webassets/js/data-table/bootstrap-table-editable.js')}}"></script>
<script src="{{ asset('webassets/js/data-table/bootstrap-editable.js')}}"></script>
<script src="{{ asset('webassets/js/data-table/bootstrap-table-resizable.js')}}"></script>
<script src="{{ asset('webassets/js/data-table/colResizable-1.5.source.js')}}"></script>
<script src="{{ asset('webassets/js/data-table/bootstrap-table-export.js')}}"></script>
<!--  editable JS
		============================================ -->
<script src="{{ asset('webassets/js/editable/jquery.mockjax.js')}}"></script>
<script src="{{ asset('webassets/js/editable/mock-active.js')}}"></script>
<script src="{{ asset('webassets/js/editable/select2.js')}}"></script>
<script src="{{ asset('webassets/js/editable/moment.min.js')}}"></script>
<script src="{{ asset('webassets/js/editable/bootstrap-datetimepicker.js')}}"></script>
<script src="{{ asset('webassets/js/editable/bootstrap-editable.js')}}"></script>
<script src="{{ asset('webassets/js/editable/xediable-active.js')}}"></script>
<script>
    $(document).ready(function() {
                //toggle `popup` / `inline` mode
                $.fn.editable.defaults.mode = 'inline';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('#csrf-token').val()
                    }
                });


                id = $(this).data('pk');

                url = $('#form').attr('action');


                //make username editable
                $('.name').editable({
                        url: url,
                        pk: id,

                        type: "text",
                        validate: function(value) {
                            if ($.trim(value) === '') {
                                return 'This field is required';
                            }
                        },
                        success: function(result) {
                        },


                });
    });
</script>
@endsection