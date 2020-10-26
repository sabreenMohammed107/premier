@extends('Layout.company')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> الشركات<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> المقبوضات  </span>
    </li>
</ul>

@endsection

@section('content')
<!-- Static Table Start -->
		<div class="data-table-area mg-b-15">
			<div class="container-fluid">
				<div class="mg-b-15">
                <a href="{{url('/Cash/Sales/Add')}}" class="btn btn-primary waves-effect waves-light">إضــافة مقبوضات نقدية</a>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="sparkline13-list">
							<div class="sparkline13-hd">
								<div class="main-sparkline13-hd">
									<h1 style="direction:rtl">مقبوضات نقدية</h1>
								</div>
                            </div>
							<div class="sparkline13-graph">
								<div class="datatable-dashv1-list custom-datatable-overright"style="direction:rtl" >
									<div class="chosen-select-single mg-b-20" style="direction:rtl;">
										<h3>الشركة</h3>
										<h3>{{$Company->company_official_name}}</h3>
                                    </div>
									<table class="table-striped" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-resizable="true" data-cookie="true"
										   data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
										<thead>
											<tr>
												<th data-sortable="true">#</th>
												<th data-sortable="true">التاريخ</th>
												<th data-sortable="true">البيان</th>
												<th data-sortable="true">معتمد</th>
												<th data-sortable="true">اذن الاستلام</th>
												<th data-sortable="true">المبلغ</th>
												<th>خيارات</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($cash_sales as $i => $Cash)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{date('Y-m-d', strtotime($Cash->cash_date))}}</td>
                                        <td>{{$Cash->statement}}</td>
                                        <td>
                                            @if ($Cash->approved == 1)
                                            معتمد
                                            @else
                                            غير معتمد
                                            @endif
                                        </td>

                                        <td>{{$Cash->cash_receipt_note}}</td>
                                        <td>{{$Cash->cash_amount}}</td>
                                        <td>
                                            <div class="product-buttons">
											<a href="{{url("/Cash/Sales/View/$Cash->id")}}" title="View" class="pd-setting-ed btn btn-tools"><i class="fa fa-file" aria-hidden="true"></i></a>
                                            <a href="{{url("/Cash/Sales/Edit/$Cash->id")}}" title="Edit" class="pd-setting-ed btn btn-tools"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#del{{$Cash->id}}" title="Trash" class="pd-setting-ed btn btn-tools"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
@foreach ($cash_sales as $cash_modal)
    <!--Delete-->
    <div id="del{{$cash_modal->id}}" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header header-color-modal bg-color-2">
						<h4 class="modal-title" style="text-align:right">حذف بيانات مقبوضات نقدية</h4>
						<div class="modal-close-area modal-close-df">
							<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
						</div>
					</div>
					<div class="modal-body">
						<span class="educate-icon educate-danger modal-check-pro information-icon-pro"> </span>
						<h2>{{$Company->company_official_name}}</h2>
						<h2>مقبوضات نقدية</h2>
						<h4>هل تريد حذف بيانات مقبوضات نقدية ؟  </h4>
					</div>
					<div class="modal-footer info-md">
						<a data-dismiss="modal" href="#">إلغــاء</a>
						<a href="{{url("/Cash/Sales/$cash_modal->id/Delete")}}">حـذف</a>
					</div>
				</div>
			</div>
		</div>
		<!--/Delete-->
@endforeach
        <!--/Modal-->

        @endsection
