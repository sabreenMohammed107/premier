@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
	<li>
		<a href="#"></a> الرئيسية<span class="bread-slash"> / </span>
	</li>
	<li>
		<span class="bread-blod"> كشف المستخدمين </span>
	</li>
</ul>

@endsection

@section('content')
<div class="product-status mg-b-15">
	<div class="container-fluid">
		<div class="row" style="direction:rtl;">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="product-status-wrap drp-lst">
					<h4>كشف المستخدمين</h4>
					<div class="add-product">
						<a href="{{route('users.create')}}" style="direction:ltr">إضافة مستخدم</a>
					</div>
					<div class="asset-inner">
						<table id="example" class="display responsive nowrap" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>الشركة</th>
									<th>إسم المستخدم</th>
									<th>الحالة</th>
									<th>الصلاحية</th>
									<th>خيارات</th>
								</tr>
							</thead>
							<tbody>

								@foreach($rows as $index => $row)
								<tr>
									<td>{{$index+1}}</td>
									<td>{{$row->company[0]->company_official_name ?? ''}}</td>
									<td>{{$row->user_name}}</td>
									<td>
										@if($row->active==1)
										<button class="pd-setting">مـفعـل</button>

										@else
										<button class="ds-setting">متوقف</button>

										@endif
									</td>
									<td>{{$row->role->role_name}}</td>
									<td>
										<div class="product-buttons">
											<a data-toggle="tooltip" title="View" href="{{ route('users.show',$row->id) }}" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true"></i></a>
											<a data-toggle="tooltip" title="Edit" href="{{ route('users.edit',$row->id) }}" class="btn pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											<a data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="modal" data-target="#del{{$row->id}}"></i></a>
										</div>
									</td>
								</tr>
								<!--Delete Customer-->
								<div id="del{{$row->id}}" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header header-color-modal bg-color-2">
												<h4 class="modal-title" style="text-align:right">حذف بيانات المستخدم</h4>
												<div class="modal-close-area modal-close-df">
													<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
												</div>
											</div>
											<div class="modal-body">
												<span class="educate-icon educate-danger modal-check-pro information-icon-pro"> </span>
												<h2>{{$row->company[0]->company_official_name ?? ''}}</h2>
												<h2>{{$row->user_name}}</h2>
												<h4>هل تريد حذف جميع بيانات المستخدم ؟ </h4>
											</div>
											<div class="modal-footer info-md">
												<a data-dismiss="modal" href="#">إلغــاء</a>
												<form id="delete" style="display: inline;" action="{{ route('users.destroy', $row->id) }}" method="POST">
													@csrf
													@method('DELETE')
													<input type="hidden" name="deleteCompany" value="{{$row->company[0]->id ?? '0'}}" />
													<button type="submit">حذف</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!--/Delete Customer-->
								@endforeach
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('modal')


<!--View-->
<div id="vw" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header header-color-modal bg-color-2">
				<h4 class="modal-title" style="text-align:right">عرض بيانات المستخدم</h4>
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
				</div>
			</div>
			<div class="modal-body">
				<span class="educate-icon educate-info modal-check-pro information-icon-pro"> </span>
				<h2>شركة تكنوكيم لتجارة وتوريد الكيماويات</h2>
				<h4>شركة مساهمة مصرية</h4>
				<br />
				<div class="message-content" style="text-align:right">
					<table class="table table-bordered table-edu">
						<thead>
							<tr>
								<th COLSPAN="2" class="code-edu-center" style="text-align:center">بيانات المستخدم</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<span>شركة تكنوكيم لتجارة وتوريد الكيماويات</span>
								</td>
								<td class="code-edu-center">
									<span class="pie"><b>الشركة</b></span>
								</td>
							</tr>
							<tr>
								<td>
									<span> محمد عبد الرحمن</span>
								</td>
								<td class="code-edu-center">
									<span class="pie"><b>المستخدم</b></span>
								</td>
							</tr>
							<tr>
								<td>
									<span>أمين المخزن</span>
								</td>-
								<td class="code-edu-center">
									<span class="pie"><b>الصلاحية</b></span>
								</td>
							</tr>
							<tr>
								<td>
									<span>---</span>
								</td>
								<td class="code-edu-center">
									<span class="pie"><b>ملاحظات</b></span>
								</td>
							</tr>
							<tr>
								<td>
									<span>010123456789</span>
								</td>
								<td class="code-edu-center">
									<span class="pie"><b>موبايل </b></span>
								</td>
							</tr>

						</tbody>
					</table>
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

@endsection