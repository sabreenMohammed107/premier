@extends('Layout.web')

@section('style')
<link rel="stylesheet" href="{{ asset('webassets/css/tabs.css')}}">

@endsection
@section('crumb')

<ul class="breadcome-menu">
 
    
    @if(str_replace('_', '-', app()->getLocale())=='ar')
    <li>
        <a href="#"></a>  {{ __('titles.home') }} <span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod">{{ __('titles.work_role') }} </span>
    </li>
	@else
   
    <li>
        <span class="bread-blod">{{ __('titles.work_role') }} </span>
    </li>
    <li>
        <a href="#"></a>  {{ __('titles.home') }}
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
                <div class="product-status-wrap drp-lst dir-rtl">
                    <h4>{{ __('titles.work_role') }}</h4>
                </div>
                <div class="product-payment-inner-st">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="admintab-wrap edu-tab1">
                                @if(str_replace('_', '-', app()->getLocale())=='ar')
                                <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1 tab-menu-right">
                                    @else
                                    <ul class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1 tab-menu-left">
                                        @endif
                                        <?php $count = 0;
                                        ?>
                                        @foreach($cases as $index => $case)

                                        <li class="{{ $index==0 ? 'active' : ''}}">
                                            <a data-toggle="tab" href="#tab{{$index+1}}"><span class="edu-icon edu-analytics tab-custon-ic"></span>
                                                @if(str_replace('_', '-', app()->getLocale())=='ar')
                                                {{$case->item_case_name}}
                                                @else
                                                {{$case->item_en_name}}
                                                @endif
                                            </a>

                                        </li>
                                        @endforeach

                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab1" class="tab-pane in active  flipInY custon-tab-style1">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                                        <form action="{{route('saveCase1')}}" method="POST" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 dir-rtl" style="border:solid .5px #ADD8E6">
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.name') }} </label>
                                                                        <input name="name_1" type="text" class="form-control" placeholder="
                                                                        @if(str_replace('_', '-', app()->getLocale())=='ar')
                                                                        {{$rows->where('item_case_id',100)[1]->item_name}} 
                                                                                                     @else
                                                {{$rows->where('item_case_id',100)[1]->item_en_name}}
                                                @endif
                                                                        " disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.thevalue') }} </label>
                                                                        <input name="value_1" type="text" value="{{$rows->where('item_case_id',100)[1]->item_value}}" class="form-control" placeholder="14.00%">
                                                                    </div>
                                                                    <div class="form-group res-mg-t-15">
                                                                        <label class="">{{ __('titles.notes') }}</label>
                                                                        <textarea name="note_1" placeholder="{{ __('titles.notes') }}" style="max-height:85px">{{$rows->where('item_case_id',100)[1]->notes}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 dir-rtl" style="border:solid .5px #ADD8E6">
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.name') }}</label>
                                                                        <input name="name_2" type="text" class="form-control" placeholder="
                                                                        @if(str_replace('_', '-', app()->getLocale())=='ar')
                                                                        {{$rows->where('item_case_id',100)[0]->item_name}} 
                                                                                                     @else
                                                {{$rows->where('item_case_id',100)[0]->item_en_name}}
                                                @endif
                                                                        " disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.thevalue') }}</label>
                                                                        <input name="vlaue_2" type="text" value="{{$rows->where('item_case_id',100)[0]->item_value}}" class="form-control" placeholder="00 %">
                                                                    </div>
                                                                    <div class="form-group res-mg-t-15">
                                                                        <label class="">{{ __('titles.notes') }}</label>
                                                                        <textarea name="note_2" placeholder="{{ __('titles.notes') }}" style="max-height:85px">{{$rows->where('item_case_id',100)[0]->notes}}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 dir-rtl" style="border:solid .5px #ADD8E6">

                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 dir-rtl" style="border:solid .5px #ADD8E6">
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.name') }}</label>
                                                                        <input name="name_3" type="text" class="form-control" placeholder="
                                                                        @if(str_replace('_', '-', app()->getLocale())=='ar')
                                                                        {{$rows->where('item_case_id',100)[2]->item_name}} @else
                                               {{$rows->where('item_case_id',100)[2]->item_en_name}}
                                                @endif" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.thevalue') }}</label>
                                                                        <input name="vlaue_3" type="text" value="{{$rows->where('item_case_id',100)[2]->item_value}}" class="form-control" placeholder="1.00%">
                                                                    </div>
                                                                    <div class="form-group res-mg-t-15">
                                                                        <label class="">{{ __('titles.notes') }}</label>
                                                                        <textarea name="note_3" placeholder="{{ __('titles.notes') }}" style="max-height:85px">{{$rows->where('item_case_id',100)[2]->notes}}</textarea>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="payment-adress">
                                                                        <a class="btn btn-primary waves-effect waves-light" href="{{route('work-role.index')}}">{{ __('titles.cancel') }}</a>

                                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">{{ __('titles.save') }}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab2" class="tab-pane  flipInY custon-tab-style1">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                                        <form action="{{route('saveCase2')}}" method="POST" class="dropzone dropzone-custom needsclick addcourse">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dir-rtl" style="border:solid .5px #ADD8E6">
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.name') }}</label>
                                                                        <input name="" type="text" class="form-control" placeholder="
                                                                        
                                                                        @if(str_replace('_', '-', app()->getLocale())=='ar')
                                                                        {{$rows->where('item_case_id',101)[4]->item_name}}                                              @else
                                               {{$rows->where('item_case_id',101)[4]->item_en_name}}
                                                @endif
                                                                        " disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.guid_item') }}</label>
                                                                        <select name="case5_item" class="form-control">
                                                                            <option value="none" selected="" disabled="">{{$rows->where('item_case_id',101)[4]->guided->guided_item_name ??  __('titles.guid_item') }}</option>
                                                                            @foreach($items as $item)
                                                                            <option value="{{$item->id}}">{{$item->guided_item_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group res-mg-t-15">
                                                                        <label class="">{{ __('titles.notes') }}</label>
                                                                        <textarea name="case5_note" placeholder="{{ __('titles.notes') }}" style="max-height:85px">{{$rows->where('item_case_id',101)[4]->notes}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dir-rtl" style="border:solid .5px #ADD8E6">
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.name') }}</label>
                                                                        <input name="" type="text" class="form-control" placeholder="
                                                                        @if(str_replace('_', '-', app()->getLocale())=='ar')
                                                                        {{$rows->where('item_case_id',101)[3]->item_name}}                                          @else
                                                {{$rows->where('item_case_id',101)[3]->item_en_name}}
                                                @endif
                                                                       " disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.guid_item') }}</label>
                                                                        <select name="case4_item" class="form-control">
                                                                            <option value="none" selected="" disabled="">{{$rows->where('item_case_id',101)[3]->guided->guided_item_name ??  __('titles.guid_item') }}</option>
                                                                            @foreach($items as $item)
                                                                            <option value="{{$item->id}}">{{$item->guided_item_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group res-mg-t-15">
                                                                        <label class="">{{ __('titles.notes') }}</label>
                                                                        <textarea name="case4_note" placeholder="{{ __('titles.notes') }}" style="max-height:85px">{{$rows->where('item_case_id',101)[3]->notes}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dir-rtl" style="border:solid .5px #ADD8E6">
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.name') }}</label>
                                                                        <input name="" type="text" class="form-control" placeholder="
                                                                       
                                                                        @if(str_replace('_', '-', app()->getLocale())=='ar')
                                                                        {{$rows->where('item_case_id',101)[6]->item_name}}                                  @else
                                                 {{$rows->where('item_case_id',101)[6]->item_en_name}}
                                                @endif
                                                                       " disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.guid_item') }}</label>
                                                                        <select name="case7_item" class="form-control">
                                                                            <option value="none" selected="" disabled="">{{$rows->where('item_case_id',101)[6]->guided->guided_item_name ??  __('titles.guid_item') }}</option>
                                                                            @foreach($items as $item)
                                                                            <option value="{{$item->id}}">{{$item->guided_item_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group res-mg-t-15">
                                                                        <label class="">{{ __('titles.notes') }}</label>
                                                                        <textarea name="case7_note" placeholder="{{ __('titles.notes') }}" style="max-height:85px">{{$rows->where('item_case_id',101)[6]->notes}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dir-rtl" style="border:solid .5px #ADD8E6">
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.name') }}</label>
                                                                        <input name="" type="text" class="form-control" placeholder="
                                                                       
                                                                        @if(str_replace('_', '-', app()->getLocale())=='ar')
                                                                        {{$rows->where('item_case_id',101)[5]->item_name}}  
                                                                                                     @else
                                                {{$rows->where('item_case_id',101)[5]->item_en_name}}
                                                @endif
                                                                        " disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.guid_item') }}</label>
                                                                        <select name="case6_item" class="form-control">
                                                                            <option value="none" selected="" disabled="">{{$rows->where('item_case_id',101)[5]->guided->guided_item_name ??  __('titles.guid_item') }}</option>
                                                                            @foreach($items as $item)
                                                                            <option value="{{$item->id}}">{{$item->guided_item_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group res-mg-t-15">
                                                                        <label class="">{{ __('titles.notes') }}</label>
                                                                        <textarea name="case6_note" placeholder="{{ __('titles.notes') }}" style="max-height:85px">{{$rows->where('item_case_id',101)[5]->notes}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="payment-adress">
                                                                        <a class="btn btn-primary waves-effect waves-light" href="{{route('work-role.index')}}">{{ __('titles.cancel') }}</a>

                                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">{{ __('titles.save') }}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab3" class="tab-pane  flipInY custon-tab-style1">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                                        <form action="{{route('saveCase3')}}" method="POST" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dir-rtl" style="border:solid .5px #ADD8E6">
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.name') }}</label>
                                                                        <input name="" type="text" class="form-control" placeholder="
                                                                       
                                                                        @if(str_replace('_', '-', app()->getLocale())=='ar')
                                                                        {{$rows->where('item_case_id',102)[8]->item_name}}  
                                                                                                     @else
                                                {{$rows->where('item_case_id',102)[8]->item_en_name}}
                                                @endif" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.guid_item') }}</label>
                                                                        <select name="case9_item" class="form-control">
                                                                            <option value="none" selected="" disabled="">{{$rows->where('item_case_id',102)[8]->guided->guided_item_name ??  __('titles.guid_item') }}</option>
                                                                            @foreach($items as $item)
                                                                            <option value="{{$item->id}}">{{$item->guided_item_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group res-mg-t-15">
                                                                        <label class="">{{ __('titles.notes') }}</label>
                                                                        <textarea name="case9_note" placeholder="{{ __('titles.notes') }}" style="max-height:85px">{{$rows->where('item_case_id',102)[8]->notes}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dir-rtl" style="border:solid .5px #ADD8E6">
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.name') }}</label>
                                                                        <input name="" type="text" class="form-control" placeholder="
                                                                      
                                                                        @if(str_replace('_', '-', app()->getLocale())=='ar')
                                                                        {{$rows->where('item_case_id',102)[7]->item_name}}  
                                                                                                     @else
                                                {{$rows->where('item_case_id',102)[7]->item_en_name}}
                                                @endif" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.guid_item') }}</label>
                                                                        <select name="case8_item" class="form-control">
                                                                            <option value="none" selected="" disabled="">{{$rows->where('item_case_id',102)[7]->guided->guided_item_name ??  __('titles.guid_item') }}</option>
                                                                            @foreach($items as $item)
                                                                            <option value="{{$item->id}}">{{$item->guided_item_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group res-mg-t-15">
                                                                        <label class="">{{ __('titles.notes') }}</label>
                                                                        <textarea name="case8_note" placeholder="{{ __('titles.notes') }}" style="max-height:85px">{{$rows->where('item_case_id',102)[7]->notes}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dir-rtl" style="border:solid .5px #ADD8E6">
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.name') }}</label>
                                                                        <input name="" type="text" class="form-control" placeholder="
                                                                       
                                                                        @if(str_replace('_', '-', app()->getLocale())=='ar')
                                                                        {{$rows->where('item_case_id',102)[10]->item_name}}  
                                                                                                     @else
                                                {{$rows->where('item_case_id',102)[10]->item_en_name}}
                                                @endif" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.guid_item') }}</label>
                                                                        <select name="case11_item" class="form-control">
                                                                            <option value="none" selected="" disabled="">{{$rows->where('item_case_id',102)[10]->guided->guided_item_name ??  __('titles.guid_item') }}</option>
                                                                            @foreach($items as $item)
                                                                            <option value="{{$item->id}}">{{$item->guided_item_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group res-mg-t-15">
                                                                        <label class="">{{ __('titles.notes') }}</label>
                                                                        <textarea name="case11_note" placeholder="{{ __('titles.notes') }}" style="max-height:85px">{{$rows->where('item_case_id',102)[10]->notes}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dir-rtl" style="border:solid .5px #ADD8E6">
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.name') }}</label>
                                                                        <input name="" type="text" class="form-control" placeholder="
                                                                       
                                                                        @if(str_replace('_', '-', app()->getLocale())=='ar')
                                                                        {{$rows->where('item_case_id',102)[9]->item_name}}  
                                                                                                     @else
                                                {{$rows->where('item_case_id',102)[9]->item_en_name}}
                                                @endif " disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.guid_item') }}</label>
                                                                        <select name="case10_item" class="form-control">
                                                                            <option value="none" selected="" disabled="">{{$rows->where('item_case_id',102)[9]->guided->guided_item_name ??  __('titles.guid_item') }}</option>
                                                                            @foreach($items as $item)
                                                                            <option value="{{$item->id}}">{{$item->guided_item_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group res-mg-t-15">
                                                                        <label class="">{{ __('titles.notes') }}</label>
                                                                        <textarea name="case10_note" placeholder="{{ __('titles.notes') }}" style="max-height:85px">{{$rows->where('item_case_id',102)[9]->notes}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="payment-adress">
                                                                        <a class="btn btn-primary waves-effect waves-light" href="{{route('work-role.index')}}">{{ __('titles.cancel') }}</a>

                                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">{{ __('titles.save') }}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab4" class="tab-pane  flipInY custon-tab-style1">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div id="dropzone1" class="pro-ad addcoursepro">
                                                        <form action="{{route('saveCase4')}}" method="POST" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dir-rtl" style="border:solid .5px #ADD8E6">
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.name') }}</label>
                                                                        <input name="" type="text" class="form-control" placeholder="
                                                                       
                                                                        @if(str_replace('_', '-', app()->getLocale())=='ar')
                                                                        {{$rows->where('item_case_id',103)[12]->item_name}}  
                                                                                                     @else
                                                {{$rows->where('item_case_id',103)[12]->item_en_name}}
                                                @endif" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.guid_item') }}</label>
                                                                        <select name="case13_item" class="form-control">
                                                                            <option value="none" selected="" disabled="">{{$rows->where('item_case_id',103)[12]->guided->guided_item_name ??  __('titles.guid_item') }}</option>
                                                                            @foreach($items as $item)
                                                                            <option value="{{$item->id}}">{{$item->guided_item_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group res-mg-t-15">
                                                                        <label class="">{{ __('titles.notes') }}</label>
                                                                        <textarea name="case13_note" placeholder="{{ __('titles.notes') }}" style="max-height:85px">{{$rows->where('item_case_id',103)[12]->notes}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dir-rtl" style="border:solid .5px #ADD8E6">
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.name') }}</label>
                                                                        <input name="" type="text" class="form-control" placeholder="
                                                                        
                                                                        @if(str_replace('_', '-', app()->getLocale())=='ar')
                                                                        {{$rows->where('item_case_id',103)[11]->item_name}}  
                                                                                                     @else
                                                {{$rows->where('item_case_id',103)[11]->item_en_name}}
                                                @endif" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.guid_item') }}</label>
                                                                        <select name="case12_item" class="form-control">
                                                                            <option value="none" selected="" disabled="">{{$rows->where('item_case_id',103)[11]->guided->guided_item_name ??  __('titles.guid_item') }}</option>
                                                                            @foreach($items as $item)
                                                                            <option value="{{$item->id}}">{{$item->guided_item_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group res-mg-t-15">
                                                                        <label class="">{{ __('titles.notes') }}</label>
                                                                        <textarea name="case12_note" placeholder="{{ __('titles.notes') }}" style="max-height:85px">{{$rows->where('item_case_id',103)[11]->notes}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dir-rtl" style="border:solid .5px #ADD8E6">

                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dir-rtl" style="border:solid .5px #ADD8E6">
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.name') }}</label>
                                                                        <input name="" type="text" class="form-control" placeholder="
                                                                      
                                                                        @if(str_replace('_', '-', app()->getLocale())=='ar')
                                                                        {{$rows->where('item_case_id',103)[13]->item_name}}  
                                                                                                     @else
                                                {{$rows->where('item_case_id',103)[13]->item_en_name}}
                                                @endif" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="">{{ __('titles.guid_item') }}</label>
                                                                        <select name="case14_item" class="form-control">
                                                                            <option value="none" selected="" disabled="">{{$rows->where('item_case_id',103)[13]->guided->guided_item_name ??  __('titles.guid_item') }}</option>
                                                                            @foreach($items as $item)
                                                                            <option value="{{$item->id}}">{{$item->guided_item_name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group res-mg-t-15">
                                                                        <label class="">{{ __('titles.notes') }}</label>
                                                                        <textarea name="case14_note" placeholder="{{ __('titles.notes') }}" style="max-height:85px">{{$rows->where('item_case_id',103)[13]->notes}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="payment-adress">
                                                                        <a class="btn btn-primary waves-effect waves-light" href="{{route('work-role.index')}}">{{ __('titles.cancel') }}</a>

                                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">{{ __('titles.save') }}</button>
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
                            <style>
                                .dropzone.dz-clickable .dz-message {
                                    display: none;
                                }
                            </style>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection