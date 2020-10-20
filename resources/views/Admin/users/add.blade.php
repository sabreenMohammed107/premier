@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="{{url('/')}}">الرئيسية<span class="bread-slash"> / </span></a>
    </li>
    <li>
        <span class="bread-blod"> إضافه مستخدم </span>
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
                                    <form action="{{route('users.store')}}" method="POST" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="direction:rtl">

                                                <div class="form-group">
                                                    <label class="">الاسم المستخدم</label>
                                                    <input name="user_name" type="text" class="form-control" placeholder="الاسم المستخدم">
                                                </div>
                                                <div class="form-group">
                                                    <label class="">كلمة المرور</label>
                                                    <input id="myInput" name="password" type="password" required class="form-control" placeholder="كلمة المرور">
                                                    <input type="checkbox" onclick="myFunction()">Show Password

                                                </div>

                                                <div class="form-group">
                                                    <label class="">الشركات</label>
                                                    <select data-placeholder="Choose a Country..." name="company_id" class="selectpicker dynamic" data-live-search="true" data-width="100%" tabindex="-1" id="country" data-dependent="sub">
                                                        <option value=""> الشركة</option>
                                                        @foreach($companies as $company)
                                                        <option value="{{$company->id}}">{{$company->company_official_name}}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">الصلاحيات</label>
                                                    <select name="role_id" class="form-control" data-dependent="city" data-show-subtext="true" data-live-search="true" id="sub">

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">الإسم بالكامل</label>
                                                    <input name="user_full_name" type="text" class="form-control" placeholder="الاسم بالكامل">
                                                </div>
                                                <div class="form-group">
                                                    <label class="">ملاحظات</label>
                                                    <textarea name="notes" placeholder="ملاحظات" style="max-height:100px"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        <input name="active" value="1" type="checkbox" class="i-checks" checked> مفعل
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer info-md">
                                            <a href="{{route('users.index')}}">إلغــاء</a>
                                            <button type="submit">حفظ التعديل</button>
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


    $(document).ready(function() {
        $('#country').selectpicker();
        $('.dynamic').change(function() {

            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                $.ajax({
                    url: "{{route('dynamicdependentCat.fetch')}}",
                    method: "get",
                    data: {
                        value: value,
                    },
                    success: function(result) {
                        $('#sub').html(result);
                        $('#country').selectpicker();
                    },
                    error: function(textStatus, errorThrown) {
                        $('#sub').html();
                        $('#country').selectpicker();
                    }



                })
            }
        });
    });
</script>

@endsection