@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
@if(str_replace('_', '-', app()->getLocale())=='ar')
	<li>
    <a href="{{url('/')}}">{{ __('titles.home') }}<span class="bread-slash"> / </span></a> 
	</li>
	<li>
		<span class="bread-blod"> {{ __('titles.guid_item') }}</span>
	</li>
	@else
	<li>
		<span class="bread-blod"> {{ __('titles.guid_item') }}  / </span>
	</li>

	<li>
    <a href="{{url('/')}}">{{ __('titles.home') }}</a> 
	</li>
	@endif
</ul>

@endsection

@section('content')
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst dir-rtl">
                    <div class="message-content" >
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div id="dropzone1" class="pro-ad addcoursepro">
                                    <form action="{{route('guid-item.store')}}" method="POST" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                    @csrf
                                    <div class="row row-ltr">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
													<div class="form-group">
														<label class="">{{ __('titles.code') }}</label>
														<input name="guided_item_code" type="text" class="form-control" placeholder="{{ __('titles.code') }}">
													</div>
													<div class="form-group">
														<label class="">{{ __('titles.name') }}</label>
														<input name="guided_item_name" type="text" class="form-control" placeholder="{{ __('titles.name') }}">
													</div>
													<div class="form-group">
														<label class="">{{ __('titles.notes') }}</label>
														<textarea name="notes" placeholder="{{ __('titles.notes') }}" style="max-height:100px"></textarea>
													</div>
												</div>
                                            </div>
                                           
                                        <div class="modal-footer info-md dir-rtl">
                                            <a  href="{{route('guid-item.index')}}">{{ __('titles.cancel') }}</a>
                                            <button type="submit">{{ __('titles.save') }}</button>
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

@endsection

@section('modal')
<!--Modal-->


<!--/Modal-->

@endsection

@section('scripts')
<script>



$(document).ready(function() {


});
</script>

@endsection