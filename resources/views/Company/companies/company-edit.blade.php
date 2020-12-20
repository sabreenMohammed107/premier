@extends('Layout.company')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="{{url('/Company')}}"> {{$Company->company_official_name}}</a><span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod">{{ __('titles.edit') }} </span>
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
                    <ul id="myTabedu1" class="tab-review-design dir-rtl">
                        <li class="active"><a href="#description">{{ __('titles.basic_data') }}</a></li>
                        @if (Auth::user()->role_id != 103)
                        <li><a href="#reviews"> {{ __('titles.cash_box') }} </a></li>
                        <li><a href="#INFORMATION"> {{ __('titles.bank') }} </a></li>
                        @endif
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                            <form method="POST" action="{{ url("/Company/$Company->id")}}" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload" enctype="multipart/form-data">
                                                {{ method_field('PUT') }}
                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dir-rtl">
                                                        <div class="form-group">
                                                            <label>
                                                                <input disabled type="checkbox" name="taxable" class="i-checks" @if ($Company->active === 1)
                                                                checked
                                                                @endif>  {{ __('titles.taxable') }}
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">  {{ __('titles.legal_entity') }}</label>
                                                            <input disabled name="legal_entity" type="text" class="form-control" value="{{$Company->legal_entity}}" placeholder=" {{ __('titles.legal_entity') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">  {{ __('titles.registeration_no') }} </label>
                                                            <input disabled name="registeration_no" type="text" class="form-control" value="{{$Company->registeration_no}}" placeholder=" {{ __('titles.registeration_no') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">  {{ __('titles.email') }} </label>
                                                            <input tabindex="7" name="email" type="text" class="form-control" value="{{$Company->email}}" placeholder=" {{ __('titles.email') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">  {{ __('titles.phone') }} 2 </label>
                                                            <input name="phone2" tabindex="8" type="text" class="form-control" value="{{$Company->phone2}}" placeholder=" {{ __('titles.phone') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">  {{ __('titles.website') }} </label>
                                                            <input name="website" tabindex="9" type="text" class="form-control" value="{{$Company->website}}" placeholder=" {{ __('titles.website') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">  {{ __('titles.contact_person_mobile') }} </label>
                                                            <input name="contact_person_mobile" tabindex="10" type="text" class="form-control" value="{{$Company->contact_person_mobile}}" placeholder=" {{ __('titles.contact_person_mobile') }}">
                                                        </div>
                                                        <div class="form-group res-mg-t-15">
                                                            <label class="">  {{ __('titles.tax_card') }}</label>
                                                            <input disabled name="tax_card" type="text" class="form-control" value="{{$Company->tax_card}}" placeholder=" {{ __('titles.tax_card') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">  {{ __('titles.chairman_person_name') }} </label>
                                                            <input name="chairman_person_name" tabindex="11" type="text" class="form-control" value="{{$Company->chairman_person_name}}" placeholder=" {{ __('titles.chairman_person_name') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">  {{ __('titles.equity_capital') }} </label>
                                                            <input disabled name="equity_capital" type="text" class="form-control" value="{{$Company->equity_capital}}" placeholder=" {{ __('titles.equity_capital') }}">
                                                        </div>

                                                        <div class="form-group alert-up-pd">
                                                            <label class=""> {{ __('titles.image') }}</label>
                                                            <div id="uploadOne" class="img-upload">
                                                                <img src="{{ asset('uploads/companies/'.$Company->company_logo)}}" alt="" style="width: 200px;height:150px;border: 1px dashed #CCC;">
                                                                <div class="upload-icon">
                                                                    <input type="file" tabindex="12" name="company_logo" class="upload">
                                                                    <i class="fa fa-camera"></i>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="file-upload-inner ts-forms mg-b-15">
                                                                        <div class="input prepend-big-btn">
                                                                            <label class="icon-right" for="prepend-big-btn">
                                                                                <i class="fa fa-download"></i>
                                                                            </label>
                                                                            <div class="file-button">
                                                                            {{ __('titles.load_image') }}
                                                                                <input type="file" name="company_logo" onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                                            </div>
                                                                            <input type="text" id="prepend-big-btn" placeholder="">
                                                                        </div>
                                                                    </div> --}}
                                                        </div>

                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dir-rtl">

                                                        <div class="form-group">
                                                            <label class=""> {{ __('titles.company_official_name') }} </label>
                                                            <input disabled name="company_official_name" type="text" class="form-control" value="{{$Company->company_official_name}}" placeholder="{{ __('titles.company_official_name') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">  {{ __('titles.company_nick_name') }} </label>
                                                            <input disabled name="company_nick_name" type="text" class="form-control" value="{{$Company->company_nick_name}}" placeholder="{{ __('titles.company_nick_name') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">  {{ __('titles.tax_authority') }}</label>
                                                            <input disabled name="tax_authority" type="text" class="form-control" value="{{$Company->tax_authority}}" placeholder={{ __('titles.tax_authority') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">  {{ __('titles.address') }}</label>
                                                            <textarea tabindex="1" name="address" placeholder="{{ __('titles.address') }}" style="max-height:100px">{{$Company->address}}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">  {{ __('titles.phone') }}  1</label>
                                                            <input tabindex="2" name="phone1" type="text" class="form-control" value="{{$Company->phone1}}" placeholder=" {{ __('titles.phone') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">  {{ __('titles.fax') }} </label>
                                                            <input name="fax" tabindex="3" type="text" class="form-control" value="{{$Company->fax}}" placeholder=" {{ __('titles.fax') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">  {{ __('titles.contact_person_name') }} </label>
                                                            <input tabindex="4" name="contact_person_name" type="text" class="form-control" value="{{$Company->contact_person_name}}" placeholder="contact_person_name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""> {{ __('titles.commercial_register') }}</label>
                                                            <input disabled name="commercial_register" type="text" class="form-control" value="{{$Company->commercial_register}}" placeholder="commercial_register">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">  {{ __('titles.notes') }}</label>
                                                            <textarea name="notes" tabindex="5" placeholder="{{ __('titles.notes') }}" style="max-height:100px">{{$Company->notes}}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>
                                                                <input disabled type="checkbox" tabindex="6" name="active" class="i-checks" @if ($Company->active === 1)
                                                                checked
                                                                @endif
                                                                >  {{ __('titles.active') }}
                                                            </label>
                                                        </div>






                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light"> {{ __('titles.save') }}</button>
                                                            <a href="{{url('/Company')}}" class="btn btn-warning"> {{ __('titles.cancel') }}</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (Auth::user()->role_id != 103)
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
                                
                                <form action="{{url("/Company/$type/Safe")}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 dir-rtl">
                                                    <div class="devit-card-custom">
                                                        <div class="form-group">
                                                            <label class="">{{ __('titles.name') }}</label>
                                                            <input type="text" name="safe_name" value="{{$safe_name}}" class="form-control" placeholder="{{ __('titles.name') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""> {{ __('titles.location') }} </label>
                                                            <input type="text" name="safe_location" value="{{$safe_location}}" class="form-control" placeholder="{{ __('titles.location') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""> {{ __('titles.open_balance_date') }} </label>
                                                            <input type="date" {{$Sdisable}} name="balance_start_date" value="{{$balance_start_date}}" class="form-control" placeholder=" {{ __('titles.open_balance_date') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""> {{ __('titles.open_blance_amount') }}</label>
                                                            <input type="number" {{$Sdisable}} name="open_balance" value="{{$open_balance}}" class="form-control" placeholder=" {{ __('titles.open_blance_amount') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""> {{ __('titles.current_balance') }} </label>
                                                            <input type="number" value="{{$SafeTotal}}" class="form-control" disabled placeholder=" {{ __('titles.current_balance') }}">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light"> {{ __('titles.save') }}</button>
                                                        <a href="{{url('/Company')}}" class="btn btn-warning"> {{ __('titles.cancel') }}</a>

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
                                <form action="{{url("/Company/$Btype/Bank")}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 dir-rtl">
                                        <div class="review-content-section">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="devit-card-custom">
                                                        <div class="form-group">
                                                            <label class=""> {{ __('titles.name') }}</label>
                                                            <input type="text" name="bank_name" value="{{$bank_name}}" class="form-control" placeholder=" {{ __('titles.name') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""> {{ __('titles.branch') }}</label>
                                                            <input type="text" name="bank_branch_name" value="{{$bank_branch_name}}" class="form-control" placeholder=" {{ __('titles.branch') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""> {{ __('titles.account_num') }} </label>
                                                            <input type="text" name="bank_account_no" value="{{$bank_account_no}}" class="form-control" placeholder=" {{ __('titles.account_num') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""> {{ __('titles.open_balance_date') }} </label>
                                                            <input type="date" {{$Bdisable}} name="balance_start_date" value="{{$Bbalance_start_date}}" class="form-control" placeholder=" {{ __('titles.open_balance_date') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""> {{ __('titles.open_blance_amount') }} </label>
                                                            <input type="number" {{$Bdisable}} name="open_balance" value="{{$Bopen_balance}}" class="form-control" placeholder=" {{ __('titles.open_blance_amount') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""> {{ __('titles.current_balance') }} </label>
                                                            <input type="number" value="{{$BankTotal}}" disabled name="" class="form-control" placeholder={{ __('titles.current_balance') }}">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light"> {{ __('titles.save') }}</button>
                                                        <a href="{{url('/Company')}}" class="btn btn-warning"> {{ __('titles.cancel') }}</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection