@extends('Layout.company')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="{{url('/Company')}}">الرئيسية</a> <span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> كشف الموظفين </span>
    </li>
</ul>
@endsection

@section('content')

<div class="product-status mg-b-15">
    <div class="container-fluid">
        <a href="{{ url("/Company/Employees/Add") }}" class="btn btn-primary waves-effect waves-light mg-b-15">إضافة موظف</a>
        <div class="row"style="direction:rtl;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>كشف الموظفين</h4>
                    <div class="datatable-dashv1-list custom-datatable-overright"style="direction:rtl" >

                        <table class="table-striped" id="table" style="text-align: left;"
                        data-toggle="table"
                        data-pagination="true"
                        data-pagination-pre-text="السابق"
                        data-pagination-next-text="التالي"
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
									<th data-field="serial"  data-sortable="true">#</th>
									<th data-field="logo"  data-sortable="true">الصورة</th>
									<th data-field="name"  data-sortable="true">الاسم</th>
									<th data-field="phone"  data-sortable="true">الهاتف</th>
									<th data-field="current"  data-sortable="true">الرصيد الحالي</th>
									<th data-field="active"  data-sortable="true">التفعيل</th>
									<th data-field="actions"  data-sortable="true">الخيارات</th>
								</tr>
							</thead>

                               <tbody>
                                @foreach ($EmployeeTrans as $i => $Employee)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td><img src="{{ asset("/uploads/person/$Employee->person_logo") }}" alt="{{$Employee->person_name}}" title="{{$Employee->person_name}}" /></td>
                                    <td>{{$Employee->person_name}}</td>
                                    <td>{{$Employee->phone1}}</td>
                                    <td>{{$Employee->current}}جم</td>
                                    <td>
                                        @if($Employee->active == 1)
                                            <button class="pd-setting">مـفعـل</button>
                                        @else
                                            <button class="ds-setting">متوقف</button>
                                        @endif

                                    </td>
                                    <td>
                                        <div class="product-buttons">
                                            <a href="{{ url("/Company/Employees/$Employee->id/View")}}" title="View" class="pd-setting-ed btn btn-primary"><i class="fa fa-file"  style="color:#fff;" aria-hidden="true"></i></a>
                                            <a href="{{ url("/Company/Employees/$Employee->id/Edit")}}" title="Edit" class="pd-setting-ed btn btn-primary"><i class="fa fa-pencil-square-o" style="color:#fff;"  aria-hidden="true"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#Del{{$Employee->id}}" title="Trash" class="pd-setting-ed btn btn-primary"><i class="fa fa-trash-o" style="color:#fff;"  aria-hidden="true" ></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                               </tbody>


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
@foreach ($EmployeeTrans as $EmployeeModal)
<div id="Del{{$EmployeeModal->id}}" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title" style="text-align:right">حذف بيانات الموظف</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-danger modal-check-pro information-icon-pro"> </span>
                <h2>{{$EmployeeModal->person_name}}</h2>
                <h4>هل تريد حذف جميع بيانات متضمنه كل الحركات الماليه من مدفوعات و مصروفات الموظف ؟  </h4>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">إلغــاء</a>
            <a href="{{ url("/Company/Employee/$EmployeeModal->id/Delete")}}">حـذف</a>
            </div>
        </div>
    </div>
</div>
@endforeach

        <!--/Modal-->

        @endsection
