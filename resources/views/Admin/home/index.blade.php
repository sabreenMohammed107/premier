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
                <div class="row"style="direction:rtl;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4 >كشف المستخدمين</h4>
                            <div class="add-product">
                                <a href="#" style="direction:ltr">إضافة مستخدم</a>
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>#</th>
										<th>الشركة</th>
										<th>إسم المستخدم</th>
                                        <th>الحالة</th>
                                        <th>الصلاحية</th>
                                        <th>خيارات</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>شركة تكنوكيم لتجارة وتوريد الكيماويات</td>
										<td>محمد عبد الرحمن</td>
                                        <td>
                                            <button class="pd-setting">مـفعـل</button>
                                        </td>
                                        <td>أمين المخزن</td>
                                        <td>
											<div class="product-buttons">
												<button data-toggle="tooltip" title="View" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true"data-toggle="modal" data-target="#vw"></i></button>
												<button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#edt"></i></button>
												<button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="modal" data-target="#del"></i></button>
											</div>
                                        </td>
                                    </tr>
									<tr>
										<td>1</td>
										<td>شركة تكنوكيم لتجارة وتوريد الكيماويات</td>
										<td>محمد عبد الرحمن</td>
										<td>
											<button class="ds-setting">متوقف</button>
										</td>
										<td>أمين المخزن</td>
										<td>
											<div class="product-buttons">
												<button data-toggle="tooltip" title="View" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true" data-toggle="modal" data-target="#vw"></i></button>
												<button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#edt"></i></button>
												<button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="modal" data-target="#del"></i></button>
											</div>
										</td>
									</tr>
									<tr>
										<td>1</td>
										<td>شركة تكنوكيم لتجارة وتوريد الكيماويات</td>
										<td>محمد عبد الرحمن</td>
										<td>
											<button class="pd-setting">مـفعـل</button>
										</td>
										<td>أمين المخزن</td>
										<td>
											<div class="product-buttons">
												<button data-toggle="tooltip" title="View" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true" data-toggle="modal" data-target="#vw"></i></button>
												<button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#edt"></i></button>
												<button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="modal" data-target="#del"></i></button>
											</div>
										</td>
									</tr>
									<tr>
										<td>1</td>
										<td>شركة تكنوكيم لتجارة وتوريد الكيماويات</td>
										<td>محمد عبد الرحمن</td>
										<td>
											<button class="ds-setting">متوقف</button>
										</td>
										<td>أمين المخزن</td>
										<td>
											<div class="product-buttons">
												<button data-toggle="tooltip" title="View" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true" data-toggle="modal" data-target="#vw"></i></button>
												<button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#edt"></i></button>
												<button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="modal" data-target="#del"></i></button>
											</div>
										</td>
									</tr>
									<tr>
										<td>1</td>
										<td>شركة تكنوكيم لتجارة وتوريد الكيماويات</td>
										<td>محمد عبد الرحمن</td>
										<td>
											<button class="pd-setting">مـفعـل</button>
										</td>
										<td>أمين المخزن</td>
										<td>
											<div class="product-buttons">
												<button data-toggle="tooltip" title="View" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true" data-toggle="modal" data-target="#vw"></i></button>
												<button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#edt"></i></button>
												<button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="modal" data-target="#del"></i></button>
											</div>
										</td>
									</tr>
									<tr>
										<td>1</td>
										<td>شركة تكنوكيم لتجارة وتوريد الكيماويات</td>
										<td>محمد عبد الرحمن</td>
										<td>
											<button class="ds-setting">متوقف</button>
										</td>
										<td>أمين المخزن</td>
										<td>
											<div class="product-buttons">
												<button data-toggle="tooltip" title="View" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true" data-toggle="modal" data-target="#vw"></i></button>
												<button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#edt"></i></button>
												<button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="modal" data-target="#del"></i></button>
											</div>
										</td>
									</tr>
                                </table>
                            </div>
                            <div class="custom-pagination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">التالي</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">السابق</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('modal')
<!--Modal-->
		<!--Edit Customer-->
		<div id="edt" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header header-color-modal bg-color-2">
						<h4 class="modal-title" style="text-align:right">تعديل بيانات المستخدم</h4>
						<div class="modal-close-area modal-close-df">
							<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
						</div>
					</div>
					<div class="modal-body">
						
						<span class="educate-icon educate-warning modal-check-pro information-icon-pro"> </span>
						<h2>شركة تكنوكيم لتجارة وتوريد الكيماويات</h2>
						<div class="message-content" style="text-align:right;">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="review-content-section">
									<div id="dropzone1" class="pro-ad addcoursepro">
										<form action="/upload" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="direction:rtl">
													<div class="form-group">
														<label>
															<input type="checkbox" class="i-checks" checked> مفعل
														</label>
													</div>
													<div class="form-group">
														<label class="">الاسم بالكامل</label>
														<input name="" type="text" class="form-control" placeholder="الاسم بالكامل">
													</div>
													<div class="form-group">
														<label class="">كلمة المرور</label>
														<input name="" type="password" class="form-control" placeholder="كلمة المرور">
													</div>
													<div class="form-group">
														<label class="">الصلاحيات</label>
														<select name="" class="form-control">
															<option value="none" selected="" disabled="">الصلاحيات</option>
															<option value="0">مراجع أول</option>
															<option value="1">مراجع عام</option>
															<option value="2">أمين مخزن</option>
														</select>
													</div>
													<div class="form-group">
														<label class="">موبايل</label>
														<input name="" type="number" class="form-control" placeholder="موبايل">
													</div>
													<div class="form-group">
														<label class="">ملاحظات</label>
														<textarea name="" placeholder="ملاحظات" style="max-height:100px"></textarea>
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
						<a href="#">حفظ التعديل</a>
					</div>
				</div>
			</div>
		</div>
		<!--/Edit Customer-->
		<!--Delete Customer-->
		<div id="del" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
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
						<h2>شركة تكنوكيم لتجارة وتوريد الكيماويات</h2>
						<h2>محمد عبد الرحمن</h2>
						<h4>هل تريد حذف جميع بيانات المستخدم ؟  </h4>
					</div>
					<div class="modal-footer info-md">
						<a data-dismiss="modal" href="#">إلغــاء</a>
						<a href="#">حـذف</a>
					</div>
				</div>
			</div>
		</div>
		<!--/Delete Customer-->
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