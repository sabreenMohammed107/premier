@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
@if(str_replace('_', '-', app()->getLocale())=='ar')
    <li>
        <a href="{{url('/')}}"> {{ __('titles.home') }} <span class="bread-slash"> / </span></a> 
    </li>
    <li>
        <span class="bread-blod"> {{ __('titles.company') }} </span>
    </li>
	@else
   
    <li>
        <span class="bread-blod"> {{ __('titles.company') }} /</span>
        <li>
        <a href="{{url('/')}}"> {{ __('titles.home') }}
    </li>
  
	@endif
</ul>

@endsection

@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                    <ul id="myTabedu1" class="tab-review-design dir-rtl" >
                        <li class="active"><a href="#description">{{ __('titles.basic_data') }}</a></li>

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
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dir-rtl">
                                                
                                                        <div class="form-group">
                                                            <label class="">{{ __('titles.company_official_name') }}<span style="color:red"> *</span></label>
                                                            <input name="company_official_name" value="{{$row->company_official_name}}" type="text" class="form-control" placeholder="{{ __('titles.company_official_name') }} " pattern=".{6,}" autofocus required title="ادخل على الاقل 5 حروف">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">{{ __('titles.company_nick_name') }}</label>
                                                            <input name="company_nick_name" value="{{$row->company_nick_name}}" type="text" class="form-control" placeholder="{{ __('titles.company_nick_name') }}">
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="">{{ __('titles.tax_authority') }}</label>
                                                            <input name="tax_authority" value="{{$row->tax_authority}}" type="text" class="form-control" placeholder="{{ __('titles.tax_authority') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">{{ __('titles.address') }}</label>
                                                            <textarea name="address" placeholder="{{ __('titles.address') }}" style="max-height:100px">{{$row->address}}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">{{ __('titles.phone') }}</label>
                                                            <input name="phone2" value="{{$row->phone2}}" type="text" class="form-control" placeholder="{{ __('titles.phone') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""> {{ __('titles.fax') }}</label>
                                                            <input name="fax" value="{{$row->fax}}" type="text" class="form-control" placeholder=" {{ __('titles.fax') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">{{ __('titles.contact_person_name') }} </label>
                                                            <input name="contact_person_name" value="{{$row->contact_person_name}}" type="text" class="form-control" placeholder="{{ __('titles.contact_person_name') }} ">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">{{ __('titles.commercial_register') }}</label>
                                                            <input name="commercial_register" value="{{$row->commercial_register}}" type="text" class="form-control" placeholder="{{ __('titles.commercial_register') }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="">{{ __('titles.notes') }}</label>
                                                            <textarea name="notes" placeholder="{{ __('titles.notes') }}" style="max-height:100px">{{$row->notes}}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>
                                                                @if($row->active ==1)
                                                                <input name="active" value="1" type="checkbox" class="i-checks" checked> {{ __('titles.active') }}
                                                                @else
                                                                <input name="active" value="0" type="checkbox" class="i-checks"> {{ __('titles.active') }}
                                                                @endif
                                                            </label>
                                                        </div>



                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dir-rtl">
                                                        <div class="form-group">
                                                            <label>
                                                                @if($row->taxable ==1)
                                                                <input name="taxable" value="1" type="checkbox" class="i-checks" checked> {{ __('titles.taxable') }}
                                                                @else
                                                                <input name="taxable" value="0" type="checkbox" class="i-checks"> {{ __('titles.taxable') }}
                                                                @endif
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">{{ __('titles.legal_entity') }}</label>
                                                            <input name="legal_entity" value="{{$row->legal_entity}}" type="text" class="form-control" placeholder="{{ __('titles.legal_entity') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">{{ __('titles.registeration_no') }} <span style="color:red"> *</span></label>
                                                            <input name="registeration_no" value="{{$row->registeration_no}}" type="text" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}"  required  type="text" class="form-control"  placeholder="123-456-789" maxlength="11">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">{{ __('titles.email') }}</label>
                                                            <input name="email" value="{{$row->email}}" type="text" class="form-control" placeholder="{{ __('titles.email') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">{{ __('titles.phone') }} </label>
                                                            <input name="phone1" value="{{$row->phone1}}" type="text" class="form-control" placeholder="{{ __('titles.phone') }} ">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">{{ __('titles.website') }}</label>
                                                            <input name="website" value="{{$row->website}}" type="text" class="form-control" placeholder="{{ __('titles.website') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">{{ __('titles.contact_person_mobile') }}</label>
                                                            <input name="contact_person_mobile" value="{{$row->contact_person_mobile}}" type="text" class="form-control" placeholder="{{ __('titles.contact_person_mobile') }} ">
                                                        </div>
                                                        <div class="form-group res-mg-t-15">
                                                            <label class=""> {{ __('titles.tax_card') }}</label>
                                                            <input name="tax_card" value="{{$row->tax_card}}" type="text" class="form-control" placeholder=" {{ __('titles.tax_card') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">{{ __('titles.chairman_person_name') }} </label>
                                                            <input name="chairman_person_name" value="{{$row->chairman_person_name}}" type="text" class="form-control" placeholder="{{ __('titles.chairman_person_name') }} ">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""> {{ __('titles.equity_capital') }}</label>
                                                            <input name="equity_capital" value="{{$row->equity_capital}}" type="text" class="form-control" placeholder=" {{ __('titles.equity_capital') }}">
                                                        </div>


                                                        <div class="form-group alert-up-pd">
                                                            <label class=""> {{ __('titles.image') }}</label>

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
                                                            <a class="btn btn-primary waves-effect waves-light" href="{{route('home.index')}}"> {{ __('titles.cancel') }}</a>

                                                            <button type="submit" class="btn btn-primary waves-effect waves-light"> {{ __('titles.save') }} </button>
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