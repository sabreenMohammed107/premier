@extends('Layout.company')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> {{ __('titles.company') }}<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> {{ __('titles.cheques') }}  </span>
    </li>
</ul>

@endsection

@section('content')
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="mg-b-15">
        <a href="{{url('/Cheques/Add')}}" class="btn btn-primary waves-effect waves-light">{{ __('titles.add') }}</a>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd dir-rtl">
                            <h1 >{{ __('titles.cheques') }}</h1>
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
                                        <th>#</th>
                                        <th>{{__('titles.cheque_no')}}</th>
                                        <th>{{__('titles.cheque_nu')}}</th>
                                        <th>{{__('titles.amount')}}</th>
                                        <th>{{__('titles.type')}}</th>
                                        <th>{{__('titles.person')}}</th>
                                        <th>{{__('titles.name')}}</th>
                                        <th>{{__('titles.options')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Cheques as $i => $Cheque)
                                        @php
                                               if($Cheque->person_id == true){
                                                    $Person = $Cheque->person;
                                                    $PersonType = $Person->person_type;
                                                    $person_type_name = $PersonType->person_type_name;
                                               }else{
                                                    $person_type_name = __('titles.cash_box');
                                               }
                                        @endphp
                                        <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$Cheque->cheque_no}}</td>
                                        <td>{{$Cheque->cheque_serial}}</td>
                                        <td>{{$Cheque->amount}}</td>
                                        <td>
                                        @if ($Cheque->trans_type == 0)
                                        {{__('titles.purchasing')}}
                                        @else
                                        {{__('titles.sale_bills')}}
                                        @endif
                                        </td>
                                        <td>{{$person_type_name}}</td>
                                        <td>{{$Cheque->person_name ??  __('titles.cash_box')}}</td>
                                        <td>
                                            <div class="product-buttons">
                                                <a href="{{url("/Cheques/$Cheque->id/View")}}" title="View" class="pd-setting-ed btn btn-tools"><i class="fa fa-file" aria-hidden="true"></i></a>
                                                <a href="{{url("/Cheques/$Cheque->id/Edit")}}" title="Edit" class="pd-setting-ed btn btn-tools"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#del{{$Cheque->id}}" title="Trash" class="pd-setting-ed btn btn-tools"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
@foreach ($Cheques as $ChequeModal)
<!--Delete-->
<div id="del{{$ChequeModal->id}}" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
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
                <h2>{{$Company->company_official_name}}</h2>
                <h2>{{ __('titles.cheques') }}</h2>
                <h4>{{ __('titles.delete_data_qest') }}</h4>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">{{ __('titles.cancel') }}</a>
                <a href="{{url("/Cheques/$ChequeModal->id/Delete")}}">{{ __('titles.delete') }}</a>
            </div>
        </div>
    </div>
</div>
<!--/Delete-->
@endforeach
        <!--/Modal-->

        @endsection
