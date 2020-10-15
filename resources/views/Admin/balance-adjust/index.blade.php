@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
	<li>
		<a href="#"></a> الرئيسية<span class="bread-slash"> / </span>
	</li>
	<li>
		<span class="bread-blod"> تسوية رصيد</span>
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
					<form action="{{route('balance-adjust.store')}}" method="POST" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
						@csrf
						<div class="sparkline13-hd">
							<div class="main-sparkline13-hd">
								<button class="btn btn-primary waves-effect waves-light">حــفـظ</button>
								<h1 style="direction:rtl">تسوية رصيد</h1><br />
							</div>
						</div>
						<div class="sparkline13-graph">
							<div class="datatable-dashv1-list custom-datatable-overright" style="direction:rtl">
								<div class="form-group-inner" style="margin-right:10px;">
									<div class="row" style="text-align:right !important;direction:rtl !important">
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 shadow">
											<div class="row">
												<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
													<select data-placeholder="Choose a Company..." class="dynamic chosen-select " tabindex="-1" id="compid">
														<option value=""> الشركة</option>
														@foreach($companies as $company)
														<option value="{{$company->id}}">{{$company->company_official_name}}</option>

														@endforeach
													</select>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
													<div class="input-mask-title">
														<label><b>الشركة</b></label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
													<div class="input-mark-inner mg-b-22">
														<input type="date" name="transaction_date" class="form-control" placeholder="">
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
													<div class="input-mask-title">
														<label><b>التاريخ</b></label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
													<div class="bt-df-checkbox">
														<input class="radio-checked" type="radio" checked="" value="101" id="optionsRadios1" name="optionsRadios1">
														<label><b> موردين </b></label>
														<input class="" type="radio" value="100" id="optionsRadios2" name="optionsRadios1">
														<label><b> عملاء </b></label>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
													<label class="login2">النوع</label>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
													<select data-placeholder="Choose a supplier..." name="person_id"  onchange="getSelect()" class="form-control" id="sub" tabindex="-1">
														<option value="">المورد</option>

													</select>


												</div>
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
													<div class="input-mask-title">
														<label><b>الإسم</b></label>
													</div>
												</div>
											</div>
											<div class="row" style="margin-top:5px;">
												<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
													<div class="input-mark-inner mg-b-22">
														<input type="text" readonly  id="currentBalance" name="currentBalance" class="form-control" placeholder="">
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
													<div class="input-mask-title">
														<label><b>الرصيد الحالى</b></label>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
													<div class="bt-df-checkbox">
														<input class="radio-checked" type="radio" value="10" id="optionsRadios1" name="additv">
														<label><b> زيادة </b></label>
														<input class="" type="radio" checked="" value="20" id="optionsRadios2" name="additv">
														<label><b> عجز </b></label>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
													<label class="login2">النوع</label>
												</div>
											</div>
											<div class="row" style="margin-top:5px;">
												<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
													<div class="input-mark-inner mg-b-22">
														<input type="number" name="amount" class="form-control" placeholder="">
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
													<div class="input-mask-title">
														<label><b>مبلغ التسوية</b></label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
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

		$('.dynamic').change(function() {

			if ($(this).val() != '') {
				var select = $(this).attr("id");
				var value = $(this).val();
				var person_id=$('input[name=optionsRadios1]:checked').val();
				$.ajax({
					url: "{{route('dynamicPersonComp.fetch')}}",
					method: "get",
					data: {
						value: value,
						person_id: person_id,
					},
					success: function(result) {

						//  $('#sub').select2('destroy');
						$('#sub').html(result);
						$('#sub').select2();

					}

				})
			}
		});

		$('input[type=radio][name=optionsRadios1]').change(function() {
			var compid = $('#compid').val();
			var url = "";
			if (this.value == '101') {
				$.ajax({
					url: "{{route('dynamicPerson.fetch')}}",
					method: "get",
					data: {
						value: compid,
					},
					success: function(result) {

						//  $('#sub').select2('destroy');
						$('#sub').html(result);
						$('#sub').select2();

					}

				})
			} else if (this.value == '100') {
				$.ajax({
					url: "{{route('dynamicClient.fetch')}}",
					method: "get",
					data: {
						value: compid,
					},
					success: function(result) {

						$('#sub').html(result);
						$('#sub').select2();

					}

				})
			}

		});
	});
	function getSelect(){
		var person=$('#sub').val();
		var type=$('input[type=radio][name=optionsRadios1]').val();
		$.ajax({
					url: "{{route('getCurrentBalance.fetch')}}",
					method: "get",
					data: {
						person: person,
						type:type
					},
					success: function(result) {
						$('#currentBalance').val(result);

					}

				})

	}
</script>

@endsection