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
                                    <label class="">  {{ __('titles.load_image') }} </label>
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
                                    <input type="hidden" name="person_type_id" value="100">
                                    <label class=""> {{ __('titles.company_official_name') }}</label>
                                <input name="person_name" tabindex="2" {{$disabled ?? ''}} value="{{$name ?? ''}}" type="text" class="form-control" placeholder="{{ __('titles.company_official_name') }}">
                                </div>
                                <div class="form-group">
                                    <label class=""> {{ __('titles.company_nick_name') }}</label>
                                <input name="person_nick_name" tabindex="3" {{$disabled ?? ''}} value="{{$nick_name ?? ''}}" type="text" class="form-control" placeholder="{{ __('titles.company_nick_name') }}">
                                </div>
                                <div class="form-group">
                                    <label class="">{{ __('titles.registeration_no') }}</label>
                                <input name="registeration_no" tabindex="4" {{$disabled ?? ''}} value="{{$registeration_no ?? ''}}" type="text" class="form-control" placeholder="{{ __('titles.registeration_no') }}">
                                </div>
                                <div class="form-group">
                                    <label class="">{{ __('titles.commercial_register') }}</label>
                                    <input name="commercial_register" tabindex="5" {{$disabled ?? ''}} value="{{$commercial_register ?? ''}}" type="text" class="form-control" placeholder="{{ __('titles.commercial_register') }}">
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
                    {{-- <button type="button" onclick="customReset()" {{$disabled ?? ''}} class="btn btn-primary waves-effect waves-light mg-b-15">{{ __('titles.cancel') }} </button> --}}

                    <div class="product-payment-inner-st" style="padding-top:0px">
                        <div class="row mg-b-15">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-b-15">
                                <div class="review-content-section">
                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">
                                                    <div class="form-group">
                                                        <label class="phone2">{{ __('titles.phone') }} 2 </label>
                                                    <input name="phone2" tabindex="13" {{$disabled ?? ''}} value="{{$phone2 ?? ''}}" type="text" class="form-control" placeholder="{{ __('titles.phone') }} ">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="address">{{ __('titles.address') }}</label>
                                                    <input name="address" tabindex="14" {{$disabled ?? ''}} value="{{$address ?? ''}}" type="text" class="form-control" placeholder="{{ __('titles.address') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">{{ __('titles.contact_person_mobile') }}</label>
                                                    <input name="contact_person_mobile" tabindex="15" {{$disabled ?? ''}} value="{{$contact_person_mobile ?? ''}}" type="text" class="form-control" placeholder="{{ __('titles.contact_person_mobile') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="email">{{ __('titles.email') }}</label>
                                                    <input name="email" tabindex="16" {{$disabled ?? ''}} value="{{$email ?? ''}}" id="email" type="text" class="form-control" placeholder="{{ __('titles.email') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">{{ __('titles.tax_card') }}</label>
                                                    <input name="tax_card" tabindex="17" {{$disabled ?? ''}} value="{{$tax_card ?? ''}}" type="text" class="form-control" placeholder="{{ __('titles.tax_card') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class=""> {{ __('titles.active') }} </label>
                                                        <div class="form-group">
                                                            <label>
                                                                <input {{$disabled ?? ''}} tabindex="18" name="active" type="checkbox" name="active" class="i-checks" {{$check ?? ''}}>
                                                                {{ __('titles.active') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">
                                                    <div class="form-group">
                                                        <label class="">{{ __('titles.phone') }} 1</label>
                                                    <input name="phone1" tabindex="6" {{$disabled ?? ''}} value="{{$phone1 ?? ''}}" type="text" class="form-control" placeholder="{{ __('titles.pnone') }} ">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class=""> {{ __('titles.legal_entity') }}</label>
                                                    <input name="legal_entity" tabindex="7" {{$disabled ?? ''}} value="{{$legal_entity ?? ''}}" type="text" class="form-control" placeholder="{{ __('titles.legal_entity') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class=""> {{ __('titles.contact_person_name') }}</label>
                                                    <input name="contact_person_name" tabindex="8" {{$disabled ?? ''}} value="{{$contact_person_name ?? ''}}" type="text" class="form-control" placeholder="{{ __('titles.contact_person_name') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">{{ __('titles.website') }}</label>
                                                    <input name="website" tabindex="9" {{$disabled ?? ''}} value="{{$website ?? ''}}" type="text" class="form-control" placeholder="{{ __('titles.website') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="tax_authority"> {{ __('titles.tax_authority') }}</label>
                                                    <input name="tax_authority" tabindex="10" {{$disabled ?? ''}} value="{{$tax_authority ?? ''}}" id="email" type="text" class="form-control" placeholder="{{ __('titles.tax_authority') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">{{ __('titles.notes') }}</label>
                                                        <textarea name="notes" tabindex="11" {{$disabled ?? ''}} placeholder="{{ __('titles.notes') }}" style="max-height:100px">{{$notes ?? ''}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">{{ __('titles.taxable') }} </label>
                                                        <div class="form-group">
                                                            <label>
                                                                <input tabindex="12" {{$disabled ?? ''}} name="taxable" type="checkbox"class="i-checks" {{$checkt ?? ''}}>
                                                            </label>
                                                        </div>
                                                    </div>


                                                    </div>
                                                    <div></div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">
                                                        <div class="form-group">
                                                            <label class="alert alert-danger" style="color: red;"> {{ __('titles.balance_statment_depit') }}</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""> {{ __('titles.current_balance') }} </label>
                                                        <input name="" value="{{$current ?? ''}}" disabled id="email" type="text" class="form-control" placeholder="{{ __('titles.current_balance') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="direction:rtl">
                                                        <div class="form-group">
                                                            <label class="alert alert-danger" style="color: red;">{{ __('titles.balance_statment_credit') }}</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">{{ __('titles.open_blance_amount') }}</label>
                                                        <input name="open_balance" tabindex="19" {{$disabled ?? ''}} {{$open ?? ''}} value="{{$openBalance ?? ''}}" id="email" type="text" class="form-control" placeholder={{ __('titles.open_blance_amount') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">{{ __('titles.open_balance_date') }}</label>
                                                        <input type="date" tabindex="20" name="balance_start_date" {{$disabled ?? ''}} {{$open ?? ''}} value="{{date('Y-m-d', strtotime($openBalanceDate ?? now()))}}" class="form-control">
                                                        </div>
                                                    </div>
                                            </div>
                    <a href="{{url('/Company/Clients')}}" class="btn btn-primary waves-effect waves-light mg-b-15">{{ __('titles.cancel') }}</a>
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
