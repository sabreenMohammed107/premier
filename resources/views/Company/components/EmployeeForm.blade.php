<form action="{{$action ?? ''}}" method="POST" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
<div class="row res-rtl"style="display: flex ;flex-direction: row-reverse ;">
    {{ csrf_field() }}
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="profile-info-inner">
            <div class="profile-img">
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-content-section">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="direction:rtl"">
                                <div class="form-group alert-up-pd">
                                    <label class=""> تحميل صورة</label>
                                    <div id="uploadOne" class="img-upload">
                                        <img src="{{ asset("/uploads/person/$image") }}" {{$disabled ?? ''}} alt="" style="width: 100%;height:250px;border: 1px dashed #CCC;">
                                        <div class="upload-icon">
                                            <input type="file" tabindex="1" name="logo" class="upload">
                                            <i class="fa fa-camera"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="company_id" value="{{$company ?? 0}}">
                                    <input type="hidden" name="id" value="{{$person ?? 0}}">
                                    <input type="hidden" name="person_type_id" value="102">
                                    <label class="">الإسم بالكامل</label>
                                <input name="person_name" tabindex="2" {{$disabled ?? ''}} value="{{$name ?? ''}}" type="text" class="form-control" placeholder="الإسم بالكامل">
                                </div>
                                <div class="form-group">
                                    <label class="">إسم الشهرة</label>
                                <input name="person_nick_name" tabindex="3" {{$disabled ?? ''}} value="{{$nick_name ?? ''}}" type="text" class="form-control" placeholder="الإسم بالكامل">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap drp-lst">
                        <h4 style="text-align:right">{{$title ?? ''}}</h4>
                    </div>
                    {{-- <button type="button" onclick="customReset()" {{$disabled ?? ''}} class="btn btn-primary waves-effect waves-light mg-b-15">تفريغ البيانات</button> --}}

                    <div class="product-payment-inner-st" style="padding-top:0px">
                        <div class="row mg-b-15">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-b-15">
                                <div class="review-content-section">
                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">
                                                    <div class="form-group">
                                                        <label class="phone2">الهاتف 2 </label>
                                                    <input name="phone2" tabindex="7" {{$disabled ?? ''}} value="{{$phone2 ?? ''}}" type="text" class="form-control" placeholder="الهاتف">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="address">العنوان</label>
                                                    <input name="address" tabindex="8" {{$disabled ?? ''}} value="{{$address ?? ''}}" type="text" class="form-control" placeholder="العنوان">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class=""> التفعيل </label>
                                                        <div class="form-group">
                                                            <label>
                                                                <input tabindex="9" {{$disabled ?? ''}} name="active" type="checkbox" name="active" class="i-checks" {{$check ?? ''}}>
                                                                مفعل
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">
                                                    <div class="form-group">
                                                        <label class="">الهاتف 1</label>
                                                    <input name="phone1" tabindex="4" {{$disabled ?? ''}} value="{{$phone1 ?? ''}}" type="text" class="form-control" placeholder="الموبايل">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="email"> البريد الالكتروني</label>
                                                    <input name="email" tabindex="5" {{$disabled ?? ''}} value="{{$email ?? ''}}" id="email" type="text" class="form-control" placeholder="البريد الالكتروني">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">ملاحظات</label>
                                                        <textarea tabindex="6" name="notes" {{$disabled ?? ''}} placeholder="ملاحظات" style="max-height:100px">{{$notes ?? ''}}</textarea>
                                                    </div>
                                                    </div>
                                                    <div></div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">
                                                        <div class="form-group">
                                                            <label class="alert alert-danger" style="color: red;"> في حالة الدائن نضع الرصيد الافتتاحي -6000</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""> رصيد الموظف الحالي</label>
                                                        <input name="" value="{{$current ?? ''}}" disabled id="email" type="text" class="form-control" placeholder="رصيد الخزنه الحالي">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">
                                                        <div class="form-group">
                                                            <label class="alert alert-danger" style="color: red;"> في حالة الدائن نضع الرصيد الافتتاحي موجبة مثال 6000</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""> الرصيد الافتتاحي</label>
                                                        <input name="open_balance" tabindex="10" {{$disabled ?? ''}} {{$open ?? ''}} value="{{$openBalance ?? ''}}" id="email" type="text" class="form-control" placeholder="الرصيد الافتتاحي">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""> تاريخ الرصيد الافتتاحي</label>
                                                        <input type="date" tabindex="11" name="balance_start_date" {{$disabled ?? ''}} {{$open ?? ''}} value="{{date('Y-m-d', strtotime($openBalanceDate ?? now()))}}" class="form-control">
                                                        </div>
                                                    </div>
                                            </div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15" style="{{$style ?? ""}}">{{$button ?? ''}}</button>
                                        <a href="{{url('/Company/Employees')}}" class="btn btn-warning mg-b-15">إلغاء</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</form>
