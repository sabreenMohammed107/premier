@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="{{url('/')}}">الرئيسية<span class="bread-slash"> / </span></a>
    </li>
    <li>
        <span class="bread-blod">تعديل شركة</span>
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
                                            <form action="{{route('home.update',$row->id)}}" method="POST" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                                @csrf
                                                @method('PUT')
                                                <div class="row res-rtl" style="display: flex ; direction:rtl">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">

                                                        <div class="form-group">
                                                            <label class="">الاسم بالكامل  <span style="color:red"> *</span></label>
                                                            <input name="company_official_name" value="{{$row->company_official_name}}" type="text" class="form-control" placeholder="الاسم بالكامل" pattern=".{6,}" autofocus required title="ادخل على الاقل 5 حروف">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">اسم الشهرة</label>
                                                            <input name="company_nick_name" value="{{$row->company_nick_name}}" type="text" class="form-control" placeholder="اسم الشهرة">
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="">مأموريه الضرائب</label>
                                                            <input name="tax_authority" value="{{$row->tax_authority}}" type="text" class="form-control" placeholder="مأموريه الضرائب">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">العنوان</label>
                                                            <textarea name="address" placeholder="العنوان" style="max-height:100px">{{$row->address}}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">موبايل</label>
                                                            <input name="phone2" value="{{$row->phone2}}" type="text" class="form-control" placeholder="موبايل">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">فاكس</label>
                                                            <input name="fax" value="{{$row->fax}}" type="text" class="form-control" placeholder="فاكس">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">شخص للتواصل</label>
                                                            <input name="contact_person_name" value="{{$row->contact_person_name}}" type="text" class="form-control" placeholder="شخص للتواصل">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">السجل تجاري</label>
                                                            <input name="commercial_register" value="{{$row->commercial_register}}" type="text" class="form-control" placeholder="السجل تجاري">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="">ملاحظات</label>
                                                            <textarea name="notes" placeholder="ملاحظات" style="max-height:100px">{{$row->notes}}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>
                                                                @if($row->active ==1)
                                                                <input name="active" value="1" type="checkbox" class="i-checks" checked> مفعل
                                                                @else
                                                                <input name="active" value="0" type="checkbox" class="i-checks"> مفعل
                                                                @endif
                                                            </label>
                                                        </div>



                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">
                                                        <div class="form-group">
                                                            <label>
                                                                @if($row->taxable ==1)
                                                                <input name="taxable" value="1" type="checkbox" class="i-checks" checked> خاضعه لضريبة القيمة المضافة
                                                                @else
                                                                <input name="taxable" value="0" type="checkbox" class="i-checks"> خاضعه لضريبة القيمة المضافة
                                                                @endif
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">الكيان القانونى</label>
                                                            <input name="legal_entity" value="{{$row->legal_entity}}" type="text" class="form-control" placeholder="الكيان القانونى">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">رقم التسجيل  <span style="color:red"> *</span></label>
                                                            <input name="registeration_no" value="{{$row->registeration_no}}" type="text" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}"  required  type="text" class="form-control"  placeholder="123-456-789" maxlength="11">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">البريد الالكترونى</label>
                                                            <input name="email" value="{{$row->email}}" type="text" class="form-control" placeholder="البريد الالكترونى">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">هاتف</label>
                                                            <input name="phone1" value="{{$row->phone1}}" type="text" class="form-control" placeholder="هاتف">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">موقع الكترونى</label>
                                                            <input name="website" value="{{$row->website}}" type="text" class="form-control" placeholder="موقع الكترونى">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">رقم شخص للتواصل </label>
                                                            <input name="contact_person_mobile" value="{{$row->contact_person_mobile}}" type="text" class="form-control" placeholder="رقم شخص للتواص ">
                                                        </div>
                                                        <div class="form-group res-mg-t-15">
                                                            <label class="">رقم الملف الضريبى</label>
                                                            <input name="tax_card" value="{{$row->tax_card}}" type="text" class="form-control" placeholder="رقم الملف الضريبى">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">رئيس مجلس الاداره</label>
                                                            <input name="chairman_person_name" value="{{$row->chairman_person_name}}" type="text" class="form-control" placeholder="رئيس مجلس الاداره">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">رأس المال</label>
                                                            <input name="equity_capital" value="{{$row->equity_capital}}" type="text" class="form-control" placeholder="رأس المال">
                                                        </div>


                                                        <div class="form-group alert-up-pd">
                                                            <label class="">صورة</label>

                                                            <div id="uploadOne" class="img-upload">
                                                                <img src="{{ asset('uploads/companies/'.$row->company_logo)}}" alt="" style="width: 200px;height:150px;border: 1px dashed #CCC;">
                                                                <div class="upload-icon">
                                                                    <input type="file" name="company_logo" class="upload">
                                                                    <i class="fa fa-camera"></i>
                                                                </div>
                                                            </div>



                                                        </div>








                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <a class="btn btn-primary waves-effect waves-light" href="{{route('home.index')}}">إلغــاء</a>

                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">تعديل البيانات</button>
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