@extends('Layout.company')



@section('crumb')

<ul class="breadcome-menu dir-rtl">
<li>
        <span class="bread-blod"> {{ __('titles.supplier_statment') }}</span> <span class="bread-slash"> / </span>
    </li>
    <li>
        <a href="{{url('/Company')}}"> {{ __('titles.company') }}</a><span class="bread-slash"> / </span>
    </li>
    

    <li>
</ul>
@endsection

@section('content')

<div class="product-status mg-b-15">
    <div class="container-fluid">
        <a href="{{ url("/Company/Suppliers/Add") }}" class="btn btn-primary waves-effect waves-light mg-b-15">{{ __('titles.add') }}</a>
        <div class="row dir-rtl">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>{{ __('titles.supplier_statment') }}</h4>
                    <div class="datatable-dashv1-list custom-datatable-overright dir-rtl" >
                        <table class="table-striped" id="table"
                                    data-toggle="table"
                                    data-pagination="true"
                                    data-pagination-pre-text="{{ __('titles.prev') }}"
                                    data-pagination-next-text="{{ __('titles.next') }}"
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
									<th data-sortable="true">#</th>
									<th data-sortable="true">{{ __('titles.image') }}</th>
									<th data-sortable="true">{{ __('titles.name') }}</th>
									<th data-sortable="true">{{ __('titles.phone') }}</th>
									<th data-sortable="true">{{ __('titles.open_blance_amount') }}</th>
									<th data-sortable="true">{{ __('titles.active') }}</th>
									<th data-sortable="true">{{ __('titles.options') }}</th>
								</tr>
							</thead>

                                @foreach ($SupplierTrans as $i => $Supplier)
                                <tr>
                                <td>{{++$i}}</td>
                                <td>
                                    @isset($Supplier->person_logo)
                                        <img src="{{ asset("/uploads/person/$Supplier->person_logo") }}" alt="{{$Supplier->person_name}}" title="{{$Supplier->person_name}}" />
                                    @endisset
                                </td>
                                <td>{{$Supplier->person_name}}</td>
                                <td>{{$Supplier->phone1}}</td>
                                <td>{{$Supplier->current}}</td>
                                <td>
                                    @if($Supplier->active == 1)
                                        <button class="pd-setting">{{ __('titles.active') }}</button>
                                    @else
                                        <button class="ds-setting">{{ __('titles.not_active') }}</button>
                                    @endif

                                </td>
                                <td>
                                    <div class="product-buttons">
                                        <a href="{{ url("/Company/Suppliers/$Supplier->id/View")}}" title="View" class="pd-setting-ed btn btn-primary"><i class="fa fa-file" style="color:#fff;" aria-hidden="true"></i></a>
                                        <a href="{{ url("/Company/Suppliers/$Supplier->id/Edit")}}" title="Edit" class="pd-setting-ed btn btn-primary"><i class="fa fa-pencil-square-o" style="color:#fff;" aria-hidden="true"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#Del{{$Supplier->id}}" title="Trash" class="pd-setting-ed btn btn-primary"><i class="fa fa-trash-o" style="color:#fff;" aria-hidden="true" ></i></a>
                                    </div>
                                </td>
                            </tr>
                                @endforeach


                        </table>
                    </div>
                    {{-- <div class="custom-pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">{{ __('titles.next') }}</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">{{ __('titles.prev') }}</a></li>
                            </ul>
                        </nav>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<!--Modal-->
@foreach ($SupplierTrans as $SupplierModal)
<div id="Del{{$SupplierModal->id}}" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title" style="text-align:right">{{ __('titles.delete_data') }}</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-danger modal-check-pro information-icon-pro"> </span>
                <h2>{{$SupplierModal->person_name}}</h2>
                <h4>{{ __('titles.delete_data_qest') }} </h4>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">{{ __('titles.cancel') }}</a>
            <a href="{{ url("/Company/Supplier/$SupplierModal->id/Delete")}}">{{ __('titles.delete') }}</a>
            </div>
        </div>
    </div>
</div>
@endforeach

        <!--/Modal-->

        @endsection
