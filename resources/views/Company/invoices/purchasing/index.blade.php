@extends('Layout.company')



@section('crumb')


<ul class="breadcome-menu">
    <li>
        <a href="#"></a> الشركات<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> المشتريات </span>
    </li>
</ul>

@endsection

@section('content')
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="mg-b-15">
            <a href="{{ url("/Invoices/Purchasing/Add")}}" class="btn btn-primary waves-effect waves-light">إضافة فاتورة</a>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 style="direction:rtl">فواتير المشتريات</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright"style="direction:rtl" >
                            <div class="chosen-select-single mg-b-20" style="direction:rtl;">
                                <h3>الشركة</h3>
                                <h3>{{$Company->company_official_name}}</h3>
                            </div>
                            <table class="table-striped" id="table"
                                    data-toggle="table"
                                    data-pagination="true"
                                    data-pagination-pre-text="السابق"
                                    data-pagination-next-text="التالي"
                                    data-search="true"
                                    data-show-columns="true"
                                    data-show-pagination-switch="true"
                                    data-show-refresh="true"
                                    data-key-events="true"
                                    data-resizable="true"
                                    data-cookie="true"
                                    data-toolbar="#toolbar"
                                    data-show-toggle="true"
                                    data-show-fullscreen="true"
                                    data-show-columns-toggle-all="true"
                                    data-show-export="true"
                                    data-minimum-count-columns="2" >
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
                                <tbody>
                                    @foreach ($Invoices as $i => $Invoice)
                                    @php
                                        ++$i;
                                    @endphp
                                       <tr>
                                       <td>{{$i}}</td>
                                        <td>{{date('Y-m-d', strtotime($Invoice->inv_date))}}</td>
                                        <td>{{$Invoice->invoice_no}}</td>
                                        <td>
                                            @if ($Invoice->approved == 1)
                                                معتمد
                                            @else
                                                غير معتمد
                                            @endif
                                        </td>
                                        <td>{{$Invoice->net_invoice}}جم</td>
                                        <td>{{$Invoice->outgoing_type_name}}</td>
                                        <td>{{$Invoice->purchasing_types_name}}</td>
                                        <td>{{$Invoice->service_type}}</td>
                                        <td>
                                            <div class="product-buttons">
                                            <a href="{{ url("/Invoices/Purchasing/$Invoice->id/View")}}" title="View" class="pd-setting-ed btn btn-primary"><i class="fa fa-file" style="color: #fff;" aria-hidden="true"></i></a>
                                                <a href="{{ url("/Invoices/Purchasing/$Invoice->id/Edit")}}" title="Edit" class="pd-setting-ed btn btn-primary"><i class="fa fa-pencil-square-o" style="color: #fff;" aria-hidden="true"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#del{{$Invoice->id}}" title="Trash" class="pd-setting-ed btn btn-primary"><i class="fa fa-trash-o" style="color: #fff;" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
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

@section('modal')
<!--Modal-->
@foreach ($Invoices as $InvoiceModal)
    <!--Delet-->
<div id="del{{$InvoiceModal->id}}" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header header-color-modal bg-color-2">
						<h4 class="modal-title" style="text-align:right">حذف بيانات العميل</h4>
						<div class="modal-close-area modal-close-df">
							<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
						</div>
					</div>
					<div class="modal-body">
						<span class="educate-icon educate-danger modal-check-pro information-icon-pro"> </span>
						<h2>{{$Company->company_official_name}}</h2>
						<h4>هل تريد حذف جميع بيانات الفاتورة رقم {{$InvoiceModal->invoice_no}} ؟  </h4>
					</div>
					<div class="modal-footer info-md">
						<a data-dismiss="modal" href="#">إلغــاء</a>
                    <a href="{{url("/Invoices/Purchasing/$InvoiceModal->id/Delete")}}">حـذف</a>
					</div>
				</div>
			</div>
		</div>
		<!--/Delete-->
@endforeach
        <!--/Modal-->

        @endsection
