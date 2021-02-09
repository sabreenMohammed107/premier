@extends('Layout.company')


@section('search')
<form role="search" class="sr-input-func">
    <input type="text" oninput="searchItem(this.value)" placeholder="...{{ __('titles.search') }}" class="search-int form-control" style="text-align:right">
    <a href="#"><i class="fa fa-search"></i></a>
</form>
@endsection
@section('crumb')

<ul class="breadcome-menu dir-rtl">
<li>
        <span class="bread-blod"> {{ __('titles.items') }}</span> <span class="bread-slash"> / </span>
    </li>
    <li>
        <a href="{{url('/Company')}}"> {{ __('titles.company') }}</a>
    </li>
    
</ul>

@endsection

@section('content')
<input type="hidden" id="compId" value="{{$id}}">
{{-- Items content --}}
<div class="courses-area">
    <div class="container-fluid">
    <a href="{{url("/Company/Items/Add")}}" class="btn btn-primary waves-effect waves-light mg-b-15"> {{ __('titles.add') }}</a>
        <div class="row mg-b-15 row-rtl" id="item" >
            @foreach ($Items as $Item)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="padding:10px;">
                <div class="courses-inner res-mg-b-30">
                    <div style="text-align: center;">
                        @if ($Item->item_image)
                        <img src="{{ asset("/uploads/item/$Item->item_image")}}" style="height:200px;">
                        @else
<img src="{{ asset('webassets/img/default.png')}}" style="height:200px;">
                        @endif
                    </div>
                    <div class="courses-title">
                        <h2>{{$Item->item_arabic_name}}</h2>
                    </div>
                    {{-- <div class="courses-title" style="text-align: left;">
                        <h2>{{$Item->item_english_name}}</h2>
                    </div> --}}
                    <div class="course-des">
                        <p><span><i class="fa fa-clock"></i></span> <b>{{ __('titles.code') }}:</b> {{$Item->item_code}}</p>
                        @if ($Item->balance_start_date)
                        <p><span><i class="fa fa-clock"></i></span> <b>{{ __('titles.open_balance_date') }}:</b> {{date('Y-m-d', strtotime($Item->balance_start_date))}}</p>
                        @else
                        <p><span><i class="fa fa-clock"></i></span> <b>{{ __('titles.open_balance_date') }}:</b> لم يتم تحديد تاريخ</p>
                        @endif
                        <p><span><i class="fa fa-clock"></i></span> <b> {{ __('titles.open_blance_amount') }} :</b> {{$Item->total_open_balance_cost}}</p>
                        <p><span><i class="fa fa-clock"></i></span> <b> {{ __('titles.current_balance') }} :</b> {{$Item->current_total}}</p>
                    </div>
                    <div class="product-buttons">
                    <a href="{{url("/Company/Items/$Item->id/View")}}" title="View" class="pd-setting-ed btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a href="{{url("/Company/Items/$Item->id/Edit")}}" class="pd-setting-ed btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="#" data-toggle="modal" data-target="#del{{$Item->id}}" title="Trash" class="pd-setting-ed btn btn-primary"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$Items->links()}}

    </div>
</div>
@endsection

@section('modal')
<!--Modal-->
@foreach ($Items as $ItemModal)
    <!--Delete Item-->
<div id="del{{$ItemModal->id}}" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title" style="text-align:right">{{ __('titles.delete_data') }}</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-danger modal-check-pro information-icon-pro"> </span>
                <h2>{{$ItemModal->item_arabic_name}}</h2>
                <h4>{{ __('titles.delete_data_qest') }} </h4>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">{{ __('titles.cancel') }}</a>
                <a href="{{ url("/Company/Item/$ItemModal->id/Delete")}}">{{ __('titles.delete') }}</a>
            </div>
        </div>
    </div>
</div>
<!--/Delete Item-->
@endforeach
        <!--/Modal-->

        @endsection
@section('scripts')
    <script>
            var CompanyId = $('#compId').val();
function searchItem(data) {
$.ajax({
    type:'GET',
    url:"{{ url('/Company/Item/Search')}}",
    data:{
    id : CompanyId,
    data : data,
    },
    success:function(data) {

        $('#item').empty();
                        data.forEach(Item => {
                            var viewUrl = '{{url("/Company/Items/:id/View")}}';
                            viewUrl = viewUrl.replace(':id', Item.id);
                            var editUrl = '{{url("/Company/Items/:id/Edit")}}';
                            editUrl = editUrl.replace(':id', Item.id);
                            var card = '<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="padding:10px;">' +
                '<div class="courses-inner res-mg-b-30">' +
                    '<div style="text-align: center;">' +
                        '<img src="{{asset("/uploads/item/")}}/'+Item.item_image+'" style="height:200px" alt="">' +

                    '</div>' +
                    '<div class="courses-title">' +
                        '<h2>'+Item.item_arabic_name+'</h2>' +
                    '</div>' +
                    '<div class="courses-title" style="text-align: left;">' +
                        '<h2>'+Item.item_english_name+'</h2>' +
                    '</div>' +
                    '<div class="course-des">' +
                        '<p><span><i class="fa fa-clock"></i></span> <b>{{ __("titles.code") }}:</b> '+Item.item_code+'</p>' +
                        '<p><span><i class="fa fa-clock"></i></span> <b>{{ __("titles.open_balance_date") }}:</b> '+Item.balance_start_date+'</p>' +
                        '<p><span><i class="fa fa-clock"></i></span> <b>{{ __("titles.open_blance_amount") }} :</b> '+Item.total_open_balance_cost+'</p>' +
                        '<p><span><i class="fa fa-clock"></i></span> <b>{{ __("titles.current_balance") }}:</b> '+Item.current_total+'</p>' +
                    '</div>' +
                    '<div class="product-buttons">' +
                        '<a href="'+ viewUrl+'" title="View" class="pd-setting-ed"><i class="fa fa-eye" aria-hidden="true"></i></a>'+
                        '<a href="'+editUrl+'" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'+
                    '<a href="#" data-toggle="modal" data-target="#del'+Item.id+'" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></a>' +
                    '</div>' +
                '</div>' +
            '</div>';
                            $('#item').append(card);
                        });
console.table(data);
},
error: function (request, status, error) {
    alert(request.responseText);
}
});
}
    </script>
@endsection
