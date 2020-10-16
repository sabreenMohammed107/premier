@extends('Layout.company')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="{{url('/Company')}}">الرئيسية</a><span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> كشف العملاء </span>
    </li>
</ul>
@endsection

@section('content')

<div class="product-status mg-b-15">
    <div class="container-fluid">
        <a href="{{ url("/Company/Clients/Add") }}" class="btn btn-primary waves-effect waves-light mg-b-15">إضافة عميل</a>
        <div class="row"style="direction:rtl;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>كشف العملاء</h4>
                    <div class="asset-inner">
                        <table id="example" class="display responsive nowrap" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>الصورة</th>
									<th>الاسم</th>
									<th>الصلاحيه (الوظيفة)</th>
									<th>الحاله</th>
									<th>البريد الالكتروني</th>
									<th>الهاتف</th>
									<th>المحمول</th>
									<th>العنوان</th>
									<th>الخيارات</th>
								</tr>
							</thead>

                                @foreach ($Clients as $i => $Client)
                                <tr>
                                <td>{{++$i}}</td>
                                <td><img src="{{ asset("/uploads/person/$Client->person_logo") }}" alt="{{$Client->person_name}}" title="{{$Client->person_name}}" /></td>
                                <td>{{$Client->person_name}}</td>
                                <td>محاسب قانوني</td>
                                <td>
                                    @if($Client->active == 1)
                                        <button class="pd-setting">مـفعـل</button>
                                    @else
                                        <button class="ds-setting">متوقف</button>
                                    @endif

                                </td>
                                <td>{{$Client->email}}</td>
                                <td>{{$Client->phone1}}</td>
                                <td>{{$Client->phone2}}</td>
                                <td>{{$Client->address}}</td>
                                <td>
                                    <div class="product-buttons">
                                        <a href="{{ url("/Company/Clients/$Client->id/View")}}" title="View" class="pd-setting-ed btn btn-primary"><i class="fa fa-file" aria-hidden="true"></i></a>
                                        <a href="{{ url("/Company/Clients/$Client->id/Edit")}}" title="Edit" class="pd-setting-ed btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#Del{{$Client->id}}" title="Trash" class="pd-setting-ed btn btn-primary"><i class="fa fa-trash-o" aria-hidden="true" ></i></a>
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
@foreach ($Clients as $ClientModal)
<div id="Del{{$ClientModal->id}}" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title" style="text-align:right">حذف بيانات العميل</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-danger modal-check-pro information-icon-pro"> </span>
                <h2>{{$ClientModal->person_name}}</h2>
                <h4>هل تريد حذف جميع بيانات متضمنه كل الحركات الماليه من مدفوعات و مصروفات العميل ؟  </h4>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">إلغــاء</a>
            <a href="{{ url("/Company/Client/$ClientModal->id/Delete")}}">حـذف</a>
            </div>
        </div>
    </div>
</div>
@endforeach

        <!--/Modal-->

        @endsection
