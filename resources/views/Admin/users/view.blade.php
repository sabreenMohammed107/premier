@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> الرئيسية<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> تعديل مستخدم </span>
    </li>
</ul>

@endsection

@section('content')
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row" style="direction:rtl;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <div class="message-content" style="text-align:right;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div id="dropzone1" class="pro-ad addcoursepro">


                                    <form action="" method="POST" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                       
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="direction:rtl">

                                                <div class="form-group">
                                                    <label class="">الاسم </label>
                                                    <input name="user_name" readonly value="{{$row->user_name}}" type="text" class="form-control" placeholder="الاسم ">
                                                </div>
                                                <div class="form-group">
                                                    <label class="">كلمة المرور</label>
                                                    <input id="myInput" readonly name="password" type="password" value="{{$row->password}}" class="form-control" placeholder="كلمة المرور">
                                                    <input type="checkbox" onclick="myFunction()">Show Password
                                                </div>
                                                <div class="form-group">
                                                    <label class="">الصلاحيات</label>
                                                    <select name="role_id" class="form-control" disabled>
                                                        <option value="none" selected="" disabled="">الصلاحيات</option>
                                                        @foreach($roles as $role)
                                                        <option value="{{$role->id}}" {{ $role->id == $row->role_id ? 'selected' : '' }}>{{$role->role_name}}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">الشركات</label>
                                                    <select name="company_id" class="form-control" disabled>
                                                        <option value="none" selected="" disabled="">{{$row->company[0]->company_official_name ?? 'الشركة'}}</option>
                                                        @foreach($companies as $company)
                                                        <option value="{{$company->id}}" >{{$company->company_official_name}}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">الإسم بالكامل</label>
                                                    <input name="user_full_name" readonly value="{{$row->user_full_name}}" type="text" class="form-control" placeholder="الاسم بالكامل">
                                                </div>
                                                <div class="form-group">
                                                    <label class="">ملاحظات</label>
                                                    <textarea name="notes" readonly placeholder="ملاحظات" style="max-height:100px">{{$row->notes}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        @if($row->active ==1)
                                                        <input name="active" value="1" disabled type="checkbox" class="i-checks" checked> مفعل
                                                        @else
                                                        <input name="active" value="0" disabled type="checkbox" class="i-checks" > مفعل
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer info-md">
                                            <a href="{{route('users.index')}}">إلغــاء</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
<!--Modal-->
<!--Edit Customer-->
<div id="edt" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title" style="text-align:right">تعديل بيانات المستخدم</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">


            </div>

        </div>
    </div>
</div>
<!--/Edit Customer-->

<!--/Modal-->

@endsection
@section('scripts')
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

@endsection