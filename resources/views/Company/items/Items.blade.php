@extends('Layout.company')


@section('search')
<form role="search" class="sr-input-func">
    <input type="text" oninput="searchItem(this.value)" placeholder="...إبحث هنا" class="search-int form-control" style="text-align:right">
    <a href="#"><i class="fa fa-search"></i></a>
</form>
@endsection
@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> الرئيسية<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> عرض الأصناف</span>
    </li>
</ul>

@endsection

@section('content')
<input type="hidden" id="compId" value="{{$id}}">
{{-- Items content --}}
<div class="courses-area">
    <div class="container-fluid">
    <a href="{{url("/Company/$id/Items/Add")}}" class="btn btn-primary waves-effect waves-light mg-b-15">إضافة صنف</a>
        <div class="row mg-b-15" id="item">
            @foreach ($Items as $Item)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="padding:10px;">
                <div class="courses-inner res-mg-b-30">
                    <div style="text-align: center;">
                        <img src="{{ asset("/uploads/item/$Item->item_image")}}" style="height:200px;">
                    </div>
                    <div class="courses-title">
                        <h2>{{$Item->item_arabic_name}}</h2>
                    </div>
                    <div class="courses-title" style="text-align: left;">
                        <h2>{{$Item->item_english_name}}</h2>
                    </div>
                    <div class="course-des">
                        <p><span><i class="fa fa-clock"></i></span> <b>الكود:</b> {{$Item->item_code}}</p>
                        <p><span><i class="fa fa-clock"></i></span> <b>تاريخ الترصيد:</b> {{$Item->balance_start_date}}</p>
                        <p><span><i class="fa fa-clock"></i></span> <b>الرصيد الافتتاحي:</b> {{$Item->total_open_balance_cost}}</p>
                        <p><span><i class="fa fa-clock"></i></span> <b>رصيد المخزن الحالى:</b> {{$Item->current_total}}</p>
                    </div>
                    <div class="product-buttons">
                    <a href="{{url("/Company/$id/Items/$Item->id/View")}}" title="View" class="pd-setting-ed"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a href="{{url("/Company/$id/Items/$Item->id/Edit")}}" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="#" data-toggle="modal" data-target="#del{{$Item->id}}" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
                <h4 class="modal-title" style="text-align:right">حذف بيانات الصنف</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-danger modal-check-pro information-icon-pro"> </span>
                <h2>{{$ItemModal->item_arabic_name}}</h2>
                <h4>هل تريد حذف جميع بيانات متضمنه حركة فتح الحساب و ترصيد جديد الصنف ؟  </h4>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">إلغــاء</a>
                <a href="{{ url("/Company/Item/$ItemModal->id/Delete")}}">حـذف</a>
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
                            var viewUrl = '{{url("/Company/:compid/Items/:id/View")}}';
                            viewUrl = viewUrl.replace(':id', Item.id).replace(':compid', Item.company_id);
                            var editUrl = '{{url("/Company/:compid/Items/:id/Edit")}}';
                            editUrl = editUrl.replace(':id', Item.id).replace(':compid', Item.company_id);
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
                        '<p><span><i class="fa fa-clock"></i></span> <b>الكود:</b> '+Item.item_code+'</p>' +
                        '<p><span><i class="fa fa-clock"></i></span> <b>تاريخ الترصيد:</b> '+Item.balance_start_date+'</p>' +
                        '<p><span><i class="fa fa-clock"></i></span> <b>الرصيد الافتتاحي:</b> '+Item.total_open_balance_cost+'</p>' +
                        '<p><span><i class="fa fa-clock"></i></span> <b>رصيد المخزن الحالى:</b> '+Item.current_total+'</p>' +
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
