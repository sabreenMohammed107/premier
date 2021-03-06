@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
@if(str_replace('_', '-', app()->getLocale())=='ar')
	<li>
    <a href="{{url('/')}}">{{ __('titles.home') }}<span class="bread-slash"> / </span></a> 
	</li>
	<li>
		<span class="bread-blod"> {{ __('titles.guid_item') }}</span>
	</li>
	@else
	<li>
		<span class="bread-blod"> {{ __('titles.guid_item') }}  / </span>
	</li>

	<li>
    <a href="{{url('/')}}">{{ __('titles.home') }}</a> 
	</li>
	@endif
</ul>

@endsection
@section('style')
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
        text-align: right;
        text-indent: 10px;
    }
</style>
@endsection
@section('content')
<div class="product-status mg-b-15">
	<div class="container-fluid">
		<div class="row" >
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="product-status-wrap drp-lst dir-rtl" >
					<!-- <h4>{{ __('titles.guid_item') }} - {{ __('titles.show') }}</h4> -->
					<div class="add-product">
						<a href="{{route('guid-item.create')}}" style="direction:ltr">{{ __('titles.add') }}</a>
					</div>
					<div class="asset-inner">
						<table class="table-striped table dir-rtl" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
							<thead>
								<tr>
								<th ></th>
								
									<th>#</th>
									<th>{{ __('titles.code') }}</th>
									<th> {{ __('titles.name') }}</th>
									<th>{{ __('titles.notes') }}</th>
									<th>{{ __('titles.options') }}</th>
								</tr>
							</thead>
							<tbody>

								@foreach($rows as $index => $row)
								<tr>
								<td></td>
									<td>{{$index+1}}</td>
									<td>{{$row->guided_item_code}}</td>
									<td>{{$row->guided_item_name}}</td>

									<td>{{$row->notes}}</td>
									<td>
										<div class="product-buttons">
											<a data-toggle="tooltip" title="View" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true" data-toggle="modal" data-target="#vw{{$row->id}}"></i></a>
											<a data-toggle="tooltip" title="Edit" href="{{ route('guid-item.edit',$row->id) }}" class="btn pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											<a data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true" data-toggle="modal" data-target="#del{{$row->id}}"></i></a>
										</div>
									</td>
								</tr>
								<!--Delete Customer-->
								<div id="del{{$row->id}}" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header header-color-modal bg-color-2">
												<h4 class="modal-title dir-rtl" >{{ __('titles.delete_data') }}</h4>
												<div class="modal-close-area modal-close-df">
													<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
												</div>
											</div>
											<div class="modal-body">
												<span class="educate-icon educate-danger modal-check-pro information-icon-pro"> </span>
												<h2>{{$row->guided_item_name}}</h2>
												<h4>{{ __('titles.delete_data_qest') }} </h4>
											</div>
											<div class="modal-footer info-md">
												<a data-dismiss="modal" href="#">{{ __('titles.cancel') }}</a>
												<form id="delete" style="display: inline;" action="{{ route('guid-item.destroy', $row->id) }}" method="POST">
													@csrf
													@method('DELETE')
													<button type="submit">{{ __('titles.delete') }}</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!--/Delete Customer-->
								<!--Edit Customer-->
								<div id="vw{{$row->id}}" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header header-color-modal bg-color-2">
												<h4 class="modal-title" style="text-align:right">{{ __('titles.show') }}</h4>
												<div class="modal-close-area modal-close-df">
													<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
												</div>
											</div>
											<div class="modal-body">

												<span class="educate-icon educate-warning modal-check-pro information-icon-pro"> </span>
												<h2>{{$row->guided_item_name}}</h2>
												<div class="message-content dir-rtl" >
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<div class="review-content-section">
															<div id="dropzone1" class="pro-ad addcoursepro">
																<form action="" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
																	<div class="row">
																		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="direction:rtl">
																			<div class="form-group">
																				<label class="">{{ __('titles.code') }}</label>
																				<input name="" value="{{$row->guided_item_code}}" readonly type="text" class="form-control" placeholder="{{ __('titles.code') }}">
																			</div>
																			<div class="form-group">
																				<label class="">{{ __('titles.name') }}</label>
																				<input name="" value="{{$row->guided_item_name}}" readonly type="text" class="form-control" placeholder="{{ __('titles.name') }}">
																			</div>
																			<div class="form-group">
																				<label class="">{{ __('titles.notes') }}</label>
																				<textarea name="" placeholder="{{ __('titles.notes') }}" readonly style="max-height:100px">{{$row->notes}}</textarea>
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
												<a data-dismiss="modal" href="#">{{ __('titles.cancel') }}</a>
											</div>
										</div>
									</div>
								</div>
								<!--/Edit Customer-->
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




@endsection