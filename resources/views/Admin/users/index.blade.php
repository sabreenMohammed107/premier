@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">

@if(str_replace('_', '-', app()->getLocale())=='ar')
    <li>
        <a href="#"></a>  {{ __('titles.home') }} <span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> {{ __('titles.users') }}</span>
    </li>
	@else
   
    <li>
        <span class="bread-blod"> {{ __('titles.users') }}</span>
    </li>
    <li>
        <a href="#"></a>  {{ __('titles.home') }}
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

    
</style>
@endsection
@section('content')
<div class="product-status mg-b-15">
	<div class="container-fluid">
		<div class="row" >
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="product-status-wrap drp-lst dir-rtl">
					<h4>{{ __('titles.users') }}</h4>
					<div class="add-product dir-rtl">
						<a href="{{route('users.create')}}" >{{ __('titles.add') }}</a>
					</div>
					<div class="asset-inner">
					<table class="table-striped table dir-rtl" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
							<thead>
								<tr>
								<th ></th>
								
									<th>#</th>
									<th>{{ __('titles.company') }}</th>
									<th>{{ __('titles.name') }}</th>
									<th>{{ __('titles.status') }}</th>
									<th>{{ __('titles.previlidge') }}</th>
									<th>{{ __('titles.options') }}</th>
								</tr>
							</thead>
							<tbody align="center">

								@foreach($rows as $index => $row)
								<tr>
								<td></td>
									<td>{{$index+1}}</td>
									<td>{{$row->company[0]->company_official_name ?? ''}}</td>
									<td>{{$row->user_name}}</td>
									<td>
										@if($row->active==1)
										<button class="pd-setting">{{ __('titles.active') }}</button>

										@else
										<button class="ds-setting">{{ __('titles.not_active') }}</button>

										@endif
									</td>
									<td>{{$row->role->role_name ?? ''}}</td>
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
											<div class="modal-header header-color-modal bg-color-2 dir-rtl">
												<h4 class="modal-title" >{{ __('titles.delete_data') }}</h4>
												<div class="modal-close-area modal-close-df">
													<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
												</div>
											</div>
											<div class="modal-body">
												<span class="educate-icon educate-danger modal-check-pro information-icon-pro"> </span>
												<h2>{{$row->company[0]->company_official_name ?? ''}}</h2>
												<h2>{{$row->user_name}}</h2>
												<h4>{{ __('titles.delete_data_qest') }} </h4>
											</div>
											<div class="modal-footer info-md">
												<a data-dismiss="modal" href="#">{{ __('titles.cancel') }}</a>
												<form id="delete" style="display: inline;" action="{{ route('users.destroy', $row->id) }}" method="POST">
													@csrf
													@method('DELETE')
													<input type="hidden" name="deleteCompany" value="{{$row->company[0]->id ?? '0'}}" />
													<button type="submit">{{ __('titles.delete') }}</button>
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




@endsection