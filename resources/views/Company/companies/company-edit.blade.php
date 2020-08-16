@extends('Layout.company')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> الشركات<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> تعديل شركة </span>
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
                            <ul id="myTabedu1" class="tab-review-design"style="direction:rtl">
                                <li class="active"><a href="#description">البيانات الأساسية للشركة</a></li>
                                <li><a href="#reviews"> الخزينة </a></li>
                                <li><a href="#INFORMATION"> البنك </a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">
                                                    <form method="POST" action="{{ url("/Company/$Company->id")}}" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload" enctype="multipart/form-data">
                                                        {{ method_field('PUT') }}
                                                        {{ csrf_field() }}
                                                        <div class="row">
															<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">
																<div class="form-group">
																	<label>
                                                                        <input type="checkbox" name="active" class="i-checks"
                                                                        @if ($Company->active === 1)
                                                                            checked
                                                                        @endif
                                                                        > مفعل
																	</label>
																</div>
																<div class="form-group">
																	<label class="">الاسم بالكامل</label>
                                                                <input name="company_official_name" type="text" class="form-control" value="{{$Company->company_official_name}}" placeholder="الاسم بالكامل">
																</div>
																<div class="form-group">
																	<label class="">اسم الشهرة</label>
																	<input name="company_nick_name" type="text" class="form-control" value="{{$Company->company_nick_name}}" placeholder="اسم الشهرة">
																</div>
																<div class="form-group">
																	<label class="">السجل تجاري</label>
																	<input name="commercial_register" type="text" class="form-control" value="{{$Company->commercial_register}}" placeholder="السجل تجاري">
																</div>
																<div class="form-group">
																	<label class="">رئيس مجلس الاداره</label>
																	<input name="chairman_person_name" type="text" class="form-control" value="{{$Company->chairman_person_name}}" placeholder="رئيس مجلس الاداره">
																</div>

																<div class="form-group">
																	<label class="">شخص للتواصل</label>
																	<input name="contact_person_name" type="text" class="form-control" value="{{$Company->contact_person_name}}" placeholder="شخص للتواصل">
                                                                </div>
                                                                {{-- this form group is added as contact person phone --}}
                                                                <div class="form-group">
																	<label class="">هاتف شخص للتواصل</label>
																	<input name="contact_person_mobile" type="text" class="form-control" value="{{$Company->contact_person_mobile}}" placeholder="هاتف شخص للتواصل">
																</div>
																<div class="form-group">
																	<label class="">هاتف</label>
																	<input name="phone1" type="text" class="form-control" value="{{$Company->phone1}}" placeholder="هاتف">
																</div>
																<div class="form-group">
																	<label class="">موبايل</label>
																	<input name="phone2" type="text" class="form-control" value="{{$Company->phone2}}" placeholder="موبايل">
																</div>
																<div class="form-group">
																	<label class="">فاكس</label>
																	<input name="fax" type="text" class="form-control" value="{{$Company->fax}}" placeholder="فاكس">
																</div>
																<div class="form-group alert-up-pd">
                                                                    <label class="">صورة</label>

																	<div class="file-upload-inner ts-forms mg-b-15">
                                                                        <div class="input prepend-big-btn">
                                                                            <label class="icon-right" for="prepend-big-btn">
                                                                                <i class="fa fa-download"></i>
                                                                            </label>
                                                                            <div class="file-button">
                                                                                 تحميل صورة
                                                                                <input type="file" name="company_logo" onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                                            </div>
                                                                            <input type="text" id="prepend-big-btn" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                </div>


															</div>
															<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"style="direction:rtl">
																<div class="form-group">
																	<label>
																		<input type="checkbox" name="taxable" class="i-checks" checked> خاضعه لضريبة القيمة المضافة
																	</label>
																</div>
																<div class="form-group res-mg-t-15">
																	<label class="">رقم الملف الضريبى</label>
																	<input name="tax_card" type="text" class="form-control" value="{{$Company->tax_card}}" placeholder="رقم الملف الضريبى">
																</div>
																<div class="form-group">
																	<label class="">مأموريه الضرائب</label>
																	<input name="tax_authority" type="text" class="form-control" value="{{$Company->tax_authority}}" placeholder="مأموريه الضرائب">
																</div>
																<div class="form-group">
																	<label class="">الكيان القانونى</label>
																	<input name="legal_entity" type="text" class="form-control" value="{{$Company->legal_entity}}" placeholder="الكيان القانونى">
																</div>

																<div class="form-group">
																	<label class="">رقم التسجيل</label>
																	<input name="registeration_no" type="text" class="form-control" value="{{$Company->registeration_no}}" placeholder="رقم التسجيل">
																</div>
																<div class="form-group">
																	<label class="">رأس المال</label>
																	<input name="equity_capital" type="text" class="form-control" value="{{$Company->equity_capital}}" placeholder="رأس المال">
																</div>
																<div class="form-group">
																	<label class="">البريد الالكترونى</label>
																	<input name="email" type="text" class="form-control" value="{{$Company->email}}" placeholder="البريد الالكترونى">
																</div>
																<div class="form-group">
																	<label class="">موقع الكترونى</label>
																	<input name="website" type="text" class="form-control" value="{{$Company->website}}" placeholder="موقع الكترونى">
																</div>
																<div class="form-group">
																	<label class="">العنوان</label>
																	<textarea name="address" placeholder="العنوان" style="max-height:100px">{{$Company->address}}</textarea>
																</div>
																<div class="form-group">
																	<label class="">ملاحظات</label>
																	<textarea name="notes" placeholder="ملاحظات" style="max-height:100px">{{$Company->notes}}</textarea>
																</div>

															</div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">حفظ التغيرات</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="row">
                                        @php
                                            //Check for an already registered safe
                                            if($Safe){
                                                $type = "Edit";
                                                $safe_name = $Safe->safe_name;
                                                $safe_location = $Safe->safe_location;
                                                $open_balance = $Safe->open_balance;
                                                $balance_start_date = $Safe->balance_start_date;
                                                if($Sopen == 1){
                                                    $Sdisable = 'disabled';
                                                }else{
                                                    $Sdisable = '';
                                                }
                                            }else{
                                                $type = "Add";
                                                $safe_name = "";
                                                $safe_location = "";
                                                $open_balance = "";
                                                $balance_start_date = "";
                                                $Sdisable = '';
                                            }

                                            //Check for an already registered bank
                                            if($Bank){
                                                $Btype = "Edit";
                                                $bank_name =$Bank->bank_name;
                                                $bank_branch_name=$Bank->bank_branch_name;
                                                $bank_account_no=$Bank->bank_account_no;
                                                $Bbalance_start_date=$Bank->balance_start_date;
                                                $Bopen_balance=$Bank->open_balance;
                                                if($Bopen == 1){
                                                    $Bdisable = 'disabled';
                                                }else{
                                                    $Bdisable = '';
                                                }
                                            }else{
                                                $Btype = "Add";
                                                $bank_name ="";
                                                $bank_branch_name="";
                                                $bank_account_no="";
                                                $Bbalance_start_date="";
                                                $Bopen_balance="";
                                                $Bdisable = '';
                                            }


                                        @endphp
                                        <form action="/Company/{{$Company->id}}/{{$type}}/Safe" method="POST">
                                            {{ csrf_field() }}
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="direction:rtl">
                                                            <div class="devit-card-custom">
                                                                <div class="form-group">
                                                                    <label class="">اسم الخرينه</label>
                                                                <input type="text" name="safe_name" value="{{$safe_name}}" class="form-control" placeholder="اسم الخرينه"style="text-align:right">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="">موقع الخزينه</label>
                                                                <input type="text" name="safe_location" value="{{$safe_location}}" class="form-control" placeholder="موقع الخزينه"style="text-align:right">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="">تاريخ بداية الترصيد</label>
                                                                <input type="date" {{$Sdisable}} name="balance_start_date" value="{{$balance_start_date}}" class="form-control" placeholder="تاريخ بداية الترصيد"style="text-align:right">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="">الرصيد الإفتتاحي</label>
                                                                <input type="number" {{$Sdisable}} name="open_balance" value="{{$open_balance}}" class="form-control" placeholder="الرصيد الإفتتاحي">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="">رصيد الخزينه الحالى</label>
                                                                <input type="number" value="{{$SafeTotal}}" class="form-control" disabled placeholder="رصيد الخزينه الحالى">
                                                                </div>
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">حفظ الخزينة</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    <div class="row">
                                        <form action="/Company/{{$Company->id}}/{{$Btype}}/Bank" method="POST">
                                            {{ csrf_field() }}
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="direction:rtl">
                                                <div class="review-content-section">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="devit-card-custom">
                                                                <div class="form-group">
                                                                    <label class="">اسم البنك</label>
                                                                <input type="text" name="bank_name" value="{{$bank_name}}" class="form-control" placeholder="اسم البنك"style="text-align:right">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="">فرع البنك</label>
                                                                <input type="text" name="bank_branch_name" value="{{$bank_branch_name}}" class="form-control" placeholder="فرع البنك"style="text-align:right">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="">رقم الحساب البنكي</label>
                                                                <input type="text" name="bank_account_no" value="{{$bank_account_no}}" class="form-control" placeholder="رقم الحساب البنكي"style="text-align:right">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="">تاريخ بداية الترصيد</label>
                                                                <input type="date" {{$Bdisable}} name="balance_start_date" value="{{$Bbalance_start_date}}" class="form-control" placeholder="تاريخ بداية الترصيد" style="text-align:right">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="">الرصيد الإفتتاحي</label>
                                                                <input type="number" {{$Bdisable}} name="open_balance" value="{{$Bopen_balance}}" class="form-control" placeholder="الرصيد الإفتتاحي">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="">رصيد البنك الحالى</label>
                                                                <input type="number" value="{{$BankTotal}}" disabled name="" class="form-control" placeholder="رصيد البنك الحالى">
                                                                </div>
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">حفظ البنك</button>
                                                            </div>
                                                        </div>
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
@endsection

