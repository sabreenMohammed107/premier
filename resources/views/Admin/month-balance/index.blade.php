@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">

    @if(str_replace('_', '-', app()->getLocale())=='ar')
    <li>
        <a href="#"></a>  {{ __('titles.home') }} <span class="bread-slash"> / </span>
    </li>
	<li>
		<span class="bread-blod"> {{ __('titles.month_balance') }}</span>
	</li>
	@else
   
   
	<li>
		<span class="bread-blod"> {{ __('titles.month_balance') }}</span>
	</li>
    <li>
        <a href="#"></a>  {{ __('titles.home') }}
    </li>
   
	@endif
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
								<div class="main-sparkline13-hd dir-rtl">
									<h1 >{{ __('titles.month_balance') }}</h1><br />
								</div>
							</div>
							<div class="sparkline13-graph">
								<div class="datatable-dashv1-list custom-datatable-overright">
									<div class="form-group-inner" style="margin-right:10px;">
										<div class="row row-ltr" >
										<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"></div>
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 dir-rtl">
												<div class="row row-ltr" style="margin-top:5px;">
													<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
													<select data-placeholder="Choose a Company..." class="dynamic chosen-select " tabindex="-1" id="compid">
														<option value=""> {{ __('titles.select') }}</option>
														@foreach($companies as $company)
														<option value="{{$company->id}}">{{$company->company_official_name}}</option>

														@endforeach
													</select>
													</div>
													<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
														<div class="input-mask-title">
															<label><b style="font-size:20px">{{ __('titles.company') }}</b></label>
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
