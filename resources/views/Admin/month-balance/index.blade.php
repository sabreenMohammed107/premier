@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
	<li>
		<a href="#"></a> الرئيسية<span class="bread-slash"> / </span>
	</li>
	<li>
		<span class="bread-blod">  الترصيد الشهري</span>
	</li>
</ul>

@endsection

@section('content')
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="mg-b-23">
							<div class="">
								<!-- <button class="btn btn-primary waves-effect waves-light" href="{{ route('month-balance') }}">رجــوع</button> -->
								<!-- <button class="btn btn-primary waves-effect waves-light">حــفـظ</button> -->
							</div>
						</div>
						<div class="sparkline13-list">
							<div class="sparkline13-hd">
								<div class="main-sparkline13-hd">
									<h1 style="direction:rtl">الترصيد الشهري</h1><br />
								</div>
							</div>
							<div class="sparkline13-graph">
								<div class="datatable-dashv1-list custom-datatable-overright">
									<div class="form-group-inner" style="margin-right:10px;">
										<div class="row res-rtl" style="display: flex ;flex-direction: row-reverse ;">
											<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 mg-b-15" style="direction:rtl">
												<div class="row" style="margin-top:5px;">
													<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
													<select data-placeholder="Choose a Company..." class="dynamic chosen-select " tabindex="-1" id="compid">
														<option value=""> الشركة</option>
														@foreach($companies as $company)
														<option value="{{$company->id}}">{{$company->company_official_name}}</option>

														@endforeach
													</select>
													</div>
													<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
														<div class="input-mask-title">
															<label><b style="font-size:20px">الشركة</b></label>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
				<div id="tableData">
                    @include('Admin.month-balance.tableData')
                </div>
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

		$('.dynamic').change(function() {

			if ($(this).val() != '') {
				var select = $(this).attr("id");
                var value = $(this).val();
             
				$.ajax({
					url: "{{route('dynamicMonth.fetch')}}",
					method: "get",
					data: {
						value: value,
					},
					success: function(result) {
                 
                    
						$('#tableData').html(result);
					

					}

				})
			}
		});
    });
    function closeMonth(id){
      
        $.ajax({
					url: "{{route('dynamicMonthClose.fetch')}}",
					method: "get",
					data: {
						id: id,
					},
					success: function(result) {
                 
                    
						$('#tableData').html(result);
					

					}

				})
    }
    function openMonth(id){
      
        $.ajax({
					url: "{{route('dynamicMonthOpen.fetch')}}",
					method: "get",
					data: {
						id: id,
					},
					success: function(result) {
                 
                    
						$('#tableData').html(result);
					

					}

				})
    }
</script>
@endsection
