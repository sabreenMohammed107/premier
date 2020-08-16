<form action="{{$action ?? ''}}" method="POST" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
<div class="row res-rtl"style="display: flex ;flex-direction: row-reverse ;">
    {{ csrf_field() }}
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="profile-info-inner">
            <div class="profile-img">
                <img src="{{ asset("/uploads/person/$image") }}" alt="" />
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-content-section">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="direction:rtl"">
                                <div class="file-upload-inner ts-forms mg-b-15">
                                    <div class="input prepend-big-btn">
                                        <label class="icon-right" for="prepend-big-btn">
                                            <i class="fa fa-download"></i>
                                        </label>
                                        <div class="file-button">
                                             تحميل صورة
                                            <input type="file" name="logo" {{$disabled ?? ''}} onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                        </div>
                                        <input type="text" id="prepend-big-btn" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="company_id" value="{{$company ?? 0}}">
                                    <input type="hidden" name="id" value="{{$person ?? 0}}">
                                    <input type="hidden" name="person_type_id" value="101">
                                    <label class="">الإسم بالكامل</label>
                                <input name="person_name" {{$disabled ?? ''}} value="{{$name ?? ''}}" type="text" class="form-control" placeholder="الإسم بالكامل">
                                </div>
                                <div class="form-group">
                                    <label class="">إسم الشهرة</label>
                                <input name="person_nick_name" {{$disabled ?? ''}} value="{{$nick_name ?? ''}}" type="text" class="form-control" placeholder="الإسم بالكامل">
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
                    <button type="button" onclick="customReset()" {{$disabled ?? ''}} class="btn btn-primary waves-effect waves-light mg-b-15">تفريغ البيانات</button>
                    <a href="" onclick="location.reload(true);" class="btn btn-primary waves-effect waves-light mg-b-15">الغاء</a>

                    <div class="product-payment-inner-st" style="padding-top:0px">
                        <div class="row mg-b-15">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-b-15">
                                <div class="review-content-section">
                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">
                                                    <div class="form-group">
                                                        <label class="">الرقم التسجيل</label>
                                                    <input name="registeration_no" {{$disabled ?? ''}} value="{{$registeration_no ?? ''}}" type="text" class="form-control" placeholder="الرقم التأميني">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">الرقم الملف الضريبي</label>
                                                    <input name="tax_card" {{$disabled ?? ''}} value="{{$tax_card ?? ''}}" type="text" class="form-control" placeholder="الرقم التأميني">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">الموبايل</label>
                                                    <input name="phone1" {{$disabled ?? ''}} value="{{$phone1 ?? ''}}" type="text" class="form-control" placeholder="الموبايل">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="address">العنوان</label>
                                                    <input name="address" {{$disabled ?? ''}} value="{{$address ?? ''}}" type="text" class="form-control" placeholder="العنوان">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="phone2">الهاتف </label>
                                                    <input name="phone2" {{$disabled ?? ''}} value="{{$phone2 ?? ''}}" type="text" class="form-control" placeholder="الهاتف">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="fax">فاكس</label>
                                                    <input name="fax" {{$disabled ?? ''}} value="{{$fax ?? ''}}" type="text" class="form-control" placeholder="فاكس">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="email"> البريد الالكتروني</label>
                                                    <input name="email" {{$disabled ?? ''}} value="{{$email ?? ''}}" id="email" type="text" class="form-control" placeholder="البريد الالكتروني">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class=""> خاضع لضريبة القيمة المضافة </label>
                                                        <div class="form-group">
                                                            <label>
                                                                <input {{$disabled ?? ''}} name="taxable" type="checkbox"class="i-checks" {{$checkt ?? ''}}>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">
                                                    <div class="form-group">
                                                        <label class="">السجل التجاري</label>
                                                        <input name="commercial_register" {{$disabled ?? ''}} value="{{$commercial_register ?? ''}}" type="text" class="form-control" placeholder="السجل التجاري">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class=""> الكيان القانوني</label>
                                                    <input name="legal_entity" {{$disabled ?? ''}} value="{{$email ?? ''}}" id="email" type="text" class="form-control" placeholder=" الكيان القانوني">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class=""> الرصيد الافتتاحي</label>
                                                    <input name="open_balance" {{$disabled ?? ''}} {{$open ?? ''}} value="{{$openBalance ?? ''}}" id="email" type="text" class="form-control" placeholder="الرصيد الافتتاحي">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class=""> تاريخ الرصيد الافتتاحي</label>
                                                    <input name="balance_start_date" {{$disabled ?? ''}} {{$open ?? ''}} value="{{$openBalanceDate ?? ''}}" id="email" type="date" class="form-control" placeholder="تاريخ الرصيد الافتتاحي">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class=""> رصيد المورد الحالي</label>
                                                    <input name="" value="{{$current ?? ''}}" disabled id="email" type="text" class="form-control" placeholder="رصيد الخزنه الحالي">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="tax_authority"> مأمورية الضرائب</label>
                                                    <input name="tax_authority" {{$disabled ?? ''}} value="{{$tax_authority ?? ''}}" id="email" type="text" class="form-control" placeholder="مأمورية الضرائب">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">ملاحظات</label>
                                                        <textarea name="notes" {{$disabled ?? ''}} placeholder="ملاحظات" style="max-height:100px">{{$notes ?? ''}}</textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class=""> التفعيل </label>
                                                        <div class="form-group">
                                                            <label>
                                                                <input {{$disabled ?? ''}} name="active" type="checkbox" name="active" class="i-checks" {{$check ?? ''}}>
                                                                مفعل
                                                            </label>
                                                        </div>
                                                    </div>



                                                    </div>
                                            </div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15" style="{{$style ?? ""}}">{{$button ?? ''}}</button>
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
