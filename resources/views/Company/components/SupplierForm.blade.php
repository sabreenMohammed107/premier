<form action="{{$action ?? ''}}" method="POST" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
@if(str_replace('_', '-', app()->getLocale())=='ar')
    <div class="row res-rtl" style="display: flex ;flex-direction: row-reverse ;">
        @else
        <div class="row">
            @endif
                {{ csrf_field() }}
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="profile-info-inner">
            <div class="profile-img">
                {{-- <img src="{{ asset("/uploads/person/$image") }}" alt="" /> --}}
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-content-section">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="direction:rtl"">
                                {{-- <div class="file-upload-inner ts-forms mg-b-15">
                                    <div class="input prepend-big-btn">
                                        <label class="icon-right" for="prepend-big-btn">
                                            <i class="fa fa-download"></i>
                                        </label>
                                        <div class="file-button">
                                        {{ __('titles.load_image') }} 
                                            <input type="file" name="logo" {{$disabled ?? ''}} onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                        </div>
                                        <input type="text" id="prepend-big-btn" placeholder="">
                                    </div>
                                </div> --}}
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
                                    <input type="hidden" name="person_type_id" value="101">
                                    <label class="">الإسم بالكامل</label>
                                <input name="person_name" tabindex="2" {{$disabled ?? ''}} value="{{$name ?? ''}}" type="text" class="form-control" placeholder="الإسم بالكامل">
                                </div>
                                <div class="form-group">
                                    <label class="">إسم الشهرة</label>
                                <input name="person_nick_name" tabindex="3" {{$disabled ?? ''}} value="{{$nick_name ?? ''}}" type="text" class="form-control" placeholder="الإسم بالكامل">
                                </div>
                                <div class="form-group">
                                    <label class="">الرقم التسجيل</label>
                                <input name="registeration_no" tabindex="4" {{$disabled ?? ''}} value="{{$registeration_no ?? ''}}" type="text" class="form-control" placeholder="الرقم التأميني">
                                </div>
                                <div class="form-group">
                                    <label class="">السجل التجاري</label>
                                    <input name="commercial_register" tabindex="5" {{$disabled ?? ''}} value="{{$commercial_register ?? ''}}" type="text" class="form-control" placeholder="السجل التجاري">
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
                    {{-- <button type="button" onclick="customReset()" {{$disabled ?? ''}} class="btn btn-primary waves-effect waves-light mg-b-15">{{ __('titles.clear') }} </button> --}}
                    <div class="product-payment-inner-st" style="padding-top:0px">
                        <div class="row mg-b-15">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-b-15">
                                <div class="review-content-section">
                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">
                                                    <div class="form-group">
                                                        <label class="phone2">الهاتف 2 </label>
                                                    <input name="phone2" tabindex="13" {{$disabled ?? ''}} value="{{$phone2 ?? ''}}" type="text" class="form-control" placeholder="الهاتف">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="address">العنوان</label>
                                                    <input name="address" tabindex="14" {{$disabled ?? ''}} value="{{$address ?? ''}}" type="text" class="form-control" placeholder="العنوان">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">موبيل التواصل</label>
                                                    <input tabindex="15" name="contact_person_mobile" {{$disabled ?? ''}} value="{{$contact_person_mobile ?? ''}}" type="text" class="form-control" placeholder="موبيل للتواصل">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="email"> البريد الالكتروني</label>
                                                    <input name="email" tabindex="16" {{$disabled ?? ''}} value="{{$email ?? ''}}" id="email" type="text" class="form-control" placeholder="البريد الالكتروني">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">الرقم الملف الضريبي</label>
                                                    <input name="tax_card" tabindex="17" {{$disabled ?? ''}} value="{{$tax_card ?? ''}}" type="text" class="form-control" placeholder="الرقم الملف الضريبي">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class=""> التفعيل </label>
                                                        <div class="form-group">
                                                            <label>
                                                                <input tabindex="18" {{$disabled ?? ''}} name="active" type="checkbox" name="active" class="i-checks" {{$check ?? ''}}>
                                                                مفعل
                                                            </label>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="form-group">
                                                        <label class="fax">فاكس</label>
                                                    <input name="fax" {{$disabled ?? ''}} value="{{$fax ?? ''}}" type="text" class="form-control" placeholder="فاكس">
                                                    </div> --}}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">
                                                    <div class="form-group">
                                                        <label class="">الهاتف 1</label>
                                                    <input name="phone1" tabindex="6" {{$disabled ?? ''}} value="{{$phone1 ?? ''}}" type="text" class="form-control" placeholder="الموبايل">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class=""> الكيان القانوني</label>
                                                    <input name="legal_entity" tabindex="7" {{$disabled ?? ''}} value="{{$legal_entity ?? ''}}" type="text" class="form-control" placeholder=" الكيان القانوني">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">شخص التواصل</label>
                                                    <input name="contact_person_name" tabindex="8" {{$disabled ?? ''}} value="{{$contact_person_name ?? ''}}" type="text" class="form-control" placeholder="شخص للتواصل">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">الموقع الاكتروني</label>
                                                    <input name="website" tabindex="9" {{$disabled ?? ''}} value="{{$website ?? ''}}" type="text" class="form-control" placeholder="موقع الكتروني">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="tax_authority"> مأمورية الضرائب</label>
                                                    <input name="tax_authority" tabindex="10" {{$disabled ?? ''}} value="{{$tax_authority ?? ''}}" id="email" type="text" class="form-control" placeholder="مأمورية الضرائب">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">ملاحظات</label>
                                                        <textarea name="notes" tabindex="11" {{$disabled ?? ''}} placeholder="ملاحظات" style="max-height:100px">{{$notes ?? ''}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class=""> خاضع لضريبة القيمة المضافة </label>
                                                        <div class="form-group">
                                                            <label>
                                                                <input tabindex="12" {{$disabled ?? ''}} name="taxable" type="checkbox"class="i-checks" {{$checkt ?? ''}}>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-group">
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
                                                    </div> --}}


                                                    </div>
                                                    <div></div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">
                                                        <div class="form-group">
                                                            <label class="alert alert-danger" style="color: red;"> في حالة المدين نضع الرصيد الافتتاحي مثال -6000</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""> رصيد المورد الحالي</label>
                                                        <input name="" value="{{$current ?? ''}}" disabled id="email" type="text" class="form-control" placeholder="رصيد الخزنه الحالي">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">
                                                        <div class="form-group">
                                                            <label class="alert alert-danger" style="color: red;"> في حالة الدائن نضع الرصيد الافتتاحي موجبة مثال 6000</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""> الرصيد الافتتاحي</label>
                                                        <input name="open_balance" tabindex="19" {{$disabled ?? ''}} {{$open ?? ''}} value="{{$openBalance ?? ''}}" id="email" type="text" class="form-control" placeholder="الرصيد الافتتاحي">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""> تاريخ الرصيد الافتتاحي</label>
                                                        <input type="date" tabindex="20" name="balance_start_date" {{$disabled ?? ''}} {{$open ?? ''}} value="{{date('Y-m-d', strtotime($openBalanceDate ?? now()))}}" class="form-control">
                                                        </div>
                                                    </div>
                                            </div>
                                        <a href="{{ url("/Company/Suppliers")}}" class="btn btn-primary waves-effect waves-light mg-b-15">{{ __('titles.cancel') }}</a>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15" style="{{$style ?? ""}}">{{ __('titles.save') }}</button>
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
