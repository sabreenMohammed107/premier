@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> الرئيسية<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod">إضافة شركة</span>
    </li>
</ul>

@endsection

@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design" style="direction:rtl">
                        <li class="active"><a href="#description">البيانات الأساسية للشركة</a></li>

                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                            <form action="{{route('home.store')}}" method="POST" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                            @csrf
                                            <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">
                                                        <div class="form-group">
                                                            <label>
                                                                <input type="checkbox" name="active" value="1" class="i-checks" checked> مفعل
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">الاسم بالكامل</label>
                                                            <input name="company_official_name" type="text" class="form-control" placeholder="الاسم بالكامل">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">اسم الشهرة</label>
                                                            <input name="company_nick_name" type="text" class="form-control" placeholder="اسم الشهرة">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">السجل تجاري</label>
                                                            <input name="commercial_register" type="text" class="form-control" placeholder="السجل تجاري">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">رئيس مجلس الاداره</label>
                                                            <input name="chairman_person_name" type="text" class="form-control" placeholder="رئيس مجلس الاداره">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="">شخص للتواصل</label>
                                                            <input name="contact_person_name" type="text" class="form-control" placeholder="شخص للتواصل">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">هاتف</label>
                                                            <input name="phone1" type="text" class="form-control" placeholder="هاتف">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">موبايل</label>
                                                            <input name="phone2" type="text" class="form-control" placeholder="موبايل">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">فاكس</label>
                                                            <input name="fax" type="text" class="form-control" placeholder="فاكس">
                                                        </div>
                                                        <div class="form-group alert-up-pd">
                                                        <label class="">صورة</label>
                                                            
                                                                <div id="uploadOne" class="img-upload">
                                                                    <img src="{{ asset('webassets/img/default.png')}}" alt="" style="width: 200px;height:150px;border: 1px dashed #CCC;">
                                                                    <div class="upload-icon">
                                                                        <input type="file" name="company_logo" class="upload">
                                                                        <i class="fa fa-camera"></i>
                                                                    </div>
                                                                </div>
                                                          


                                                            </div>




                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">
                                                        <div class="form-group">
                                                            <label>
                                                                <input type="checkbox" name="taxable" value="1" class="i-checks" checked> خاضعه لضريبة القيمة المضافة
                                                            </label>
                                                        </div>
                                                        <div class="form-group res-mg-t-15">
                                                            <label class="">رقم الملف الضريبى</label>
                                                            <input name="tax_card" type="text" class="form-control" placeholder="رقم الملف الضريبى">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">مأموريه الضرائب</label>
                                                            <input name="tax_authority" type="text" class="form-control" placeholder="مأموريه الضرائب">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">الكيان القانونى</label>
                                                            <input name="legal_entity" type="text" class="form-control" placeholder="الكيان القانونى">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="">رقم التسجيل</label>
                                                            <input name="registeration_no" type="text" class="form-control" placeholder="رقم التسجيل">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">رأس المال</label>
                                                            <input name="equity_capital" type="text" class="form-control" placeholder="رأس المال">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">البريد الالكترونى</label>
                                                            <input name="email" type="text" class="form-control" placeholder="البريد الالكترونى">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">موقع الكترونى</label>
                                                            <input name="website" type="text" class="form-control" placeholder="موقع الكترونى">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">العنوان</label>
                                                            <textarea name="address" placeholder="العنوان" style="max-height:100px"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">ملاحظات</label>
                                                            <textarea name="notes" placeholder="ملاحظات" style="max-height:100px"></textarea>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">إضافة الشركة</button>
                                                        </div>
                                                    </div>
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
    </div>
</div>

@endsection