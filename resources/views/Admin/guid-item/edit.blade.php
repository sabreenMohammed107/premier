@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
    <li>
    <a href="{{url('/')}}">الرئيسية<span class="bread-slash"> / </span></a> 
    </li>
    <li>
        <span class="bread-blod"> تعديل بند توجيه </span>
    </li>
</ul>

@endsection

@section('content')
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row" style="direction:rtl;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <div class="message-content" style="text-align:right;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div id="dropzone1" class="pro-ad addcoursepro">
                                <form action="{{route('guid-item.update',$row->id)}}" method="POST" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                        @csrf
                                        @method('PUT')
                                    <div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="direction:rtl">
													<div class="form-group">
														<label class="">كود البند</label>
														<input name="guided_item_code" value="{{$row->guided_item_code}}" type="text" class="form-control" placeholder="كود البند">
													</div>
													<div class="form-group">
														<label class="">اسم البند</label>
														<input name="guided_item_name" value="{{$row->guided_item_name}}" type="text" class="form-control" placeholder="اسم البند">
													</div>
													<div class="form-group">
														<label class="">ملاحظات</label>
														<textarea name="notes" placeholder="ملاحظات" style="max-height:100px">{{$row->notes}}</textarea>
													</div>
												</div>
											</div>
                                        <div class="modal-footer info-md">
                                            <a  href="{{route('guid-item.index')}}">إلغــاء</a>
                                            <button type="submit">حفظ التعديل</button>
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