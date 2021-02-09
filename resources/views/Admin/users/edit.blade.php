@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
 
@if(str_replace('_', '-', app()->getLocale())=='ar')
    <li>
        <a href="#"></a>  {{ __('titles.home') }} <span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> {{ __('titles.users') }}</span>
    </li>
	@else
   
    <li>
        <span class="bread-blod"> {{ __('titles.users') }}</span>
    </li>
    <li>
        <a href="#"></a>  {{ __('titles.home') }}
    </li>
   
	@endif
</ul>

@endsection

@section('content')
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <div class="message-content" >
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div id="dropzone1" class="pro-ad addcoursepro">


                                    <form action="{{route('users.update',$row->id)}}" method="POST" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 dir-rtl">

                                                <div class="form-group">
                                                    <label class="">{{ __('titles.name') }} </label>
                                                    <input name="user_name" value="{{$row->user_name}}" type="text" class="form-control" placeholder="الاسم ">
                                                </div>
                                                <div class="form-group">
                                                    <label class="">{{ __('titles.password') }}</label>
                                                    <input id="myInput" name="password" type="password" value="{{$row->password}}" class="form-control" placeholder="كلمة المرور">
                                                    <input type="checkbox" onclick="myFunction()">Show Password
                                                </div>
                                                <div class="form-group">
                                                    <label class="">{{ __('titles.company') }}</label>
                                                    <select data-placeholder="Choose a Country..." name="company_id" class="selectpicker dynamic" data-live-search="true" data-width="100%" id="country" data-dependent="sub">
                                                        <option value="none" selected="" disabled="">{{$row->company[0]->company_official_name ?? 'الشركة'}}</option>
                                                        @foreach($companies as $company)
                                                        <option value="{{$company->id}}" >{{$company->company_official_name}}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">{{ __('titles.previlidge') }}</label>
                                                    <select name="role_id" class="form-control" data-dependent="city" data-show-subtext="true" data-live-search="true" id="sub">
                                                        <option value="none" selected="" disabled="">{{$row->role->role_name ?? ''}}</option>
                                                   
                                                    </select>
                                                </div>
                                               
                                                <div class="form-group">
                                                    <label class="">{{ __('titles.user_full_name') }} </label>
                                                    <input name="user_full_name" value="{{$row->user_full_name}}" type="text" class="form-control" placeholder="الاسم بالكامل">
                                                </div>
                                                <div class="form-group">
                                                    <label class="">{{ __('titles.notes') }}</label>
                                                    <textarea name="notes" placeholder="{{ __('titles.notes') }}" style="max-height:100px">{{$row->notes}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                       
                                                        <input name="active" value="1" type="checkbox" class="i-checks"  @if($row->active ==1)checked @endif> {{ __('titles.active') }}
                                                       
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                     
                                        <div class="modal-footer info-md">
                                            <a href="{{route('users.index')}}">{{ __('titles.cancel') }}</a>
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
<!--Edit Customer-->
<div id="edt" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title" style="text-align:right">تعديل بيانات المستخدم</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">


            </div>

        </div>
    </div>
</div>
<!--/Edit Customer-->

<!--/Modal-->

@endsection
@section('scripts')
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

$(document).ready(function() {
    $('#country').selectpicker();
$('.dynamic').change(function() {

    if ($(this).val() != '') {
        var select = $(this).attr("id");
        var value = $(this).val();
        $.ajax({
            url: "{{route('dynamicdependentCat.fetch')}}",
            method: "get",
            data: {
                value: value,
            },
            success: function(result) {

                $('#sub').html(result);
                $('#country').selectpicker();
            }

        })
    }
});
});
</script>

@endsection
