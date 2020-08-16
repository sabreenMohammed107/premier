<form action="{{$action ?? ''}}" method="POST" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
<div class="row res-rtl"style="display: flex ;flex-direction: row-reverse ;">
    {{ csrf_field() }}
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="profile-info-inner">
            <div class="profile-img">
                <img src="{{ asset("/uploads/item/$image") }}" alt="" />
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
                                    <input type="hidden" name="id" value="{{$item ?? 0}}">

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
                                                        <label class="">الرصيد الافتتاحي لسعر القطعة</label>
                                                    <input name="open_item_price" {{$disabled ?? ''}} {{$open ?? ''}}  value="{{$open_item_price ?? ''}}" type="text" class="form-control" placeholder="الرصيد الافتتاحي لسعر القطعة">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">الرصيد الافتتاحي لعدد القطع</label>
                                                    <input name="total_open_balance_qty" {{$disabled ?? ''}} {{$open ?? ''}}  value="{{$total_open_balance_qty ?? ''}}" type="text" class="form-control" placeholder="الرصيد الافتتاحي لعدد القطع">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="address">الرصيد الحالى</label>
                                                    <input name="total_open_balance_cost" disabled value="{{$total_open_balance_cost ?? ''}}" type="text" class="form-control" placeholder="الرصيد الحالى">
                                                    </div>


                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">
                                                    <div class="form-group">
                                                        <label class="">كود الصنف</label>
                                                        <input name="item_code" {{$disabled ?? ''}} value="{{$item_code ?? ''}}" type="text" class="form-control" placeholder="كود الصنف">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">إسم الصنف بالعربية</label>
                                                    <input name="item_arabic_name" {{$disabled ?? ''}} value="{{$item_arabic_name ?? ''}}" id="email" type="text" class="form-control" placeholder=" إسم الصنف بالعربية">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">الإسم بالانجليزية</label>
                                                    <input name="item_english_name" {{$disabled ?? ''}} value="{{$item_english_name ?? ''}}" id="email" type="text" class="form-control" placeholder="الإسم بالانجليزية">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class=""> تاريخ الرصيد الافتتاحي</label>
                                                    <input name="balance_start_date" {{$disabled ?? ''}} {{$open ?? ''}} value="{{$balance_start_date ?? ''}}" id="email" type="date" class="form-control" placeholder="تاريخ الرصيد الافتتاحي">
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
