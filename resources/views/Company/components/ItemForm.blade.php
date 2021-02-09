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
                        {{-- <img src="{{ asset("/uploads/item/$image") }}" alt="" /> --}}
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="direction:rtl"">
                                <div class=" form-group alert-up-pd">
                                        <label class=""> {{ __('titles.load_image') }}</label>
                                        <div id="uploadOne" class="img-upload">
                                            <img src="{{ asset("/uploads/item/$image") }}" {{$disabled ?? ''}} alt="" style="width: 100%;height:250px;border: 1px dashed #CCC;">
                                            <div class="upload-icon">
                                                <input type="file" name="logo" {{$disabled ?? ''}} onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                <i class="fa fa-camera"></i>
                                            </div>
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
                        <button type="button" onclick="customReset()" {{$disabled ?? ''}} class="btn btn-primary waves-effect waves-light mg-b-15"> {{ __('titles.clear') }}</button>
                        <a href="" onclick="location.reload(true);" class="btn btn-primary waves-effect waves-light mg-b-15"> {{ __('titles.cancel') }}</a>

                        <div class="product-payment-inner-st" style="padding-top:0px">
                            <div class="row mg-b-15">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-b-15">
                                    <div class="review-content-section">
                                        <div id="dropzone1" class="pro-ad addcoursepro">
                                            <div class="row row-ltr">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                                    <div class="form-group">
                                                        <label class="">{{ __('titles.open_blance_one_item') }}</label>
                                                        <input name="open_item_price" {{$disabled ?? ''}} {{$open ?? ''}} value="{{$open_item_price ?? ''}}" type="text" class="form-control" placeholder="{{ __('titles.open_blance_one_item') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">{{ __('titles.open_balance_items') }}</label>
                                                        <input name="total_open_balance_qty" {{$disabled ?? ''}} {{$open ?? ''}} value="{{$total_open_balance_qty ?? ''}}" type="text" class="form-control" placeholder="{{ __('titles.open_balance_items') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="address">{{ __('titles.open_blance_amount') }}</label>
                                                        <input name="total_open_balance_cost" {{$disabled ?? ''}} {{$open ?? ''}} value="{{$total_open_balance_cost ?? ''}}" type="text" class="form-control" placeholder="{{ __('titles.open_blance_amount') }}">
                                                    </div>
                                                    <hr>
                                                    <div class="form-group">
                                                        <label class="">{{ __('titles.current_item_price') }}</label>
                                                        <input name="open_item_price" disabled {{$open ?? ''}} value="{{$open_item_price ?? ''}}" type="text" class="form-control" placeholder="{{ __('titles.current_item_price') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="address">{{ __('titles.current_balance') }}</label>
                                                        <input name="total_current_balance_cost" disabled value="{{$total_current_balance_cost ?? ''}}" type="text" class="form-control" placeholder="{{ __('titles.current_balance') }}">
                                                    </div>

                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                                    <div class="form-group">
                                                        <label class="">{{ __('titles.code') }}</label>
                                                        <input name="item_code" {{$disabled ?? ''}} value="{{$item_code ?? ''}}" type="text" class="form-control" placeholder="{{ __('titles.code') }} ">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">{{ __('titles.arabic_name') }}</label>
                                                        <input name="item_arabic_name" {{$disabled ?? ''}} value="{{$item_arabic_name ?? ''}}" id="email" type="text" class="form-control" placeholder=" {{ __('titles.arabic_name') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">{{ __('titles.english_name') }}</label>
                                                        <input name="item_english_name" {{$disabled ?? ''}} value="{{$item_english_name ?? ''}}" id="email" type="text" class="form-control" placeholder="{{ __('titles.english_name') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class=""> {{ __('titles.open_balance_date') }}</label>
                                                        <input name="balance_start_date" {{$disabled ?? ''}} {{$open ?? ''}} value="{{$balance_start_date ?? ''}}" id="email" type="date" class="form-control" placeholder="{{ __('titles.open_balance_date') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15" style="{{$style ?? ""}}"> {{ __('titles.save') }}</button>
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