@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
											<li>
												<a href="#"></a> الرئيسية<span class="bread-slash"> / </span>
											</li>
											<li>
												<span class="bread-blod"> عرض الشركات</span>
											</li>
										</ul>

@endsection

@section('content')
<div class="courses-area">
			<div class="container-fluid">
				<button class="btn btn-primary waves-effect waves-light mg-b-15" data-toggle="modal" data-target="#add">إضافة شركة</button>
				<div class="row mg-b-15">
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="courses-inner res-mg-b-30">
							<div class="courses-title">
								<a href="#"><img src="{{ asset('webassets/img/companies/01.jpg')}}" alt=""></a>
								<h2>عباد المعين</h2>
							</div>
							<div class="course-des">
								<p><span><i class="fa fa-clock"></i></span> <b>رقم التسجيل:</b> 151-541-848</p>
								<p><span><i class="fa fa-clock"></i></span> <b>مأموريه الضرائب:</b> العمرانية</p>
								<p><span><i class="fa fa-clock"></i></span> <b>الكيان القانونى:</b> فردي</p>
								<p><span><i class="fa fa-clock"></i></span> <b>مفعل:</b><i class="fa fa-check"></i></p>
							</div>
							<div class="product-buttons">
								<button data-toggle="tooltip" title="View" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true"></i></button>
								<button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"data-toggle="modal" data-target="#Com1"></i></button>
								<button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"data-toggle="modal" data-target="#Del1"></i></button>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="courses-inner res-mg-b-30">
							<div class="courses-title">
								<a href="#"><img src="{{ asset('webassets/img/companies/02.jpg')}}" alt=""></a>
								<h2>ارت شادو</h2>
							</div>
							<div class="course-des">
								<p><span><i class="fa fa-clock"></i></span> <b>رقم التسجيل:</b> 151-541-848</p>
								<p><span><i class="fa fa-clock"></i></span> <b>مأموريه الضرائب:</b> العمرانية</p>
								<p><span><i class="fa fa-clock"></i></span> <b>الكيان القانونى:</b> فردي</p>
								<p><span><i class="fa fa-clock"></i></span> <b>مفعل:</b><i class="fa fa-check"></i></p>
							</div>
							<div class="product-buttons">
								<button data-toggle="tooltip" title="View" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true"></i></button>
								<button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"data-toggle="modal" data-target="#Com1"></i></button>
								<button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"data-toggle="modal" data-target="#Del1"></i></button>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="courses-inner res-mg-b-30">
							<div class="courses-title">
								<a href="#"><img src="{{ asset('webassets/img/companies/03.jpg')}}" alt=""></a>
								<h2>وينرز مدكور</h2>
							</div>
							<div class="course-des">
								<p><span><i class="fa fa-clock"></i></span> <b>رقم التسجيل:</b> 151-541-848</p>
								<p><span><i class="fa fa-clock"></i></span> <b>مأموريه الضرائب:</b> العمرانية</p>
								<p><span><i class="fa fa-clock"></i></span> <b>الكيان القانونى:</b> فردي</p>
								<p><span><i class="fa fa-clock"></i></span> <b>مفعل:</b><i class="fa fa-close"></i></p>
							</div>
							<div class="product-buttons">
								<button data-toggle="tooltip" title="View" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true"></i></button>
								<button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"data-toggle="modal" data-target="#Com1"></i></button>
								<button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"data-toggle="modal" data-target="#Del1"></i></button>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="courses-inner res-mg-b-30">
							<div class="courses-title">
								<a href="#"><img src="{{ asset('webassets/img/companies/04.jpg')}}" alt=""></a>
								<h2>وينرز اكتوبر</h2>
							</div>
							<div class="course-des">
								<p><span><i class="fa fa-clock"></i></span> <b>رقم التسجيل:</b> 151-541-848</p>
								<p><span><i class="fa fa-clock"></i></span> <b>مأموريه الضرائب:</b> العمرانية</p>
								<p><span><i class="fa fa-clock"></i></span> <b>الكيان القانونى:</b> فردي</p>
								<p><span><i class="fa fa-clock"></i></span> <b>مفعل:</b><i class="fa fa-check"></i></p>
							</div>
							<div class="product-buttons">
								<button data-toggle="tooltip" title="View" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true"></i></button>
								<button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"data-toggle="modal" data-target="#Com1"></i></button>
								<button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"data-toggle="modal" data-target="#Del1"></i></button>
							</div>
						</div>
					</div>
				</div>
				<div class="row mg-b-15">
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="courses-inner res-mg-b-30">
							<div class="courses-title">
								<a href="#"><img src="{{ asset('webassets/img/companies/04.jpg')}}" alt=""></a>
								<h2>شركة انترنايل</h2>
							</div>
							<div class="course-des">
								<p><span><i class="fa fa-clock"></i></span> <b>رقم التسجيل:</b> 151-541-848</p>
								<p><span><i class="fa fa-clock"></i></span> <b>مأموريه الضرائب:</b> العمرانية</p>
								<p><span><i class="fa fa-clock"></i></span> <b>الكيان القانونى:</b> فردي</p>
								<p><span><i class="fa fa-clock"></i></span> <b>مفعل:</b><i class="fa fa-close"></i></p>
							</div>
							<div class="product-buttons">
								<button data-toggle="tooltip" title="View" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true"></i></button>
								<button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"data-toggle="modal" data-target="#Com1"></i></button>
								<button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"data-toggle="modal" data-target="#Del1"></i></button>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="courses-inner res-mg-b-30">
							<div class="courses-title">
								<a href="#"><img src="{{ asset('webassets/img/companies/03.jpg')}}" alt=""></a>
								<h2>ثينك تكنولوجي</h2>
							</div>
							<div class="course-des">
								<p><span><i class="fa fa-clock"></i></span> <b>رقم التسجيل:</b> 151-541-848</p>
								<p><span><i class="fa fa-clock"></i></span> <b>مأموريه الضرائب:</b> العمرانية</p>
								<p><span><i class="fa fa-clock"></i></span> <b>الكيان القانونى:</b> فردي</p>
								<p><span><i class="fa fa-clock"></i></span> <b>مفعل:</b><i class="fa fa-check"></i></p>
							</div>
							<div class="product-buttons">
								<button data-toggle="tooltip" title="View" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true"></i></button>
								<button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"data-toggle="modal" data-target="#Com1"></i></button>
								<button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"data-toggle="modal" data-target="#Del1"></i></button>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="courses-inner res-mg-b-30">
							<div class="courses-title">
								<a href="#"><img src="{{ asset('webassets/img/companies/02.jpg')}}" alt=""></a>
								<h2>انتربلوك النميسى</h2>
							</div>
							<div class="course-des">
								<p><span><i class="fa fa-clock"></i></span> <b>رقم التسجيل:</b> 151-541-848</p>
								<p><span><i class="fa fa-clock"></i></span> <b>مأموريه الضرائب:</b> العمرانية</p>
								<p><span><i class="fa fa-clock"></i></span> <b>الكيان القانونى:</b> فردي</p>
								<p><span><i class="fa fa-clock"></i></span> <b>مفعل:</b><i class="fa fa-check"></i></p>
							</div>
							<div class="product-buttons">
								<button data-toggle="tooltip" title="View" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true"></i></button>
								<button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"data-toggle="modal" data-target="#Com1"></i></button>
								<button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"data-toggle="modal" data-target="#Del1"></i></button>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="courses-inner res-mg-b-30">
							<div class="courses-title">
								<a href="#"><img src="{{ asset('webassets/img/companies/01.jpg')}}" alt=""></a>
								<h2>شركة بيولا</h2>
							</div>
							<div class="course-des">
								<p><span><i class="fa fa-clock"></i></span> <b>رقم التسجيل:</b> 151-541-848</p>
								<p><span><i class="fa fa-clock"></i></span> <b>مأموريه الضرائب:</b> العمرانية</p>
								<p><span><i class="fa fa-clock"></i></span> <b>الكيان القانونى:</b> فردي</p>
								<p><span><i class="fa fa-clock"></i></span> <b>مفعل:</b><i class="fa fa-check"></i></p>
							</div>
							<div class="product-buttons">
								<button data-toggle="tooltip" title="View" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true"></i></button>
								<button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"data-toggle="modal" data-target="#Com1"></i></button>
								<button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"data-toggle="modal" data-target="#Del1"></i></button>
							</div>
						</div>
					</div>
				</div>
				<div class="custom-pagination mg-b-15">
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
        
        @endsection