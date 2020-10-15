@extends('Layout.company')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="{{url('/Company')}}">الرئيسية</a> <span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> كشف الموردين </span>
    </li>
</ul>
@endsection

@section('content')

<div class="product-status mg-b-15">
    <div class="container-fluid">
        <a href="{{ url("/Company/Suppliers/Add") }}" class="btn btn-primary waves-effect waves-light mg-b-15">إضافة مورد</a>
        <div class="row"style="direction:rtl;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>كشف الموردين</h4>
                    <div class="asset-inner">
                        <table id="example" class="display responsive nowrap" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>صوره</th>
									<th>الاسم</th>
									<th>الهاتف</th>
									<th>الحاله</th>
									<th>الرصيد الافتتاحي</th>
									<th>تاريخ بداية الترصيد</th>
									<th>الخيارات</th>
								</tr>
							</thead>

                                @foreach ($Suppliers as $i => $Supplier)
                                <tr>
                                <td>{{++$i}}</td>
                                <td>
                                    @isset($Supplier->person_logo)
                                        <img src="{{ asset("/uploads/person/$Supplier->person_logo") }}" alt="{{$Supplier->person_name}}" title="{{$Supplier->person_name}}" />
                                    @endisset
                                </td>
                                <td>{{$Supplier->person_name}}</td>
                                <td>{{$Supplier->phone1}}</td>
                                <td>
                                    @if($Supplier->active == 1)
                                        <button class="pd-setting">مـفعـل</button>
                                    @else
                                        <button class="ds-setting">متوقف</button>
                                    @endif

                                </td>
                                <td>{{$Supplier->open_balance}}</td>
                                <td>{{$Supplier->balance_start_date}}</td>
                                <td>
                                    <div class="product-buttons">
                                        <a href="{{ url("/Company/Suppliers/$Supplier->id/View")}}" title="View" class="pd-setting-ed btn btn-primary"><i class="fa fa-file" aria-hidden="true"></i></a>
                                        <a href="{{ url("/Company/Suppliers/$Supplier->id/Edit")}}" title="Edit" class="pd-setting-ed btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#Del{{$Supplier->id}}" title="Trash" class="pd-setting-ed btn btn-primary"><i class="fa fa-trash-o" aria-hidden="true" ></i></a>
                                    </div>
                                </td>
                            </tr>
                                @endforeach


                        </table>
                    </div>
                    {{-- <div class="custom-pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">التالي</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">السابق</a></li>
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
@foreach ($Suppliers as $SupplierModal)
<div id="Del{{$SupplierModal->id}}" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title" style="text-align:right">حذف بيانات المورد</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-danger modal-check-pro information-icon-pro"> </span>
                <h2>{{$SupplierModal->person_name}}</h2>
                <h4>هل تريد حذف جميع بيانات متضمنه كل الحركات الماليه من مدفوعات و مصروفات المورد ؟  </h4>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">إلغــاء</a>
            <a href="{{ url("/Company/Supplier/$SupplierModal->id/Delete")}}">حـذف</a>
            </div>
        </div>
    </div>
</div>
@endforeach

        <!--/Modal-->

        @endsection
